<?php

class UserController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete'),
				'roles'=>array('administrator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model=new User;

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->CREATE_TIME=new CDbExpression('NOW()');
			$model->MODIFY_TIME=new CDbExpression('NOW()');
            $model->CREATE_BY=Yii::app()->user->getId();   
            $model->MODIFY_BY=Yii::app()->user->getId(); 
            $model->PASSWORD = ($model->PASSWORD == '****') ? '' : md5($model->PASSWORD);

			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}
        else {
           $model->PASSWORD='****';   
        }

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$oldPassword = $model->PASSWORD;

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->MODIFY_TIME=new CDbExpression('NOW()');
            $model->MODIFY_BY=Yii::app()->user->getId();   
            $model->PASSWORD = ($model->PASSWORD == '****') ? $oldPassword : md5($model->PASSWORD);

			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}
        else {
           $model->PASSWORD='****';
        } 

		$this->render('update',array(
			'model'=>$model,
		));
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
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	    //echo Yii::app()->user->getRole();

		$dataProvider=new CActiveDataProvider('User', array(
			'pagination'=>array('pageSize'=>Yii::app()->params['pageSize']),
		));

		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
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
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
