<?php

class Members extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Members':
	 * @var integer $id
	 * @var string $name
	 * @var integer $active
	 * @var integer $morder
	 * @var integer $create_by
	 * @var integer $modify_by
	 * @var string $create_time
	 * @var string $modify_time
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
		return 'Members';
	}

	public function getMaxMorder() 
    {
        return Yii::app()->db->createCommand("select max(morder) from Members")->queryScalar();
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('active, morder, create_by, modify_by', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('create_time, modify_time', 'safe'),
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
           'question'=>array(self::HAS_MANY,'Question','MEMBER')   
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Идентификатор',
			'name' => 'Название',
			'active' => 'Активность',
			'morder' => 'Порядок',
			'create_by' => 'Создан',
			'modify_by' => 'Изменён',
			'create_time' => 'Дата создания',
			'modify_time' => 'Дата модификации',
		);
	}

	public function defaultScope()
    {
        $res = array(
			'condition' => 'active=1',
            'order'=>'morder',
        );
		if (Yii::app()->params['adminMode']) {
			unset($res['condition']);
		}
		return $res;
    }

}