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
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
                $username = $this->username;
                $password = $this->password;
                
                $user = Users::model()->findByAttributes(array('username'=>$username,'password'=>$password));
                
                if(!empty($user)) {
                    $this->errorCode = self::ERROR_NONE;
                    }
                else {
                $this->errorCode='Kullanıcı adı ya da şifre yanlış!!';
                }
                return !$this->errorCode;
	}
}