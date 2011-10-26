<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
    
    var $components = array ('Auth','Session');
    
    function beforeFilter(){
        
      $this->Auth->allow('index','view')  ;
      $this->Auth->authError = 'Hey! You need to log in :)';
      $this->Auth->loginError= 'Incorrect Email/Password';
      $this->Auth->loginRedirect= array('controller'=>'locations','action'=>'index');
      $this->Auth->logoutRedirect= array('controller'=>'locations','action'=>'index');
     // $this->set ($admin, $this->_isAdmin()); // Can be used in case of admin users
    }
    
  //  function _isAdmin(){
    //    $admin =FALSE;
      //  if($this->Auth->user('isadmin')=='1'){
        //    $admin = TRUE;
       // }
        //return($admin);
        
    //}
}
