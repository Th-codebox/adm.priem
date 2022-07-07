<?php

class User extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'SITE_ADMINS':
	 * @var integer $ID
	 * @var string $NAME
	 * @var string $LOGIN
	 * @var string $PASSWORD
	 * @var string $EMAIL
	 * @var integer $ACTIVE
	 * @var string $CREATE_TIME
	 * @var string $MODIFY_TIME
	 * @var integer $CREATE_BY
	 * @var integer $MODIFY_BY
	 * @var string $JOB
	 * @var string $COMPANY
	 * @var integer $STATUS
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SITE_ADMINS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ACTIVE, CREATE_BY, MODIFY_BY, STATUS', 'numerical', 'integerOnly'=>true),
			array('JOB, COMPANY', 'length', 'max'=>255),
			array('NAME, LOGIN, PASSWORD, EMAIL','required'),
			array('EMAIL','email'),
			array('EMAIL, LOGIN', 'length', 'max'=>100),
			array('LOGIN', 'unique'),
			array('PASSWORD','length', 'min'=>5, 'max'=>100),
			array('CREATE_TIME, MODIFY_TIME', 'safe'),
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
	           'question'=>array(self::HAS_MANY,'Question','OPERATOR'),
	           'section'=>array(self::HAS_MANY,'Section','CREATE_BY'),
	           'section_m'=>array(self::HAS_MANY,'Section','MODIFY_BY'),
	           'member'=>array(self::HAS_MANY,'Members','create_by'),
	           'member_m'=>array(self::HAS_MANY,'Members','modify_by'),
        	   'comment'=>array(self::HAS_MANY,'Comments','operator'),   
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Ид.',
			'NAME' => 'Имя',
			'LOGIN' => 'Логин',
			'PASSWORD' => 'Пароль',
			'EMAIL' => 'Email',
			'ACTIVE' => 'Активность',
			'CREATE_TIME' => 'Время создания',
			'MODIFY_TIME' => 'Время модификации',
			'CREATE_BY' => 'Создан',
			'MODIFY_BY' => 'Изменён',
			'JOB' => 'Должность',
			'COMPANY' => 'Отдел',
			'STATUS' => 'Статус',
		);
	}

	public function validatePassword($password) 
	{
		return $this->PASSWORD === md5($password);
	}

    function getStatus() {
		return $this->STATUS;
    }

    function getRole() {
		if ($this->STATUS == 1)
			return 'administrator';
		if ($this->STATUS == 2)
			return 'moderator';
		if ($this->STATUS == 3)
			return 'operator';
		return 'guest';
    }

}