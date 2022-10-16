<?php

require_once './sys/autoload.php';
error_reporting(1);

Session::begin();

//Demande de traitement
$request = Http::getRequestedPath();

//Détection de route
$routes = require_once './routes.php';
$args = $foundRoute = null;
foreach ($routes as $route) {
	if ($route->isMatched($request, $args)) {
		$foundRoute = $route;
		break;
	}
}
//die ($arges) ;
// Instancer une classe de contrôleur
$className = $foundRoute->getController() . 'Controller';
$worker = new $className;

// Appel de la méthode __pre
if (method_exists($worker, '__pre')) {
	call_user_func([$worker, '__pre']);
}

// Appel de la méthode de contrôleur appropriée
if (!method_exists($worker, $foundRoute->getMethod())) {
	ob_clean();
	die('CONTROLLER: Method not found.');
}
$methodName = $foundRoute->getMethod();
call_user_func_array([$worker, $methodName],$args);

// Appel de la méthode __post
if (method_exists($worker, '__post')) {
	call_user_func([$worker, '__post']);
}

// Télécharger les données globales
$DATA = $worker->getData();

// Chemin vers les modèles
$admin_header='./app/views/admin/header.php';
$admin_footer='./app/views/admin/footer.php';
$file_header='./app/views/file/header.php';
$file_footer='./app/views/file/footer.php';
$headerView = './app/views/_global/header.php';
$footerView = './app/views/_global/footer.php';
$view = './app/views/' . $foundRoute->getController() . '/' . $foundRoute->getMethod() . '.php';

// En-tête de chargement
if (!file_exists($headerView)) {
	ob_clean();
	die('VIEW: Header file not found.');
}

// Chargement du modèle de vue principale
if (!file_exists($view)) {
	ob_clean();
	die('VIEW: Main template file not found.');
}

// Chargement de footers
if (!file_exists($footerView)) {
	ob_clean();
	die('VIEW: Footer file not found.');
}

// Script JavaScript supplémentaire
$jsModule = sprintf('assets/js/modules/%s_%s.js', $foundRoute->getController(), $foundRoute->getMethod());
//print_r($JsModule) ;die ; 
if (file_exists($jsModule)) {
	$DATA['JAVASCRIPT_MODULE'] = $jsModule;
}
if($foundRoute->getController()==='Home')
{
//die ($foundRoute->getController());
require_once $view;
}
elseif( $foundRoute->getController()==='Admin' )
{
	require_once $admin_header;
	require_once $view;
	require_once $admin_footer;	
}
elseif( $foundRoute->getController()==='File' )
{
//	require_once $file_header;
	require_once $view;
//s	require_once $file_footer;	
}
else
{
require_once $headerView;
require_once $view;
require_once $footerView;
//var_dump(get_included_files());
}

