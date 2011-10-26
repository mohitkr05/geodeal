<?php
class StoresController extends AppController {

	var $name = 'Stores';

	function index() {
		$this->Store->recursive = 0;
		$this->set('stores', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid store', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('store', $this->Store->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Store->create();
			if ($this->Store->save($this->data)) {
				$this->Session->setFlash(__('The store has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.', true));
			}
		}
		$cities = $this->Store->City->find('list');
		$categories = $this->Store->Category->find('list');
		$this->set(compact('cities', 'categories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid store', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Store->save($this->data)) {
				$this->Session->setFlash(__('The store has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Store->read(null, $id);
		}
		$cities = $this->Store->City->find('list');
		$categories = $this->Store->Category->find('list');
		$this->set(compact('cities', 'categories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for store', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Store->delete($id)) {
			$this->Session->setFlash(__('Store deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Store was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Store->recursive = 0;
		$this->set('stores', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid store', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('store', $this->Store->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Store->create();
			if ($this->Store->save($this->data)) {
				$this->Session->setFlash(__('The store has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.', true));
			}
		}
		$cities = $this->Store->City->find('list');
		$categories = $this->Store->Category->find('list');
		$this->set(compact('cities', 'categories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid store', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Store->save($this->data)) {
				$this->Session->setFlash(__('The store has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Store->read(null, $id);
		}
		$cities = $this->Store->City->find('list');
		$categories = $this->Store->Category->find('list');
		$this->set(compact('cities', 'categories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for store', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Store->delete($id)) {
			$this->Session->setFlash(__('Store deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Store was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
        function _upload_image() {  
    // init  
    $image_ok = TRUE;  
      
    // if a file has been added  
    if($this->data['File']['image']['error'] != 4) {  
        // try to upload the file  
        $result = $this->upload_files('img/stores', $this->data['File']);  
  
        // if there are errors  
        if(array_key_exists('errors', $result)) {  
            // set image ok to false  
            $image_ok = FALSE;  
            // set the error for the view  
            $this->set('errors', $result['errors']);  
        } else {  
            // save the url  
            $this->data['Stores']['image'] = $result['urls'][0];  
        }  
    }  
  
return $image_ok;  
}  
}
