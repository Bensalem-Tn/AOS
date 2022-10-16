<?php

/**
 * Classe de gestion de session.
 */
final class Session {

	/**
	 * Configuration du cookie de session
	 * @var array
	 */
	private static $cookieParams = [
		'lifetime' => 0,
		'path' => '/',
		'domain' => '',
		'secure' => false,
		'httponly' => false,
		'samesite' => 'Strict'
	];

	/**
	 * Commencer une session
	 * @return void
	 */
	final public  function begin() {
		if (Http::isHttps()) {
			$this->cookieParams['secure'] = true;
		}

		if (!session_set_cookie_params(self::$cookieParams)) {
			ob_clean();
			die('SESSION: Unable to set cookie params.');
		}
		session_start();
	}

	/**
	 * Effacement des données de la session et interruption de la session
	 * @return void
	 */
	final public static function end() {
		$_SESSION = [];
		session_destroy();
	}

	/**
	 * Manipulation des données de session
	 * @param string $key Variable de session
	 * @param mixed $value La valeur de la variable de session
	 */
	final public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	/**
	 * Renvoie la valeur de la variable de session correspondante
	 * @param string $key Variable de session
	 * @return mixed|boolean
	 */
	final public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
		return false;
	}

	/**
	 * "Déconnexion "constructeur.
	 */
	private function __construct() {}

}
