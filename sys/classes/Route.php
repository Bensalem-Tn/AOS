<?php

/**
 * La classe qui définit l'itinéraire.
 */
final class Route {

	/**
	 * Le nom du contrôleur
	 * @var string
	 */
	private $controller;

	/**
	 * Le nom de la méthode du contrôleur
	 * @var string
	 */
	private $method;

	/**
	 * Expression de chemin de route régulière
	 * @var string
	 */
	private $pattern;

	/**
	 * Constructeur
	 * @param string $controller Le nom du contrôleur
	 * @param string $method Le nom de la méthode du contrôleur
	 * @param string $pattern Expression de chemin de route régulière
	 * @return void
	 */
	public function __construct($controller, $method, $pattern) {
		$this->controller = $controller;
		$this->method = $method;
		$this->pattern = $pattern;
	}

	/**
	 * Vérifie si l'itinéraire est approprié
	 * @param string $request Demande
	 * @param null $args Variable passée par référence dans laquelle nous allons stocker tous les arguments sur demande
	 * @return bool
	 */
	public function isMatched($request, &$args) {
		$result = preg_match($this->pattern, $request, $args);
		unset($args[0]);
		$args = array_values($args);
		return $result;
	}

	/**
	 * Renvoie la valeur de l'attribut $ controller
	 * @return string
	 */
	public function getController() {
		return $this->controller;
	}

	/**
	 * Renvoie la valeur de l'attribut $ method
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * Retourne la valeur de l'attribut $ pattern
	 * @return string
	 */
	public function getPattern() {
		return $this->pattern;
	}

	/**
	 * Représentation en chaîne de l'objet
	 * @return string
	 */
	public function __toString() {
		return sprintf('%s->%s()', $this->controller, $this->method);
	}
}
