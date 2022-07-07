<?php

class QuestionController extends Controller
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
				'actions'=>array('index','view','create','admin','delete','update','stat','file','control'),
				'roles'=>array('moderator'),
			),
			array('allow',  //
				'actions'=>array('index','admin','update','view','file'),
				'roles'=>array('operator'),
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

	public function actionControl()
	{
		$model = new SearchForm;

        $rubrs = CHtml::listData(Section::model()->findAll('ACTIVE="Y"'), 'ID', 'NAME');
		$rubrs[0] = '';
		ksort($rubrs); 

       	$members = CHtml::listData(Members::model()->findAll('active=1'), 'id', 'name');
		$members[0] = '';
		ksort($members); 

		$cnt = 0;
		$flag = 0;

		if(isset($_POST['SearchForm']))
		{
			$model->attributes=$_POST['SearchForm'];

			if($model->validate()) {

			    $filter = array();
				$params = array();

				if ($model->date1) {
			        array_push($filter,"DATE(`CREATE_TIME`) >= :date1");   
					$params[':date1']=join('-', array_reverse(explode('.', $model->date1)));
				}
				if ($model->date2) {
			        array_push($filter,"DATE(`CREATE_TIME`) <= :date2");   
					$params[':date2']=join('-', array_reverse(explode('.', $model->date2)));
				}
				if ($model->pol) {
			        array_push($filter,"`POL` = :pol");   
					$params[':pol']=$model->pol;
				}
				if ($model->rubr) {
			        array_push($filter,"`RUBR` = :rubr");   
					$params[':rubr']=$model->rubr;
				}
				if ($model->member) {
			        array_push($filter,"`MEMBER` = :member");   
					$params[':member']=$model->member;
				}
				if ($model->lgota) {
			        array_push($filter,"`LGOTA` = :lgota");   
					$params[':lgota']=$model->lgota;
				}
				if ($model->status) {
			        array_push($filter,"`STATUS` = :status");   
					$params[':status']=$model->status;
				}
				if ($model->srok) {
			        array_push($filter,"`SROK` = :srok");   
					$params[':srok']=$model->srok;
				}
				if ($model->age1) {
			        array_push($filter,"`AGE` >= :age1");   
					$params[':age1']=$model->age1;
				}
				if ($model->age2) {
			        array_push($filter,"`AGE` <= :age2");   
					$params[':age2']=$model->age2;
				}

				$cnt = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
				$flag=1;
			}

		}

		$this->render('control',array(
			'model'=>$model,
			'rubrs'=>$rubrs,
			'members'=>$members,
			'cnt'=>$cnt,
			'flag'=>$flag
		));
	}

	public function actionStat()
	{
		$model = new NewStatForm;

		$mas = array();
		$arr = array();
		$cnt = 0;
		$cnt1 = 0;
		$cnt2 = 0;
		$cnt3 = 0;

		if(isset($_POST['NewStatForm']))
		{
			$model->attributes=$_POST['NewStatForm'];
			if($model->validate()) {

			    $filter = array();
				$params = array();
				
				if ($model->date1) {
			        array_push($filter,"DATE(`CREATE_TIME`) >= :date1");   
					$params[':date1']=join('-', array_reverse(explode('.', $model->date1)));
				}
				if ($model->date2) {
			        array_push($filter,"DATE(`CREATE_TIME`) <= :date2");   
					$params[':date2']=join('-', array_reverse(explode('.', $model->date2)));
				}

				$criteri = $model->criteri;

				if ($criteri==1) {
					$arr=Section::model()->findAll(array('condition'=>'ACTIVE="Y"','order'=>'NAME'));
			        array_push($filter,"`RUBR` = :rubr");   
						foreach ($arr as $record) {
							$params[':rubr'] = $record->ID;
							$mas[$record->ID] = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
						}
					$cnt = Question::model()->count(array('condition'=>'`RUBR` = 0'));
				}
				elseif ($criteri==2) {
					$cnt = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
			        array_push($filter,"`POL` = :pol");   
					$params[':pol']='M';
					$cnt1 = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
					$params[':pol']='F';
					$cnt2 = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
					$cnt = $cnt-$cnt1-$cnt2;
				}
				elseif ($criteri==3) {

				    $filt = 1;

					if ($model->date1 && $model->date2) {
						$filt = "DATE(`CREATE_TIME`) >= '".join('-', array_reverse(explode('.', $model->date1)))."' and DATE(`CREATE_TIME`) <= '".join('-', array_reverse(explode('.', $model->date2)))."'";
						$now_dt = join('-', array_reverse(explode('.', $model->date2)));
					}
					else {
						$now_dt = Yii::app()->db->createCommand("select DATE(now())")->queryScalar();	
					}

					$start_dt = Yii::app()->db->createCommand("select min(DATE(CREATE_TIME)) from QUESTIONS where $filt")->queryScalar();	
                    $next_dt = Yii::app()->db->createCommand("select date_add('$now_dt',interval 1 day)")->queryScalar();

					$dt = $start_dt;
					$i=0;	

			        array_push($filter,"DATE(`CREATE_TIME`) = :date");   

					do {
						$params[':date']=$dt;
						$mas[$i]=Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
						$arr[$i] = substr($dt,8,2).".".substr($dt,5,2).".".substr($dt,0,4);
						$i++;
	                    $dt = Yii::app()->db->createCommand("select date_add('$dt',interval 1 day)")->queryScalar();
					}
					while ($dt != $next_dt);

				}
				elseif ($criteri==4) {
			        array_push($filter,"`LGOTA` = :lgota");   
					for ($i=0;$i<count(Yii::app()->params['lgota']);$i++) {
						$arr[$i]=Yii::app()->params['lgota'][$i];
						$params[':lgota']=$i;
						$mas[$i]=Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
					}
				}
				elseif ($criteri==5) {
			        array_push($filter,"`STATUS` = :status");   
					$params[':status']=0;
					$cnt1 = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
					$params[':status']=1;
					$cnt2 = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
				}
				elseif ($criteri==6) {
					$arr=Members::model()->findAll(array('condition'=>'active=1','order'=>'name'));
			        array_push($filter,"`MEMBER` = :member");   
						foreach ($arr as $record) {
							$params[':member'] = $record->id;
							$mas[$record->id] = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
						}
					$cnt = Question::model()->count(array('condition'=>'`MEMBER` = 0'));
				}
				elseif ($criteri==7) {
					$k=0;
					$j=0;
			        array_push($filter,"`AGE` >= :age1 and `AGE` <= :age2");   
					for ($i=0;$i<=100;$i+=10) {
						if ($i>0) {
							$params[':age1'] = $k+1;
							$params[':age2'] = $i;
							$mas[$j] = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
							$j++;
							$k=$i;
						}
					}
					$cnt = Question::model()->count(array('condition'=>1));
				}
				elseif ($criteri==8) {
			        array_push($filter,"`SROK` = :srok");   
					$params[':srok']=7;
					$cnt1 = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
					$params[':srok']=30;
					$cnt2 = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
					$params[':srok']=33;
					$cnt3 = Question::model()->count(array('condition'=>join(' and ', $filter),'params'=>$params));
					$cnt = Question::model()->count(array('condition'=>1));
				}
			}
		}

		$this->render('stat',array(
			'model'=>$model,
			'arr'=>$arr,
			'criteri'=>$criteri,
			'mas'=>$mas,
			'cnt'=>$cnt,
			'cnt1'=>$cnt1,
			'cnt2'=>$cnt2,
			'cnt3'=>$cnt3,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Question;

        $rubrs = CHtml::listData(Section::model()->findAll('ACTIVE="Y"'), 'ID', 'NAME');
        $operators = CHtml::listData(User::model()->findAll('STATUS=3 and ACTIVE=1'), 'ID', 'NAME');

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model, 'rubrs'=>$rubrs, 'operators'=>$operators
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
	
		#$oldPassword = $model->USER_PASSWORD;

        $rubrs = CHtml::listData(Section::model()->findAll('ACTIVE="Y"'), 'ID', 'NAME');
       	$members = CHtml::listData(Members::model()->findAll('active=1'), 'id', 'name');

        $operators = CHtml::listData(User::model()->findAll('STATUS=3 and ACTIVE=1'), 'ID', 'NAME');
		$operators[0] = '';
		ksort($operators); 

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];

			#$model->PUBLISH_TIME = join('-', array_reverse(explode('.', $model->PUBLISH_TIME)));
			if ($model->SROK > 0) { 
	            $model->PUBLISH_TIME = Yii::app()->db->createCommand("select date_add('$model->CREATE_TIME',interval $model->SROK day)")->queryScalar();
			}
				
			if ($model->SYSTEM_STATUS==5) {
								
				if (!$model->ANSWER && $model->STATUS==1) {				
					echo('Перед публикацией обращения необходимо заполнить поле "Ответ для публикации на сайте"');
					exit;	
				}	
				if (!$model->ANSWER_FOR_EMAIL && $model->STATUS==0) {
					echo('Перед публикацией обращения необходимо заполнить поле "Ответ по электронной почте"');
					exit;
				}	
				
				$model->PUBLISH_TIME = Yii::app()->db->createCommand("select now()")->queryScalar();
			}

			$password = $model->USER_PASSWORD;
        	#$model->USER_PASSWORD = ($model->USER_PASSWORD == '****') ? $oldPassword : md5($model->USER_PASSWORD);

			if ($model->SYSTEM_STATUS==1) {
				$operator = User::model()->find('ID='.$model->OPERATOR);
				if ($operator->EMAIL) {
					$headers="From: ".Yii::app()->params['adminEmail']."\r\nReply-To: From: ".Yii::app()->params['adminEmail']."\r\n";
					$headers .= "Content-type: text/html; charset=utf-8\r\n";
					$text=$this->renderPartial('operator_mail',array('model'=>$model),true);
					mail($operator->EMAIL,Yii::app()->params['EmailAdminSubject'],$text,$headers);
				}
			}


			if ($model->SYSTEM_STATUS==1 && $model->SYSTEM_USER_STATUS<1) {
				$model->SYSTEM_USER_STATUS = 1;
			}
			elseif ($model->SYSTEM_STATUS==2 && $model->SYSTEM_USER_STATUS<2) {
				$model->SYSTEM_USER_STATUS = 2;
			}
			elseif ($model->SYSTEM_STATUS==3 && $model->SYSTEM_USER_STATUS<2) {
				$model->SYSTEM_USER_STATUS = 2;
			}
			elseif ($model->SYSTEM_STATUS==4) {
				$model->SYSTEM_USER_STATUS = 3;
			}	
			elseif ($model->SYSTEM_STATUS==5 && $model->SYSTEM_USER_STATUS<4) {
				$model->SYSTEM_USER_STATUS = 4;
			}	

			if($model->save())

				if($_POST['COMMENT']) {
		           $model_comment = new Comments;  
				   $model_comment->operator = $model->OPERATOR;	
				   $model_comment->question = $model->ID;	
				   $model_comment->create_time = new CDbExpression('NOW()');
				   $model_comment->description = $_POST['COMMENT'];	
				   $model_comment->create_by = YII::app()->user->Id;	
				   $model_comment->save();
				}

				if($_POST['KEYWORDS']) {
					$count = count($_POST['KEYWORDS']);
					$keywords="";
					for ($i=0;$i<$count;$i++) {
						$keywords=$keywords.Yii::app()->params['keywords'][$_POST['KEYWORDS'][$i]].", ";
					}
					$keywords=substr($keywords,0,strlen($keywords)-2);
					$model->setTags($keywords)->save();
				}

				if ($model->SYSTEM_STATUS==5 && $model->SEND_EMAIL==1 && $model->EMAIL && $model->STATUS==1) {
					$headers="From: ".Yii::app()->params['adminEmail']."\r\nReply-To: From: ".Yii::app()->params['adminEmail']."\r\n";
					$headers .= "Content-type: text/html; charset=utf-8\r\n";
					$text=$this->renderPartial('client_mail',array('model'=>$model,'password'=>$password),true);
					mail($model->EMAIL,Yii::app()->params['EmailClientSubject'],$text,$headers);
				}

				if ($model->SYSTEM_STATUS==5 && $model->EMAIL && $model->STATUS==0) {
					$headers="From: ".Yii::app()->params['adminEmail']."\r\nReply-To: From: ".Yii::app()->params['adminEmail']."\r\n";
					$headers .= "Content-type: text/html; charset=utf-8\r\n";
					$text=$this->renderPartial('client_mail',array('model'=>$model,'password'=>$password),true);
					mail($model->EMAIL,Yii::app()->params['EmailClientSubject'],$text,$headers);
				}

				$this->redirect(array('index'));
		}
		else {
			$model->PUBLISH_TIME = substr($model->PUBLISH_TIME,8,2).".".substr($model->PUBLISH_TIME,5,2).".".substr($model->PUBLISH_TIME,0,4);
		}

        $user=User::model()->find(array('select'=>'STATUS','condition'=>'ID='.YII::app()->user->id));
 
        $comments = Comments::model()->findAll(
			array(
				'condition'=>'`operator` = :operator and `question` = :question',
				'order'=>'`create_time` desc',
				'params'=>array(':operator'=>$model->OPERATOR,':question'=>$model->ID)
			));

		$tags = $model->getTags();
        $keywords="";
		$chekeds = array();
		$j=0;
		foreach($tags as $tag){
			for ($i=0;$i<count(Yii::app()->params['keywords']);$i++) {
				if ($tag == Yii::app()->params['keywords'][$i]) {
					$chekeds[$j]=$i;	
					$j++;
				}
			}	
		}

		$this->render('update',array(
			'model'=>$model, 
			'rubrs'=>$rubrs, 
			'operators'=>$operators, 
			'status'=>$user->STATUS, 
			'members'=>$members, 
			'comments'=>$comments,
			'chekeds'=>$chekeds,
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
			$model = $this->loadModel();

/* 
      (   onAfterDelete)
			$sql = 'delete from QuestionTag where questId='.$model->ID;
			$command = Yii::app()->db->createCommand($sql);	
			$command->execute();
*/
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria();		
		$criteria->order='ID desc';
		
		$mode = intval($_GET['mode']);
		$member = intval($_GET['member']);
		$day = intval($_GET['day']);

		$fio = $_GET['fio'];
		$number = $_GET['number'];

		if ($day) {
            $dt = Yii::app()->db->createCommand("select DATE_ADD(DATE(now()),interval $day day)")->queryScalar();
			$criteria->addCondition("DATE(PUBLISH_TIME)<='$dt' and SYSTEM_STATUS<>5 and SYSTEM_STATUS<>4");			
		}

		if ($fio) {
			$criteria->addSearchCondition('FIRSTNAME',$fio,true);
		}

		if ($number) {
			$criteria->addSearchCondition('NUMBER',$number,true);
		}

		if ($member) {
			$criteria->addSearchCondition('MEMBER',$member);
		}

if (!$fio && !$number && !$day) {
		if (!$mode) {
			if (Yii::app()->user->role == 'operator') {
				$criteria->addSearchCondition('SYSTEM_STATUS',1);
			}
			elseif (Yii::app()->user->role == 'moderator') {
				$criteria->addSearchCondition('SYSTEM_STATUS',0);
			}
		}
		elseif ($mode == 6) {
 
		}
		else {
			$criteria->addSearchCondition('SYSTEM_STATUS',$mode);
		}
}


		if (Yii::app()->user->role == 'operator') {
			$criteria->addSearchCondition('OPERATOR',Yii::app()->user->id);
		}

		$dataProvider=new CActiveDataProvider('Question', array(
			'criteria'=> $criteria,
			'pagination'=>array('pageSize'=>Yii::app()->params['pageSize']),
		));

       	$members = Members::model()->findAll('active=1');

		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
			'mode'=>$mode,
			'members'=>$members
		));
	}

	public function actionFile()
	{
		$file = Files::model()->findbyPk($_GET['id']);
		if ($file ===null)
			throw new CHttpException(404,'The requested page does not exist.');
		CHttpRequest::sendFile($file->NAME, file_get_contents($file->Path));
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
				$this->_model=Question::model()->with('files')->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
