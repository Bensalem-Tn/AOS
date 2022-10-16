<?php

/**
 * Fonctions du protocole de transfert hypertexte.
 */
final class Http {

	/**
	 * Détecte s'il s'agit d'une requête HTTP GET
	 * @return bool
	 */
	final public static function isGet() {
		$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
		$method = strtoupper($method);
		return $method === 'GET';
	}

	/**
	 * Détecte s'il s'agit d'une requête HTTP POST
	 * @return bool
	 */
	final public static function isPost() {
		$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
		$method = strtoupper($method);
		return $method === 'POST';
	}

	/**
	 * Vérifie si la méthode HTTP est appropriée
	 * @param string|array $method Il accepte les formats suivants: 'GET', 'GET|HEAD', 'GET|HEAD|POST'...
	 * @return void
	 */
	final public static function checkMethodIsAllowed($allowedMethods = 'GET') {
		$allowedMethods = explode('|', $allowedMethods);
		$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

		foreach ($allowedMethods as $method) {
			$method = strtoupper($method);
			if ($method === $requestMethod) {
				return;
			}
		}

		http_response_code(405);
		ob_clean();
		die('HTTP: 405 method not allowed.');
	}

	/**
	 * Détecte s'il a été utilisé HTTPS
	 * @see http://php.net/manual/en/reserved.variables.server.php
	 * @return bool
	 */
	final public static function isHttps() {
		$c1 = filter_input(INPUT_SERVER, 'HTTPS') !== null;
		$c2 = filter_input(INPUT_SERVER, 'SERVER_PORT', FILTER_SANITIZE_NUMBER_INT);
		$c2 = intval($c2) === 443;

		if ($c1 || $c2) {
			return true;
		}
		return false;
	}

	/**
	 * Normalise et renvoie le chemin requis
	 * @return string
	 */
	final public static function getRequestedPath() {
		$request = filter_input(INPUT_SERVER, 'REQUEST_URI');
		$request = substr($request, strlen(Config::PATH));
		return $request;
	}

	/**
	 * Définit les en-têtes de réponse JSON habituels
	 * @return void
	 */
	final public static function setJsonHeaders() {
		header('Content-Type: application/json; charset=utf-8');
		// header('Access-Control-Allow-Origin: *');
	}

	/**
	 * "Arrêter" le constructeur.
	 */
	private function __construct() {}

}
