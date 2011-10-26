<?php
/* Campaigns Test cases generated on: 2011-10-16 09:24:54 : 1318737294*/
App::import('Controller', 'Campaigns');

class TestCampaignsController extends CampaignsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CampaignsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.campaign');

	function startTest() {
		$this->Campaigns =& new TestCampaignsController();
		$this->Campaigns->constructClasses();
	}

	function endTest() {
		unset($this->Campaigns);
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
