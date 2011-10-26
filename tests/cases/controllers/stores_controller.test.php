<?php
/* Stores Test cases generated on: 2011-10-16 09:08:23 : 1318736303*/
App::import('Controller', 'Stores');

class TestStoresController extends StoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.store', 'app.city', 'app.category');

	function startTest() {
		$this->Stores =& new TestStoresController();
		$this->Stores->constructClasses();
	}

	function endTest() {
		unset($this->Stores);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
