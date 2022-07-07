<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SearchForm extends CFormModel
{
	public $date1;
	public $date2;
	public $rubr;
	public $status;
	public $member;
	public $pol;
	public $age1;
	public $age2;
	public $lgota;
	public $srok;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('rubr, member, age1, age2, lgota, srok, status', 'numerical', 'integerOnly'=>true),
			array('pol', 'length', 'max'=>1),
			array('date1, date2','type','type'=>'date','dateFormat'=>'dd.MM.yyyy'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array();
	}
}   