<?php
/**
 * HomeController
 */
class HomeController extends Controller {

	/**
	 * Itinéraire: /
	 * @return void
	 */
	public function index() {
		// Définir un titre
		$this->set('title', 'Home');
		//	var_dump(Session::get("role")) ;
		// Prendre des données de la base de données
		$user = UserModel::getById(Session::get(Config::USER_COOKIE));
		//	var_dump($user); die ;
		// Formatage des données à afficher
		if($user && Session::get("role")=="user") {
			//$this->set('user', TaskController::formatFirstAndLastName($user->first_name, $user->last_name));
		} else {   
			$this->set('user', false);
			Redirect::to('login');
		}
	}

	/**
	 * Рута: /login/
	 * @return void
	 */
	public function login() {
		// Définition d'un titre
		$this->set('title', 'Log in');
			
		// Arrêtez le traitement de la demande au cas où la méthode HTTP ne serait pas appropriée
		if (!Http::isPost()) {
			if (!empty(Session::get(Config::USER_COOKIE))&& Session::get("role")=="user") {
				Redirect::to('');
			}
			return;
		}

		

		// Récupération de données à partir de variables HTTP POST
		$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			
		// Validation des données
		if (empty($login) || empty($password) || strlen($login) > 255) {
			$this->set('message', 'Merci de remplir toutes les champs ');
			return;
		}

		/* Validation des données supplémentaires
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->set('message', 'Error #2!');
			return;
		}*/

		// Valeur de hachage du mot de passe
		$password = Crypto::sha512($password, true);

		// Récupération de la base de données - Authentification utilisateur
		$user = UserModel::getByEmailAndPassword($login, $password);
		if($user->role==='admin')
		{
			$this->set('message', 'Ce compte appartient a un administrateur . Vous devez s\'authentifier via l\'interface Admin');
			return;
		} 
		// Définition d'un cookie de session en cas d'authentification réussie
		if ($user) {
			Session::set(Config::USER_COOKIE, intval($user->id));
			Session::set("role","user") ;
			Session::set("email",$user->email) ;
			Session::set("first_name",$user->first_name) ;
			Session::set("last_name",$user->last_name) ;
			Session::set("login",$user->login) ;
			Redirect::to('');
		} else {
			$this->set('message', 'Merci de verifier votre login et/ou mot de passe');
			
			return;
		}
	}

	/**
	 * Рута: /login/
	 * @return void
	 */
	public function adminlogin() {
		// Définition d'un titre
		$this->set('title', 'Admin Log in');

		// Arrêtez le traitement de la demande au cas où la méthode HTTP ne serait pas appropriée
		if (!Http::isPost()) {
			if (!empty(Session::get(Config::USER_COOKIE))&& Session::get("role")=="admin") {
				Redirect::to('admin/dash');
			}
			return;
		}

		

		// Récupération de données à partir de variables HTTP POST
		$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

		// Validation des données
		if (empty($login) || empty($password) || strlen($login) > 255) {
			$this->set('message', 'Merci de remplir toutes les champs ');
			return;
		}

		/* Validation des données supplémentaires
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->set('message', 'Error #2!');
			return;
		}*/

		// Valeur de hachage du mot de passe
		$password = Crypto::sha512($password, true);

		// Récupération de la base de données - Authentification utilisateur
		$user = UserModel::getByEmailAndPassword($login, $password);
		if($user->role==='user')
		{
			$this->set('message', 'Ce compte appartient a un utilisateur  . Vous devez s\'authentifier via l\'interface Utilisateurs');
			return;
		} 
		// Définition d'un cookie de session en cas d'authentification réussie
		if ($user) {
			Session::set(Config::USER_COOKIE, intval($user->id));
			Session::set('role','admin') ;
			Redirect::to('admin/dash');
		} else {
			$this->set('message', 'Merci de verifier votre login et/ou mot de passe');
			
			return;
		}
	}

	/**
	 * Рута: /logout/
	 * @return void
	 */
	public function adminlogout() {
		// Nettoyer la session
		Session::end();

		// Redirection
		Redirect::to('adminlogin');
	}
	 public function logout() {
		// Nettoyer la session
		Session::end();

		// Redirection
		Redirect::to('login');
	}

	/**
	 * Рута: HTTP 404 Not Found
	 * @return void
	 */
	public function e404() {
		// Définition du code d'état HTTP approprié
		http_response_code(404);

		// Message d'erreur
		//ob_clean();
		//die('HTTP: 404 not 00000000found.');
	}
	public function soon() {
		// Définition du code d'état HTTP approprié
		//http_response_code(404);

		// Message d'erreur
		//ob_clean();
		//die('HTTP: 404 not 00000000found.');
	}
}
