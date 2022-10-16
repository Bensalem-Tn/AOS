<?php

/**
 * ArticleController
 */
class ArticleController extends AuthController {

	/**
	 * Itinéraire: /
	 * @return void
	 */
	
	 public function __construct()
	 {
		
	 } 

	public function index() {
		
		$this->set('out_partial',Utils::load_list('partial','id_partial','libelle_partial')) ;	
	
		$this->set('out_state',Utils::load_list('article_state','id_state','libelle_state')) ;	
		$this->set('out_unit',Utils::load_list('unit','id_unit','libelle_unit')) ;
		$this->set('out_location',Utils::load_list('article_location','id_location','libelle_location')) ;
		//var_dump(Utils::load_list('article_location','id_location','libelle_location')) ; die ; 
		$this->set('out_unit_mouv',Utils::load_list('unit_mouv','id_unit_mouv','libelle_unit_mouv')) ;
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/article/index.js');

	}
	


	public function details($code) {
		
		$data=ArticleModel::ArticleDetail($code) ;
		$this->set('item',$data) ;
		
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/article/details.js');

	}
	 
	
	

	public function partial() {
		

		
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/article/partial.js');

	}
	 
	public function unit() {
	
		
			
			$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/article/unit.js');
	
		}

		public function unit_mouv() {
	
		
			
			$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/article/unit_mouv.js');
	
		}

		public function state() {
	
		
			
			$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/article/state.js');
	
		}



		public function location() {
	
			$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/article/location.js');
	
		}
	
		public function analytical() {
			$this->set('out_partial',Utils::load_list('partial','id_partial','libelle_partial')) ;	
			$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/article/analytical.js');
	
		}
	
	
	
}
