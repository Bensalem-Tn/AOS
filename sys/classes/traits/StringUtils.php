<?php

/**
 * 
Fonctions auxiliaires pour travailler avec des chaînes
 */
trait StringUtils {

	/**
	 * Vérifier si une chaîne particulière se termine par une autre sous-chaîne
	 * @param string $haystack La première chaîne
	 * @param string $needle La deuxième chaîne
	 * @return bool
	 */
	final public static function endsWith($haystack, $needle) {
		$haystack = substr($haystack, -strlen($needle));
		return $haystack === $needle;
	}

	/**
	 * Vérifier si une chaîne particulière commence par une autre sous-chaîne
	 * @param string $haystack La première chaîne
	 * @param string $needle La deuxième chaîne
	 * @return bool
	 */
	final public static function startsWith($haystack, $needle) {
		$haystack = substr($haystack, 0, strlen($needle));
		return $haystack === $needle;
	}

}
