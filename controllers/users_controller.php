<?php
class UsersController extends AppController {

	var $name = 'Users';
        var $components = array('Auth');
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function register() {
	if (!empty($this->data)) {
            // unset unrequired validation rules
			unset($this->User->validate['email']['check_user']);
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$cities = $this->User->City->find('list');
		$this->set(compact('cities'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$cities = $this->User->City->find('list');
		$this->set(compact('cities'));
	}
        
       function beforeFilter() {
           parent::beforeFilter();
$this->Auth->allow('register');
if ($this->action == 'register' || $this->action == 'edit' ) {
$this->Auth->authenticate = $this->User;
}
}

	/**
	 * Login action
	 */
	function login() {
		if(!empty($this->data)) {
			// unset unrequired validation rules
			unset($this->User->validate['email']['check_email_exists']);
			
			// validate form
			$this->User->set($this->data);
			if($this->User->validates()) {
				
				
				// save User to Session and redirect
				$this->Session->write('User', $this->User->_user);
				$this->Session->setFlash('You have successfully logged in.','default',array('class'=>'flash_good'));
				$this->redirect(array('controller'=>'location','action'=>'index'));
			}
		}
	}
	
	/**
	 * Logout action
	 */
	function logout() {
		$this->Session->delete('User');
		$this->Session->setFlash('You have successfully logged out.','default',array('class'=>'flash_good'));
		$this->redirect(array('action' => 'login'));
	}
//	function delete($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid id for user', true));
//			$this->redirect(array('action'=>'index'));
//		}
//		if ($this->User->delete($id)) {
//			$this->Session->setFlash(__('User deleted', true));
//			$this->redirect(array('action'=>'index'));
//		}
//		$this->Session->setFlash(__('User was not deleted', true));
//		$this->redirect(array('action' => 'index'));
//	}
//	function admin_index() {
//		$this->User->recursive = 0;
//		$this->set('users', $this->paginate());
//	}

//	function admin_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid user', true));
///			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('user', $this->User->read(null, $id));
//	}
//
//	function admin_add() {
//		if (!empty($this->data)) {
//			$this->User->create();
//			if ($this->User->save($this->data)) {
//				$this->Session->setFlash(__('The user has been saved', true));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
//			}
//		}
//		$cities = $this->User->City->find('list');
//		$this->set(compact('cities'));
//	}
//
//	function admin_edit($id = null) {
//		if (!$id && empty($this->data)) {
//			$this->Session->setFlash(__('Invalid user', true));
//			$this->redirect(array('action' => 'index'));
//		}
//		if (!empty($this->data)) {
//			if ($this->User->save($this->data)) {
//				$this->Session->setFlash(__('The user has been saved', true));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
//			}
//		}
//		if (empty($this->data)) {
//			$this->data = $this->User->read(null, $id);
//		}
//		$cities = $this->User->City->find('list');
//		$this->set(compact('cities'));
//	}
//
//	function admin_delete($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid id for user', true));
//			$this->redirect(array('action'=>'index'));
//		}
//		if ($this->User->delete($id)) {
//			$this->Session->setFlash(__('User deleted', true));
//			$this->redirect(array('action'=>'index'));
//		}
//		$this->Session->setFlash(__('User was not deleted', true));
//		$this->redirect(array('action' => 'index'));
//	}
//
}
