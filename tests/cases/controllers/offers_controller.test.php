<?php
/* Offers Test cases generated on: 2011-10-16 09:29:04 : 1318737544*/
App::import('Controller', 'Offers');

class TestOffersController extends OffersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class OffersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.offer', 'app.store', 'app.city', 'app.user', 'app.category', 'app.campaign');

	function startTest() {
		$this->Offers =& new TestOffersController();
		$this->Offers->constructClasses();
	}

	function endTest() {
		unset($this->Offers);
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
