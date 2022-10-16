<?php

/**
 * TransfertController
 */
class TransfertController extends AuthController {

	/**
	 * Itinéraire: /
	 * @return void
	 */
	public $_gestion=null ;
	 public function __construct()
	 {
		 $this->_gestion=Model::get_gestion(1) ;
	 } 

	public function index() {

		$this->set('out_article',Utils::load_list('article','code','description')) ;
		$this->set('out_project',Utils::load_list('project','id_project','libelle_project')) ;	
		
			
			$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/transfert/index.js');

		
	}

}
