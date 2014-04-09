<?php
/*
 * ForgetPasword is the data structure for saving user recovery form data
 * if is used by the 'forget' action of UserController' 
 */
class RecoveryForm extends CFormModel
{
	public $email;
	
	/*
	 * Declares validation rules for emails
	 */
	public function rules()
	{
		return array(
				array('email','required'),
				array('email','match','pattern' =>'/^[A-Za-z0-9@.\s,]+$/u',
					 'message'=>'Invalid email!'),
				
			);
	}
	
	/*
	 * Declares attribute labels
	 */
	public function attributeLabels()
	{
		return array('email'=>'Email');
	}
	/**
	 * check whether the user name or email exist in the database
	 */
	
	public function checkExists($activationkey)
	{
		if (!$this->hasErrors())
		{
			if (!strpos($this->email,'@'))
				$this->addError('email', 'Email is incorrect');
			else
			{
				$user = User::model()->findByAttributes(array('email'=>$this->email));
				if ($user === null)
				{
					$this->addError('email', 'Can not find your email!');
				}
				else 
				{
					$user->activeKey = $activationkey;
					if ($user->update())
						return true;
				}
			}
			return false;

		}
		
	}
	
}
?>