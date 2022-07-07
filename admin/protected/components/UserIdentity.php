<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */

	private $_id;

	public function authenticate()
	{

        $record = User::model()->findByAttributes(array('LOGIN'=>$this->username,'ACTIVE'=>1));		

		if($record === null || !$record->validatePassword($this->password))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else
        {
            $this->_id = $record->ID;
            $this->setState('title', $record->NAME);
            $this->username = $record->NAME;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;

	}

    public function getId()
    {
        return $this->_id;
    }

}