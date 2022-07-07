<?php

class Question extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'QUESTIONS':
	 * @var integer $ID
	 * @var integer $RUBR
	 * @var string $FIRSTNAME
	 * @var string $SECONDNAME
	 * @var string $FIRDNAME
	 * @var string $POL
	 * @var integer $AGE
	 * @var integer $P_INDEX
	 * @var string $CITY
	 * @var string $STREET
	 * @var integer $FLAT
	 * @var string $EMAIL
	 * @var string $TELEPHONE
	 * @var string $DESCRIPTION
	 * @var string $ANSWER
	 * @var integer $SEND_EMAIL
	 * @var integer $STATUS
	 * @var integer $SYSTEM_STATUS
	 * @var string $CREATE_TIME
	 * @var string $PUBLISH_TIME
	 * @var integer $OPERATOR
	 * @var string $ADMIN_COMMENT
	 * @var string $OPERATOR_COMMENT
	 * @var string $USER_PASSWORD
	 * @var string $HOUSE
	 * @var string $JOB
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */

	public $verifyCode;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'QUESTIONS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MEMBER, RUBR, FIRSTNAME, SECONDNAME, DESCRIPTION, STATUS, P_INDEX, CITY, STREET, HOUSE, FLAT', 'required'),
			array('SROK,LGOTA, MEMBER, RUBR, AGE, P_INDEX, SEND_EMAIL, STATUS, SYSTEM_STATUS, SYSTEM_USER_STATUS, OPERATOR', 'numerical', 'integerOnly'=>true),
			array('NUMBER, FIRSTNAME, SECONDNAME, FIRDNAME, CITY, STREET, EMAIL, TELEPHONE, USER_PASSWORD, JOB', 'length', 'max'=>255),
			array('FLAT', 'length', 'max'=>15),
			array('POL', 'length', 'max'=>1),
			array('HOUSE', 'length', 'max'=>10),
			array('EMAIL', 'email'),
			array('DESCRIPTION, ANSWER, ANSWER_FOR_EMAIL, CREATE_TIME, PUBLISH_TIME, ADMIN_COMMENT, OPERATOR_COMMENT, NAME', 'safe'),
			array('verifyCode', 'captcha', 'on'=>'create'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.

		return array(
			'section'=>array(self::BELONGS_TO,'Section','RUBR'),
			'member'=>array(self::BELONGS_TO,'Members','MEMBER'),
			'user'=>array(self::BELONGS_TO,'User','OPERATOR'),
			'files'=>array(self::HAS_MANY,'Files','QUESTION'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Ид.',
			'RUBR' => 'Категория',
			'FIRSTNAME' => 'Фамилия',
			'SECONDNAME' => 'Имя',
			'FIRDNAME' => 'Отчество',
			'POL' => 'Пол',
			'AGE' => 'Возраст',
			'P_INDEX' => 'Индекс',
			'CITY' => 'Город',
			'STREET' => 'Улица',
			'FLAT' => 'Квартира',
			'EMAIL' => 'Email',
			'TELEPHONE' => 'Телефон',
			'DESCRIPTION' => 'Вопрос',
			'ANSWER' => 'Ответ для публикации на сайте',
			'ANSWER_FOR_EMAIL'=>'Ответ по электронной почте',
			'SEND_EMAIL' => 'Отправить письмо',
			'STATUS' => 'Статус',
			'SYSTEM_STATUS' => 'Статус обращения',
			'CREATE_TIME' => 'Время создания',
			'PUBLISH_TIME' => 'Дата ответа',
			'OPERATOR' => 'Ответственный',
			'ADMIN_COMMENT' => 'Комментарий модератора',
			'OPERATOR_COMMENT' => 'Комментарий оператора',
			'USER_PASSWORD' => 'Пароль заявителя для просмотра ответа на сайте',
			'HOUSE' => 'Дом',
			'JOB' => 'Род занятий',
			'MEMBER'=>'Кому',
			'NUMBER'=>'Регистрационный номер обращения',
			'NAME'=>'Подпись',
			'LGOTA'=>'Льготная категория',
			'SYSTEM_USER_STATUS' => 'Статус обращения для пользователя',
			'SROK'=>'Срок ответа'
		);
	}

	public function behaviors()
	{
	    return array(
	        'tags' => array(
	            'class' => 'ext.CTaggableBehaviour.CTaggableBehaviour',
	            //      
	            'tagTable' => 'Tag',
	            //  -,    .
	            //     __Tag
	            'tagBindingTable' => 'QuestionTag',
	            //      cc-.
	            //    __Id 
	            'modelTableFk' => 'questId',
	            // ID   -
	            'tagBindingTableTagId' => 'tagId',
	            // ID ,  .
	            //   ID  false. 
	            'cacheID' => 'cache',

    	        //    .
	            //   false        .
	            'createTagsAutomatically' => true,
	        )
	    );
	}

	public function afterDelete() 
	{
		foreach ($this->files as $file) {
			$file->delete();
		}
		parent::afterDelete();
	}

	public function getTimeToAnswer()
	{
		if (!$this->PUBLISH_TIME || $this->PUBLISH_TIME == '0000-00-00 00:00:00')
			return '';
		$timeDiff = strtotime($this->PUBLISH_TIME)-strtotime(date('Y-m-d 00:00:00'));
		return floor($timeDiff/86400);
	}

}