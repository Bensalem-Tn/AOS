<?php

/**
 * PlanController
 */
class PlanController extends AuthController {

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

		$centrals=['min_dep_credit','min_dep_nomenclature','min_commande','min_paiement','min_facture','min_facture_ordonnance','min_avenant','min_ligne_avenant','min_engagement','min_arrets','min_marche'] ;
		$epas=['epa_dep_credit','epa_dep_nomenclature','epa_commande','epa_paiement','epa_facture','epa_facture_ordonnance','epa_avenant','epa_ligne_avenant','epa_engagement','epa_marche','epa_rec_credit','epa_rec_nomenclature'] ; 
		$communes=['com_dep_credit','com_dep_nomenclature','com_commande','com_paiement','com_facture','com_facture_ordonnance','com_avenant','com_ligne_avenant','com_engagement','com_marche','com_rec_credit','com_rec_nomenclature'] ; 
		$regions=['reg_dep_credit','reg_dep_nomenclature','reg_commande','reg_paiement','reg_facture','reg_facture_ordonnance','reg_avenant','reg_ligne_avenant','reg_engagement','reg_marche','reg_rec_credit','reg_rec_nomenclature'] ; 
		$out=[] ;
			
		$this->set('centrals',$centrals);$this->set('ges_centrals',AdminModel::get_gestions_by_entite('1'));
		$this->set('communes',$communes);$this->set('ges_communes',AdminModel::get_gestions_by_entite('2'));
		$this->set('epas',$epas);$this->set('ges_epas',AdminModel::get_gestions_by_entite('4'));
		$this->set('regions',$regions);$this->set('ges_regions',AdminModel::get_gestions_by_entite('3'));
			foreach($centrals as $central)
			{
				$url="app/views/Admin/json/".$central.".json";
				if(file_exists($url))
				 	{
					   $tab=json_decode(file_get_contents($url),TRUE);
				 	}
				else 
				 	{   
					
					 	$tab =AdminModel::get_total($central) ; 
					   	$fp = fopen($url, 'w');
					   	fwrite($fp, json_encode($tab));
					   	fclose($fp);
				 	}
				$this->set($central,$tab);
			}
			foreach($communes as $commune)
			{
				$url="app/views/Admin/json/".$commune.".json";
				if(file_exists($url))
				 	{
					   $tab=json_decode(file_get_contents($url),TRUE);
				 	}
				else 
				 	{   
					
					 	$tab =AdminModel::get_total($commune) ; 
					   	$fp = fopen($url, 'w');
					   	fwrite($fp, json_encode($tab));
					   	fclose($fp);
				 	}
				$this->set($commune,$tab);
				
			}
			foreach($epas as $epa)
			{
				$url="app/views/Admin/json/".$epa.".json";
				if(file_exists($url))
				 	{
					   $tab=json_decode(file_get_contents($url),TRUE);
				 	}
				else 
				 	{   
					
					 	$tab =AdminModel::get_total($epa) ; 
					   	$fp = fopen($url, 'w');
					   	fwrite($fp, json_encode($tab));
					   	fclose($fp);
				 	}
				$this->set($epa,$tab);
			}
			foreach($regions as $region)
			{
				$url="app/views/Admin/json/".$region.".json";
				if(file_exists($url))
				 	{
					   $tab=json_decode(file_get_contents($url),TRUE);
				 	}
				else 
				 	{   
					
					 	$tab =AdminModel::get_total($region) ; 
					   	$fp = fopen($url, 'w');
					   	fwrite($fp, json_encode($tab));
					   	fclose($fp);
				 	}
				$this->set($region,$tab);
			}
			
			
			$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/index.js');

		
	}
	 public function cache (){

	 }
	 public function centralinsert()
	 {
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/central_insert.js');
	 }
	public function  managerfile(){
		
	}
	public function data_insert($database,$table)
	{
		$this->set('title',$table) ;
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/data_insert.js');
	}

	public function try()
	{
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/try.js');
	}


	public  function load()
	{
		
		$output_ges='<option selected="selected "value="'.$this->_gestion[0]->GESTION.'">'.$this->_gestion[0]->GESTION.'</option>'; 
		for ($i=1;$i<sizeof($this->_gestion);$i++)
				{ 
				$output_ges .= '<option value="'.$this->_gestion[$i]->GESTION.'">'.$this->_gestion[$i]->GESTION.'</option>';
				}
				$output_ges .='</select>' ;
		

       
		$this->set('gestions',$output_ges);
		
		$this->set('title', 'GESTIONNAIRE DE CACHE');
	 $this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/load.js');

	}
	public function user()
	{		
		
		
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/user.js');
	}
	public function insert_data()
	{
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/insert_data.js');
	}
	public function changepass()
	{
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/changepass.js');
	}

	public function chambre()
	{
		$data=AdminModel::get_chambres() ; 
	//	var_dump($data) ; die; 
			$chambres=[] ;
		foreach( $data as $dt)
		{
			//var_dump(AdminModel::get_gouvs($dt['id'])) ; 
			
			$chambres[]=array_merge(array('id'=>$dt['id'],'libelle'=>$dt['libelle'],'gouvs'=>AdminModel::get_gouvs($dt['id']))) ;
			
		}
		//var_dump($chambres) ; die; 
		$this->set('data',$chambres);
		
		//var_dump($dt) ;
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/chambre.js');
	}


	public function departement($gestion)
	{	
		//$lib=AdminModel::get_dept_name(2020,01) ; 
		//var_dump($lib) ;
		//$tab=AdminModel::insert_dept(2020); 
		$tab=AdminModel::get_departement($gestion);
		$data=Utils::group_by("LF",$tab) ;
		//var_dump($data) ;
		///die ;

		$output_ges='<option selected="selected "value="'.$this->_gestion[0]->GESTION.'">'.$this->_gestion[0]->GESTION.'</option>'; 
		for ($i=1;$i<sizeof($this->_gestion);$i++)
			{ 
				$output_ges .= '<option value="'.$this->_gestion[$i]->GESTION.'">'.$this->_gestion[$i]->GESTION.'</option>';
			}
		$output_ges .='</select>' ;
		$this->set('gestions',$output_ges);
		$this->set('data',$data);
		$this->set('JAVASCRIPT_MODULE', 'assets/js/modules/admin/departement.js');
	}
}
