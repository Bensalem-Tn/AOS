 <?php

//define("HOST",$_SERVER ['SERVER_ADDR']) ;
define("HOST",$_SERVER ['HTTP_HOST']) ;
//print_r(HOST)  ; die ;
/**
 * 
*Fichier de configuration
 */
 final class Config {

	/**
	 * Le lien absolu de l'application
	 * @var string
	 */
		// define('BASE','http://localhost/mvc_master/') ;
		
	 const BASE = 'http://'.HOST.'/aos/';

	/**
	 * 
	*	Lien d’application relatif (sur la production le plus souvent uniquement) '/')
	 */
	const PATH = '/aos/';

	/**
	 * 
*Partenaire serveur: nom d'hôte
	 * @var string
	 */
	const DB_HOST = 'localhost';

	/**
	 * Сервер БП: корисничко име
	 * @var string
	 */
	const DB_USER = 'root';

	/**
	 * Сервер БП: лозинка
	 * @var string
	 */
	const DB_PASS = '';

	/**
	 * Сервер БП: име базе
	 * @var string
	 */
	const DB_NAME = 'aos';

	/**
	 * 
Variable de session qui stockera l'ID de l'utilisateur lors de la connexion
	 * @var string
	 */
	const USER_COOKIE = 'user_id';
	const USER_ROLE='user' ;
	/**
	 * Chaîne aléatoire ou pseudo-aléatoire de longueur arbitraire
	 * @var string
	 */
	const SALT = '34aa3fb2c440cac0b1cdbb49146a2f34';

}
