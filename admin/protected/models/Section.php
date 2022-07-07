<?php

class Section extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'RUBRS':
	 * @var integer $ID
	 * @var string $NAME
	 * @var string $ACTIVE
	 * @var string $CREATE_TIME
	 * @var string $MODIFY_TIME
	 * @var integer $CREATE_BY
	 * @var integer $MODIFY_BY
	 * @var integer $MORDER
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

	public function getMaxMorder() 
    {
        return Yii::app()->db->createCommand("select max(MORDER) from RUBRS")->queryScalar();
    }

	public function tableName()
	{
		return 'RUBRS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CREATE_BY, MODIFY_BY, MORDER', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>255),
			array('ACTIVE', 'length', 'max'=>1),
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
	           'question'=>array(self::HAS_MANY,'Question','RUBR'),
 		   'user'=>array(self::BELONGS_TO,'User','CREATE_BY'),
 		   'user_m'=>array(self::BELONGS_TO,'User','MODIFY_BY'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Ид.',
			'NAME' => 'Название',
			'ACTIVE' => 'Активность',
			'CREATE_TIME' => 'Дата создания',
			'MODIFY_TIME' => 'Дата модификации',
			'CREATE_BY' => 'Создан',
			'MODIFY_BY' => 'Изменён',
			'MORDER' => 'Порядок',
		);
	}

	public function defaultScope()
    {
        $res = array(
			'condition' => 'ACTIVE="Y"',
            'order'=>'MORDER',
        );
		if (Yii::app()->params['adminMode']) {
			unset($res['condition']);
		}
		return $res;
    }

}