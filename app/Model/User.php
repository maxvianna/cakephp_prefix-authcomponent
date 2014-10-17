<?php
   class User extends AppModel {
 
      public $useTable = 'users';

      public $validate = array(
			'name' => array(
				'Please enter your name' => array(
					'rule' => 'notEmpty',
					'message' => 'Please enter your name'
				)
			),
			'username' => array(
				'The username must be between 5 and 15 characters' => array(
					'rule' => array('between', 5, 15),
					'message' => 'The username must be between 5 and 15 characters'
				), 
				'That username has already been token' => array(
					'rule' => 'isUnique',
					'message' => 'That username has already been token'
				)
			),
			'email' => array(
				'Valid email' => array(
					'rule' => array('email'),
					'message' => 'Please enter a valid email address'
				)
			),
			'password' => array(
				'Not empty' => array(
					'rule' => 'notEmpty',
					'message' => 'Please enter your password'
				),
				'Match passwords' => array(
					'rule' => 'matchPasswords',
					'message' => 'Your passwords do not match'
				)
			),
			'password_confirmation' => array(
				'Not empty' => array(
					'rule' => 'notEmpty',
					'message' => 'Please confirm your password'
				)
			)
		);
		
		public function matchPasswords($data)
		{
			if($data['password'] == $this->data['User']['password_confirmation'])
			{
				return TRUE;
			}
			$this->invalidate('password_confirmation', 'Your passwords do not match');
			return FALSE;
		}
   }
?>