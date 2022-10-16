<?php

/**
 * Tout contrôleur nécessitant une authentification de l'utilisateur doit étendre cette classe.
 */
abstract class AuthAdminController extends Controller {

	/**
	 * Cette méthode vérifie si l'utilisateur est connecté
	 * @return void
	 */
	final public function __pre() {
		if (empty(Session::get(Config::USER_COOKIE))||Session::get('role')==='user' ) {

			Redirect::to('adminlogin');
		}
	}

}
