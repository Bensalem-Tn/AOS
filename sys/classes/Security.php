<?php

/**
 * Caractéristiques de sécurité.
 */
final class Security {

	/**
	 * XSS protection
	 * @param string $str Chaîne d'entrée
	 * @return string Chaîne d'entrée avec des entités HTML codées
	 */
	final public static function escape($str) {
		return htmlentities($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	}

	/**
	 * "Arrêter" le constructeur.
	 */
	private function __construct() {}

}
