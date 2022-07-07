<?php

class SectionController extends Controller
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
				'actions'=>array('index','view','create','update','delete'),
				'roles'=>array('moderator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Lists all sections.
	 */
	public function actionIndex()
	{

		$dataProvider=new CActiveDataProvider('Section', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['pageSize'],
			),
		));

		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Section;

		if(isset($_POST['Section']))
		{
			$model->attributes=$_POST['Section'];
			$model->CREATE_TIME=new CDbExpression('NOW()');
			$model->MODIFY_TIME=new CDbExpression('NOW()');
            $model->CREATE_BY=Yii::app()->user->id;   
            $model->MODIFY_BY=Yii::app()->user->id; 

			if($model->save())
				$this->redirect(array('index'));
		}
        else {
            $model->MORDER = $model->getMaxMorder()+1;
        }

		$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['Section']))
		{
			$model->attributes=$_POST['Section'];
			$model->MODIFY_TIME=new CDbExpression('NOW()');
            $model->MODIFY_BY=Yii::app()->user->getId(); 

			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array('model'=>$model,));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModel();

            $cnt=Question::model()->count("RUBR=".$model->ID);
            if ($cnt>0) {
               $model->ACTIVE='N';
               $model->save();   
			}
            else {
				$model->delete();
            }	 

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Section::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
