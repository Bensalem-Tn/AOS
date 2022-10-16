<?php

/**
 * Tout contrôleur nécessitant une authentification de l'utilisateur doit étendre cette classe.
 */
abstract class AuthController extends Controller {

	/**
	 * Cette méthode vérifie si l'utilisateur est connecté
	 * @return void
	 */
	final public function __pre() {
		//  var_dump(empty(Session::get(Config::USER_COOKIE)));
		if (empty(Session::get(Config::USER_COOKIE))) {
			Redirect::to('login');
		}
	}

}
