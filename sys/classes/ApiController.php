<?php

/**
 * Tout contrôleur servant à répondre à un appel API utilisateur doit étendre cette classe.
 */
abstract class ApiController extends Controller {

	/**
	 * Cette méthode vérifie si l'utilisateur est connecté
	 * @return void
	 */
	final public function __pre() {
	/*	if (empty(Session::get(Config::USER_COOKIE))) {
			http_response_code(403);
			ob_clean();
			die('HTTP: 403 forbidden.');
		}*/
	}

	/**
	 * Cette méthode envoie une réponse API
	 * @return void
	 */
	final public function __post() {
		ob_clean();
		Http::setJsonHeaders();
		echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
		die;
	}

	
}
