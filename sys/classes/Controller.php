<?php

/**
 * Classe de contrôleur abstraite. Chaque contrôleur devrait étendre cette classe.
 */
abstract class Controller {

	/**
	 * Données à partager entre le contrôleur et le modèle d'affichage
	 * @var array
	 */
	private $data = [];

	/**
	 * La méthode par défaut de chaque contrôleur
	 * @return void
	 */
	abstract public function index();

	/**
	 * Ajouter une nouvelle variable à l'ensemble de données
	 * @param string $key Le nom de la variable
	 * @param mixed $value La valeur de la variable
	 * @return void
	 */


	public  static function setGestion_Titre($gestion)
	{
		if(strlen($gestion)===4)
		{return " لسنة ".$gestion ; }
		else if(strlen($gestion)===9)
		{
		return " لسنتي ".$gestion ;}
		else 
		return " للسنوات  ".$gestion ;
	}
	final protected function set($key, $value) {
		$this->data[$key] = $value;
	}
    final protected function setWithout($value) {
		$this->data=json_encode($value,JSON_UNESCAPED_UNICODE);
	}

	function group_by($key, $data) {
		$result = array();
	
		foreach($data as $val) {
			if(array_key_exists($key, $val)){
				$result[$val[$key]][] = $val;
			}else{
				$result[""][] = $val;
			}
		}
	
		return $result;
	}

	/**
	 * Restaurer une série de données
	 * @return array
	 */
	final public function getData() {
		return $this->data;
	}

	/**
	 * Méthode à exécuter avant les méthodes d'index
	 */
	public function __pre() {}

		/**
	 * Méthode à exécuter après les méthodes d'indexation
	 */
	public function __post() {}
}