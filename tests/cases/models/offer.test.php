<?php
/* Offer Test cases generated on: 2011-10-16 09:28:40 : 1318737520*/
App::import('Model', 'Offer');

class OfferTestCase extends CakeTestCase {
	var $fixtures = array('app.offer', 'app.store', 'app.city', 'app.user', 'app.category', 'app.campaign');

	function startTest() {
		$this->Offer =& ClassRegistry::init('Offer');
	}

	function endTest() {
		unset($this->Offer);
		ClassRegistry::flush();
	}

}
