<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $agree;
	public $rubr;
	public $question;
	public $status;
	public $firstname;
	public $secondname;
	public $firdname;
	public $job;
	public $pol;
	public $age;
	public $p_index;
	public $city;
	public $street;
	public $house;
	public $flat;
	public $email;
	public $telephone;
	public $send_mail;
	public $subject;
	public $body;
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
					'agree, rubr, question, status, firstname, secondname, firdname, job, pol, age, p_index, city, street, house, flat, email, telephone, send_mail', 
					'required'
				),
			// email has to be a valid email address
			array('email', 'email'),
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