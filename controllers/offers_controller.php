<?php
class OffersController extends AppController {

	var $name = 'Offers';

	function index() {
		$this->Offer->recursive = 0;
		$this->set('offers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid offer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('offer', $this->Offer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Offer->create();
			if ($this->Offer->save($this->data)) {
				$this->Session->setFlash(__('The offer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offer could not be saved. Please, try again.', true));
			}
		}
		$stores = $this->Offer->Store->find('list');
		$campaigns = $this->Offer->Campaign->find('list');
		$this->set(compact('stores', 'campaigns'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid offer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Offer->save($this->data)) {
				$this->Session->setFlash(__('The offer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Offer->read(null, $id);
		}
		$stores = $this->Offer->Store->find('list');
		$campaigns = $this->Offer->Campaign->find('list');
		$this->set(compact('stores', 'campaigns'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for offer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Offer->delete($id)) {
			$this->Session->setFlash(__('Offer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Offer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Offer->recursive = 0;
		$this->set('offers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid offer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('offer', $this->Offer->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Offer->create();
			if ($this->Offer->save($this->data)) {
				$this->Session->setFlash(__('The offer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offer could not be saved. Please, try again.', true));
			}
		}
		$stores = $this->Offer->Store->find('list');
		$campaigns = $this->Offer->Campaign->find('list');
		$this->set(compact('stores', 'campaigns'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid offer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Offer->save($this->data)) {
				$this->Session->setFlash(__('The offer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Offer->read(null, $id);
		}
		$stores = $this->Offer->Store->find('list');
		$campaigns = $this->Offer->Campaign->find('list');
		$this->set(compact('stores', 'campaigns'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for offer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Offer->delete($id)) {
			$this->Session->setFlash(__('Offer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Offer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
