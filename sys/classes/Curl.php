<?php

/**
 * Accès de façade aux fonctions cURL
 */
class Curl {

	/**
	 * GET demande
	 * @var int
	 */
	const GET = CURLOPT_HTTPGET;

	/**
	 * POST demande
	 * @var int
	 */
	const POST = CURLOPT_POST;

	/**
	 * HTTP Basic authentification
	 * @var int
	 */
	const AUTH_BASIC = CURLAUTH_BASIC;

	/**
	 * HTTP Digest authentification
	 * @var int
	 */
	const AUTH_DIGEST = CURLAUTH_DIGEST;

	/**
	 * Nombre de secondes allouées à la fonction cURL pour s'exécuter
	 * @var int
	 */
	const TIMEOUT = 3;

	/**
	 * User-Agent en-tête
	 * @var string
	 */
	const USER_AGENT = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0';

	/**
	 * En-têtes de la liste blanche
	 * @var array
	 */
	const WHITELISTED_HEADERS = [
		'Accept',
		'Cache-Control',
		'X-Csrf-Token'
	];

	/**
	 * Le modèle nécessite
	 * @param int $method Type de demande
	 * @param string $url Uniform Resource Locator
	 * @param array|bool $query Requête (peut également être transmise via une URL pour les demandes de type GET)
	 * @param array|bool $headers En-têtes - vérifier la liste blanche
	 * @param array|bool $auth HTTP authentification @see Curl::authParams
	 * @return string|bool
	 */
	final public static function request($method = self::GET, $url, $query = false, $headers = false, $auth = false) {
		if (!in_array($method, [self::GET, self::POST])) {
			return false;
		}

		if (!filter_var($url, FILTER_VALIDATE_URL)) {
			return false;
		}

		$ch = curl_init();

		if ($method === self::GET && !empty($query)) {
			$url = $url . '?' . http_build_query($query);
		} elseif ($method === self::POST) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
		}

		curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			$method => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => self::TIMEOUT,
			CURLOPT_USERAGENT => self::USER_AGENT,
		]);

		if (is_array($headers)) {
			$headersParsed = [];

			foreach ($headers as $header => $value) {
				$header = ucwords(strtolower($header), '-');
				if (in_array($header, self::WHITELISTED_HEADERS)) {
					$headersParsed[] = "$header: $value";
				}
			}

			curl_setopt($ch, CURLOPT_HTTPHEADER, $headersParsed);
		}

		if ($auth) {
			foreach ($auth as $option => $value) {
				curl_setopt($ch, $option, $value);
			}
		}

		$res = curl_exec($ch);
		$status = intval(curl_getinfo($ch, CURLINFO_RESPONSE_CODE));

		curl_close($ch);

		if ($status !== 200 || empty($res)) {
			return false;
		}

		return $res;
	}

	/**
	 * Préparation des paramètres pour l'authentification HTTP
	 * @param int $type Type d'authentification
	 * @param string $username Nom d'utilisateur
	 * @param string $password Mot de passe
	 * @return array|bool
	 */
	final public static function authParams($type = self::AUTH_BASIC, $username, $password) {
		if (!in_array($type, [self::AUTH_BASIC, self::AUTH_DIGEST])) {
			return false;
		}

		if (!is_string($username) || !is_string($password)) {
			return false;
		}

		return [
			CURLOPT_HTTPAUTH => $type,
			CURLOPT_USERPWD => $username . ':' . $password
		];
	}

	/**
	 * "Arrêter" le constructeur.
	 */
	private function __construct() {}

}
