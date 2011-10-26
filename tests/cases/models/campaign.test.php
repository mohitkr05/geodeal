<?php
/* Campaign Test cases generated on: 2011-10-16 09:24:35 : 1318737275*/
App::import('Model', 'Campaign');

class CampaignTestCase extends CakeTestCase {
	var $fixtures = array('app.campaign');

	function startTest() {
		$this->Campaign =& ClassRegistry::init('Campaign');
	}

	function endTest() {
		unset($this->Campaign);
		ClassRegistry::flush();
	}

}
