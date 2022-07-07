<?php

class Comments extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'Comments';
	}

	public function rules()
	{
		return array(
			array('operator, question, create_by', 'numerical', 'integerOnly'=>true),
			array('create_time, description', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'user'=>array(self::BELONGS_TO,'User','create_by'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Идентификатор',
			'operator' => 'Оператор',
			'question' => 'Вопрос',
			'create_time' => 'Дата создания',
			'description' => 'Комментарий',
			'create_by'=>'Создан'
		);
	}
} 