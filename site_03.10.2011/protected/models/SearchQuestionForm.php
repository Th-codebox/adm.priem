<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SearchQuestionForm extends CFormModel
{
	public $RUBR;
	public $DT1;
	public $DT2;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			//array('RUBR, DT1, DT2','required'),
			array('RUBR','type','type'=>'integer'),
			array('DT1, DT2','type','type'=>'date','dateFormat'=>'dd.MM.yyyy'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'RUBR' => 'Категория',
			'DT1' => 'Начальная дата',
			'DT2' => 'Конечная дата',
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
} 