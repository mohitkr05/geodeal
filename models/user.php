<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your name',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter your email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'check_user'=>array(
				'rule'=>'check_user',
				'message'=>'Either your Email or Password is invalid',
				'last'=>TRUE
			),
			'check_email_exists'=>array(
				'rule'=>'check_email_exists',
				'message'=>'email already exists, please choose another',
			),
		'phone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your phone number',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
                                 'rule' => '/^[a-z0-9]{6,40}$/i',
                                  'message' => 'This field must have between 6 and 40 alphanumeric characters.',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter your city so that we can find deals around you',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed


        /**
	 * Private User
	 * @var array
	 */
        	var $belongsTo = array(
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'city_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $_user = array();
	
      
  /**
	 * Check a User is valid
	 * @param array $check
	 * @return bool
	 */
	function check_user($check) {
		// only check if email & Password are present
		if(!empty($check['email']) && !empty($_POST['data']['User']['password'])) {
			// get User by email
			$user = $this->find('first',array('conditions'=>array('User.email'=>$check['email'])));
			
			// invalid User
			if(empty($user)) {
			return FALSE;
			}
			
			// compare passwords
			$salt = Configure::read('Security.salt');
			if($user['User']['password'] != md5($_POST['data']['User']['password'].$salt)) {
			return FALSE;
			}
			
			// save User
			$this->_user = $user;
		}
		
	return TRUE;
	}
	
        
        /**
	 * Check a email exists in the database
	 * @param array $check
	 * @return bool
	 */
	function check_email_exists($check) {
		// get User by email
		if(!empty($check['email'])) {
			$user = $this->find('first',array('conditions'=>array('User.email'=>$check['email'])));
			
			// invalid User
			if(!empty($user)) {
			return FALSE;
			}
		}
		
	return TRUE;
	}
        
	/**
	 * BeforeSave Callback
	 */
	function beforeSave() {
		// hash Password
		if(!empty($this->data['User']['password'])) {
			$salt = Configure::read('Security.salt');
			$this->data['User']['password'] = md5($this->data['User']['password'].$salt);
		} else {
			// remove Password to prevent overwriting empty value
			unset($this->data['User']['password']);
		}
		
	return TRUE;
	}
        
}
