<?php

class CertController extends Controller
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  //
				'actions'=>array('index','view','download','create','renew','revoke'),
				'roles'=>array('administrator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$model = $this->loadModel();
		$headings = array(
			'status'=>"Статус", 'issued'=>"Выдан", 'expires'=>"До",
			'common_name'=>"Имя пользователя", 'email'=>"E-mail",
			'organization'=>"Организация", 'unit'=>"Подразд.",
			'locality'=>"Город"
	    );

		$order = $_GET['order'];
		if ($order != 'A' && $order != 'D') $order = 'A';

		$sortField = $_GET['sortfield'];
		if (!array_key_exists($sortField, $headings)) $sortField = 'expires';

		$search = $_GET['search'];

		$prefix = '';
		if ($_GET['show_valid']) $prefix .= 'V';
		if ($_GET['show_revoked']) $prefix .= 'R';
		if ($_GET['show_expired']) $prefix .= 'E';
		if (!$prefix) {
			$prefix = 'VRE';
			$_GET['show_valid'] = '1';
			$_GET['show_revoked'] = '1';
			$_GET['show_expired'] = '1';
		}

		$query = "^[$prefix].*".preg_quote($search);

		$this->render('index', array(
			'data' => $model->getList($query, $sortField, $order),
			'headings' => $headings,
			'sortfield' => $sortField,
			'order' => $order,
			'search' => $search,
		));
	}

	public function actionCreate()
	{
		$model = $this->loadModel();
		$model->scenario = 'create';
		if (isset($_POST['Certificate'])) {
			$model->attributes = $_POST['Certificate'];
			if ($model->validate()) {
				// save defaults
				$model->saveDefaults();
				// create sertificate ??? check&confirm
				if (!$serial = $model->find($model->email,$model->common_name)) {
					$serial = $model->createCert();
				}
				if ($serial) {
					$model->generateCrl();
					// go download page serial=$serial
					$this->redirect(CHtml::normalizeUrl(array('download','serial'=>$serial)));
				}
			}
		}
		else if (!isset($_GET['serial'])) {
			// read defaults
			$model->readDefaults();
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	public function actionRenew() {
		$this->actionCreate();
	}

	public function actionRevoke()
	{
		$model = $this->loadModel();
		if (isset($_POST['yt1']))
			$this->redirect(CHtml::normalizeUrl(array('index')));
		if (isset($_POST['yt0'])) {
			if ($model->revoke())
				$this->redirect(CHtml::normalizeUrl(array('index')));
		}

		$model->generateCrl();
		$this->render('revoke', array(
			'model' => $model,
		));
	}

	public function actionView()
	{
		$model = $this->loadModel();

		$this->render('view', array(
			'model' => $model,
		));
	}

	public function actionDownload()
	{
		$model = $this->loadModel();

		if (isset($_REQUEST['dl_type'])) {
			$model->sendCert($_REQUEST['dl_type']);
		}
		else {
			$this->render('download', array(
				'model' => $model,
			));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if ($this->_model===null) {
			$this->_model= new Certificate;

			if ($_GET['serial']) {
				if (!$this->_model->getEntry($_GET['serial']))
					throw new CHttpException(404,'The requested page does not exist.');
			}
		}
		return $this->_model;
	}
}