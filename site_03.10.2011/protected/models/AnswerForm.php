<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class AnswerForm extends CFormModel
{
	public $ID;
	public $PASSWORD;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('ID','type','type'=>'string'),
			array('ID, PASSWORD','required'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'ID' => 'Идентификатор сообщения',
			'PASSWORD' => 'Пароль',
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
}