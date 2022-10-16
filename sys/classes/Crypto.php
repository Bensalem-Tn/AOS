<?php

/**
 * Fonctions liées à la cryptographie.
 */
final class Crypto {

	/**
	 * Un algorithme de chiffrement par bloc symétrique
	 * @var string
	 */
	private static $algo = 'aes-256-cbc';

	/**
	 * SHA-512 fonction de hachage
	 * @param string $password Entrée de fonction de hachage
	 * @param bool $salt La valeur doit être true si nous utilisons ou false si nous n'utilisons pas le paramètre $ salt
	 * @return string Sortie de fonction de hachage
	 */
	final public static function sha512($password, $salt = false) {
		if ($salt) {
			return hash('sha512', $password . Config::SALT);
		} else {
			return hash('sha512', $password);
		}
	}

	/**
	 * Chiffrement de bloc symétrique, la sortie est au format Base64
	 * @param string $plainText Ouvrir le texte
	 * @param string $key Clé symétrique (aes-256-cbc = 256 bits)
	 * @param string $iv Vecteur d'initialisation (aes-256-cbc = 128 bits)
	 * @return string
	 */
	final public static function encrypt($plainText, $key, $iv = false) {
		$cipherText = openssl_encrypt($plainText, self::$algo, $key, OPENSSL_RAW_DATA, $iv);
		return base64_encode($cipherText);
	}

	/**
	 * Déchiffrement de bloc symétrique, l'entrée est au format Base64
	 * @param string $ cipherTextEncoded Code
	 * @param string $key Clé symétrique (aes-256-cbc = 256 bits)
	 * @param string $iv Vecteur d'initialisation (aes-256-cbc = 128 bits)
	 * @return string
	 */
	final public static function decrypt($cipherTextEncoded, $key, $iv = false) {
		$cipherText = base64_decode($cipherTextEncoded);
		$decrypted = openssl_decrypt($cipherText, self::$algo, $key, OPENSSL_RAW_DATA, $iv);
		return $decrypted;
	}

	/**
	 * "Arrêter" le constructeur.
	 */
	private function __construct() {}

}
