<?php

/**
 * Classe de redirection.
 */
final class Redirect {

	/**
	 * Redirection interne
	 * @param string $link Lien relatif vers une ressource interne
	 */
	final public static function to($link) {
		ob_clean();
		header('Location: ' . Config::BASE . $link);
		die;
	}

	/**
	 * Redirection externe
	 * @param string $link Un lien absolu vers une ressource (externe)
	 */
	final public static function absolute($link) {
		ob_clean();
		header('Location: ' . $link);
		die;
	}

	/**
	 * "Arrêter" le constructeur.
	 */
	private function __construct() {}

}