<?php

class Files extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'FILES':
	 * @var integer $ID
	 * @var string $NAME
	 * @var integer $QUESTION
	 * @var integer $SIZE
	 * @var integer $TYPE
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
		return 'FILES';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('QUESTION, SIZE, TYPE, NAME', 'required'),
			array('QUESTION, SIZE', 'numerical', 'integerOnly'=>true),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Id',
			'NAME' => 'Name',
			'QUESTION' => 'Question',
			'SIZE' => 'Size',
			'TYPE' => 'Type',
		);
	}
	
	public function getUrl() {
		return Yii::app()->params['upload_dir'].'/'.$this->ID.'.'.$this->TYPE;
	}

	public function getPath() {
		return Yii::getPathOfAlias('webroot').$this->getUrl();
	}

	public function saveFile($tmpName) {
		return move_uploaded_file($tmpName, $this->getPath());
	}
	
	function afterDelete() {
		unlink($this->getPath());
		parent::afterDelete();
	}
}