<?php

/**
 * UserController
 */
class UserController extends AuthController {

	/**
	 * Itinéraire: /
	 * @return void
	 */

	public function index() {
		
			

		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/user/user.js');
	}
	
}
