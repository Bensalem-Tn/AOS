<?php
/**
 * 
Fonction de chargement automatique personnalisée
 * @param string $className  Nom de la classe
 * @return bool
 */
function load_path($className)
{
	$path = null;
	//var_dump($className) ;
	if (file_exists('./sys/classes/' . $className . '.php')) {
		// Pour inclure des classes du dossier sys / classes
		$path = './sys/classes/' . $className . '.php';}
	elseif (preg_match('|^(?:[A-Z][a-z]+)+Controller$|',$className)) {
		// Allumer le contrôleur
		$path = './app/controllers/' . $className . '.php';
			} 
elseif (preg_match('|^(?:[A-Z][a-z]+)+Model$|', $className)) {
		// Allumer le modèle
		$path = './app/models/' . $className . '.php';
		
		} 
elseif ($className === 'Config') {
		// Inclure un fichier de configuration
		$path = './sys/Config.php';} 
else {
		// Classe non trouvée
		
		die($className.': Class not found.');
	}
	// charger un fichier
	if (file_exists($path)) {
		require_once $path;
		return true;
		
	}
// Fichier non trouvé
var_dump(get_included_files());
echo $path ;
	die('AUTOLOAD: File not found.');
}
spl_autoload_register('load_path');
