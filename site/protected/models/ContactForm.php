<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $agree;
	public $RUBR;
	public $DESCRIPTION;
	public $STATUS;
	public $FIRSTNAME;
	public $SECONDNAME;
	public $FIRDNAME;
	public $JOB;
	public $AGE;
	public $P_INDEX;
	public $CITY;
	public $STREET;
	public $HOUSE;
	public $FLAT;
	public $EMAIL;
	public $TELEPHONE;
	public $SEND_MAIL;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array
				(
					'agree, RUBR, DESCRIPTION, STATUS, FIRSTNAME, SECONDNAME, FIRDNAME, JOB, POL, AGE, P_INDEX, CITY, STREET, HOUSE, FLAT, EMAIL, TELEPHONE, SEND_MAIL', 
					'required'
				),
			// email has to be a valid email address
			array('EMAIL', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd')),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}