<?php
class AdminApiController extends ApiController {

	
	public function index() 
	{
		
	}
	public function reload($id)
	{
		$url="app/views/Admin/json/".$id.".json";
		unlink($url) ;
		$tab =AdminModel::get_total($id) ; 
		$fp = fopen($url, 'w');
		fwrite($fp, json_encode($tab));
		fclose($fp);
		echo json_encode($tab); 
		die ;				 	
	}
	public function tableinfo($table)
	{	///$table=$_POST['table'] ;
		$tab=AdminModel::get_table_info($table) ; 
		echo json_encode($tab) ; die ;
	}
	public function changepassword()
	{
		$id=$_POST['user_id'] ; 
		$password=$_POST['new_pass'] ;
		$old_password=$_POST['old_pass'] ; 
		//var_dump ($old_password) ;
		$old=AdminModel::oldpassword($id,$old_password) ;
		if($old)
		{
			$res=AdminModel::changepassword($id,$password) ;
			echo $res ;
		}
		else
		{
			echo 'الرجاء التثبت من كلمة المرور' ;
		}
		
		 
		die ;
	}
	public function deleteGestion ($table,$colonnes,$valeur)
	{
		$res=AdminModel::deleteGestion($table,$colonnes,$valeur) ;
		echo $res ; 
		die ;
	}
	public function deleteAllGestion($entite,$gestion)
	{
			switch ($entite) {
			case 1:
				$tables=array('min_commande','min_engagement','min_facture','min_arrets','min_paiement','min_dep_credit','min_dep_nomenclature','min_facture_ordonnance',);
				$colonnes=array('GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GES_GESTIO');
				break;
			case 2:
				$tables=array('min_commande','min_engagement','min_facture','min_arrets','min_paiement','min_dep_credit','min_dep_nomenclature','min_facture_ordonnance');
				$colonnes=array('GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GES_GESTIO');
				break;
			case 3:
				$tables=array('min_commande','min_engagement','min_facture','min_arrets','min_paiement','min_dep_credit','min_dep_nomenclature','min_facture_ordonnance');
				$colonnes=array('GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GES_GESTIO');
				break;
			case 4:
				$tables=array('min_commande','min_engagement','min_facture','min_arrets','min_paiement','min_dep_credit','min_dep_nomenclature','min_facture_ordonnance');
				$colonnes=array('GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GES_GESTIO');
				break;
		}
		
		$i=0;
		
		foreach($tables as $table)
		{
			$res=AdminModel::deleteGestion($table,$colonnes[$i],$gestion) ;
			echo $res."<br>" ;
		$i++ ; 
		}
		$res=AdminModel::deleteGestion('gestion','CONCAT(GESTION,entite)',$gestion.$entite) ;
			echo $res."<br>" ;
		
		die ;
	}
	public function activateGestion($gestion,$entite)
	{	
		switch ($entite) {
			case 1:
				$tables=array('min_avenant','min_commande','min_engagement','min_facture','min_facture_ordonnance','min_paiement','min_dep_credit','min_dep_nomenclature','min_arrets','min_marche','min_ligne_avenant');
				$colonnes=array('MAR_ANNMAR','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GES_GESTIO','MAR_ANNMAR','MAR_ANNMAR');
				break;
			case 2:
				$tables=array('com_avenant','com_commande','com_engagement','com_facture','com_facture_ordonnance','com_paiement','com_dep_credit','com_dep_nomenclature','com_rec_credit','com_rec_nomenclature','com_marche','com_ligne_avenant');
				$colonnes=array('MAR_ANNMAR','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GESTION','GESTION','MAR_ANNMAR','MAR_ANNMAR');
				break;
			case 3:
				$tables=array('reg_avenant','reg_commande','reg_engagement','reg_facture','reg_facture_ordonnance','reg_paiement','reg_dep_credit','reg_dep_nomenclature','reg_rec_credit','reg_rec_nomenclature','reg_marche','reg_ligne_avenant');
				$colonnes=array('MAR_ANNMAR','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GESTION','GESTION','MAR_ANNMAR','MAR_ANNMAR');
				break;
			case 4:
				$tables=array('epa_avenant','epa_commande','epa_engagement','epa_facture','epa_facture_ordonnance','epa_paiement','epa_dep_credit','epa_dep_nomenclature','epa_rec_credit','epa_rec_nomenclature','epa_marche','epa_ligne_avenant');
				$colonnes=array('MAR_ANNMAR','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GESTION','GESTION','MAR_ANNMAR','MAR_ANNMAR');
				break;
		}
		$i=0;
		$res=AdminModel::existe('gestion','GESTION,entite',$gestion.$entite) ;
		//var_dump($res) ; die ;
		if($res)
		{ echo 'la gestion : '.$gestion. ' est existe déja ... ' ; die ;}
		foreach($tables as $table)
		{
		$res=AdminModel::existe($table,$colonnes[$i],$gestion) ;
		//var_dump($res) ;
		if($res)
		{
			echo 'les données de la gestion : '.$gestion.' existe  <br> ' ; 
		}
		else
		{
			echo 'Il faut introduire les données de la table  : '.$table.' pour la gestion :'.$gestion.' <br> ' ;  die ; 			
		}
		$i++ ; 
		}
		AdminModel::activateGestion($gestion,$entite) ;
		die ;
	}
	public function deletevoid($entite)
	{
		
		switch ($entite) {
			case 1:
				$tables=array('min_avenant','min_commande','min_engagement','min_facture','min_facture_ordonnance','min_paiement','min_dep_credit','min_dep_nomenclature','min_arrets','min_marche','min_ligne_avenant');
				$colonnes=array('MAR_ANNMAR','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GES_GESTIO','MAR_ANNMAR','MAR_ANNMAR');
				break;
			case 2:
				$tables=array('com_avenant','com_commande','com_engagement','com_facture','com_facture_ordonnance','com_paiement','com_dep_credit','com_dep_nomenclature','com_rec_credit','com_rec_nomenclature','com_marche','com_ligne_avenant');
				$colonnes=array('MAR_ANNMAR','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GESTION','GESTION','MAR_ANNMAR','MAR_ANNMAR');
				break;
			case 3:
				$tables=array('reg_avenant','reg_commande','reg_engagement','reg_facture','reg_facture_ordonnance','reg_paiement','reg_dep_credit','reg_dep_nomenclature','reg_rec_credit','reg_rec_nomenclature','reg_marche','reg_ligne_avenant');
				$colonnes=array('MAR_ANNMAR','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GESTION','GESTION','MAR_ANNMAR','MAR_ANNMAR');
				break;
			case 4:
				$tables=array('epa_avenant','epa_commande','epa_engagement','epa_facture','epa_facture_ordonnance','epa_paiement','epa_dep_credit','epa_dep_nomenclature','epa_rec_credit','epa_rec_nomenclature','epa_marche','epa_ligne_avenant');
				$colonnes=array('MAR_ANNMAR','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','GESTION','GESTION','GESTION','GESTION','MAR_ANNMAR','MAR_ANNMAR');
				break;
		}
		$i=0;
		foreach($tables as $table)
		{
		$res=AdminModel::deleteVoid($table,$colonnes[$i]) ;
		$i++ ; 
		}
		die ;
	}
	public function resetDate($entite)
	{	

		switch ($entite) {
			case 1:
				$tables=array('min_avenant','min_avenant','min_avenant','min_commande','min_commande','min_engagement','min_engagement','min_facture','min_facture','min_facture','min_paiement','min_paiement');
		$colonnes=array('USER_DATE','AVE_DATECD','AVE_DATORD','BCD_DATEBC','USER_GES','LEN_DATVIS','USER_GES','FAC_DATREF','FAC_DATORD','USER_GES','PAY_DATEMI','ORD_DATEOR');
				break;
			case 2:
				$tables=array('com_avenant','com_avenant','com_avenant','com_commande','com_commande','com_engagement','com_engagement','com_facture','com_facture','com_facture','com_paiement','com_paiement');
		$colonnes=array('USR_GES','AVE_DATECD','AVE_DATORD','BCD_DATEBC','USER_GES','LEN_DATVIS','USR_GES','FAC_DATREF','FAC_DATORD','USR_DATGES','PAY_DATEMI','ORD_DATEOR');
				break;
			case 3:
				$tables=array('reg_avenant','reg_avenant','reg_commande','reg_engagement','reg_facture','reg_facture','reg_paiement','reg_paiement');
				$colonnes=array('AVE_DATECD','AVE_DATORD','BCD_DATEBC','LEN_DATVIS','FAC_DATREF','FAC_DATORD','PAY_DATEMI','ORD_DATEOR');
				break;
			case 4:
				$tables=array('epa_avenant','epa_avenant','epa_avenant','epa_commande','epa_commande','epa_engagement','epa_engagement','epa_facture','epa_facture','epa_facture','epa_paiement','epa_paiement');
		$colonnes=array('USR_DATGES','AVE_DATECD','AVE_DATORD','BCD_DATEBC','USR_DATGES','LEN_DATVIS','USR_DATGES','FAC_DATREF','FAC_DATORD','USR_DATGES','PAY_DATEMI','ORD_DATEOR');
				break;
		}
		$i=0;
		foreach($tables as $table)
		{
		$res=AdminModel::resetDate($table,$colonnes[$i]) ;
		$i++ ; 
		}
		die ;
	}
	 public function vider($dir)
	{
		$link="app/views/_global/json/".$dir;
		Utils::rrmdir($link) ;
		$dir1="app/views/_global/json/".$dir."/v/";
		$dir2="app/views/_global/json/".$dir."/h/";
		if(!file_exists($dir1)){mkdir($dir1, 0777, true);}
		if(!file_exists($dir2)){mkdir($dir2, 0777, true);}	
		die ;
	}

	 public function getIds($entite,$gestion) 
   {
	   $tab=AdminModel::getIds($entite,$gestion) ; 
	  // var_dump($tab) ;
	   echo json_encode($tab); die; 
   }
	public function getgestion($id) 
	{
			
			$output="";
			$table = Model::get_gestion($id);
			//var_dump($table);
			foreach ($table as $ligne): 
				//var_dump($ligne) ;
				$output .= '<option value="'.$ligne->GESTION.'">'.$ligne->GESTION.'</option>';
				endforeach;
					   $output .='</select>' ;
				echo $output ; die ;
			
	}
	public function try()   
	{ 
		$req=$_POST['req'] ;
		$res=AdminModel::try($req) ;
		//var_dump($res) ;die ;
		$out=array('header'=>array(),'content'=>array()) ;
		if(is_array($res))
		{ 
			if (count($res)==0)
			{
				echo  '{"header":[{"title":""}],"content":[["       "]]}'	;
				
			}
			else 
			{
					$header=array_keys($res[0]) ; 
					foreach ($header as $ligne)
					{
						
						$object = new \stdClass;
						$object->{title}=$ligne ;
						$tab_header[]=$object ;
					}
					$out['header']=$tab_header ; 
					foreach($res as $ligne)
						{
							foreach ($ligne as $l)
								{
									$tab[]=$l ;
								}
							$table[]=$tab ;
							$tab=[];
						}
					$out['content']=$table ;
					echo json_encode($out) ; 
			}
		}
		else 
		{
			echo  '{"header":[{"title":""}],"content":[["  Erreur SQL !     "]]}'	;
		
		}
		 
		die ; 
	 
	}
	public function trytofind($table,$condtion)   
	{ 
		 $res=AdminModel::trytofind($table,$condtion) ;
		echo json_encode($res)   ; die ; 
	  //var_dump($_POST) ; die ;
	}

	public function gouvexist () 
	{
		$id=$_POST['id'] ;
		$sql1="SELECT Code_Gouv  FROM gouv WHERE Code_Gouv='$id'" ; 
		
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo()); 
			
		$size = sizeof($query1->fetchAll());
		echo  $size;
				
	die ;
	}
	public function addgouv() 
	{
			
	   $id=$_POST['id'] ;$nom=$_POST['nom'] ;$chambre_id=$_POST['chambre_id'] ; 
	 
	   $sql1="INSERT INTO `gouv`( `Code_Gouv`, `LibelleReg`, `PAY_GOUVER`, `IdChambre`) VALUES ('$id','$nom','$id','$chambre_id')" ; 
			   $query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
			   $sth=$query1->execute() ;
			   if ($sth == false) {
				   print_r($query1->errorInfo());
					echo $sql1 ;
				   echo "erreur excute <br>";;
			   }	
			   
					   echo DB::getInstance()->lastInsertId() ; 

		   die ;
	}
 	public function addchambre() 
 	{
		 	
		$n=$_POST['nom'] ; 
		// var_dump($n) ; die; 
		$sql1="INSERT INTO `chambre`(`libelle`) VALUES ('$n')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
				echo "erreur excute <br>";;
				}	
				
						echo DB::getInstance()->lastInsertId() ; 

			die ;
 	}

	 public function editchambre() 
 	{
		 	
		$id=$_POST['pk'] ;
		$lib=$_POST['value'] ; 
	    // var_dump($_POST) ; die; 
		 if(isset($id) ||isset($lib)){
		$sql1=" UPDATE chambre SET libelle='$lib' WHERE id='$id'" ; 
		//echo $sql1  ;die ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
				echo "erreur excute <br>";;
				}	
				
			}
			else 
			echo "404 bad request" ;			

			die ;
 	}
	 public function editdept() 
 	{
		 	
		$id=$_POST['pk'] ;
		$lib=$_POST['value'] ; 
	    // var_dump($_POST) ; die; 
		 if(isset($id) ||isset($lib)){
		$sql1=" UPDATE min_departement SET LF_LIBELLE='$lib' WHERE LF='$id'" ; 
		//echo $sql1  ;die ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
				echo "erreur excute <br>";;
				}	
				
			}
			else 
			echo "404 bad request" ;			

			die ;
 	}

	 public function editgouv() 
 	{
		 	
		$id=$_POST['pk'] ;
		$lib=$_POST['value'] ; 
	    // var_dump($_POST) ; die; 
		 if(isset($id) ||isset($lib)){
		$sql1=" UPDATE Gouv SET LibelleReg='$lib' WHERE Code_Gouv='$id'" ; 
		//echo $sql1  ;die ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
				echo "erreur excute <br>";;
				}	
				
			}
			else 
			echo "404 bad request" ;			

			die ;
 	}
	public function updatechambre()
	 {	
		$id=$_POST['id'] ;
		$gouv_id=$_POST['gouv_id'] ; 
		//var_dump($id) ; 
		//var_dump($gouv_id) ; die;  
		$sql1="UPDATE  `gouv` SET IdChambre=$id WHERE Code_Gouv=$gouv_id" ; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
			print_r($query1->errorInfo());
		echo "erreur excute <br>";;
		}	
		else {
			echo "0" ;
		}
		
			echo $sql1 ; 

	die ;
	 }
	  public function deletechambre($id)
	  {
		
		$sql1="DELETE FROM `chambre`  WHERE  id='$id'" ; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
			print_r($query1->errorInfo());
		echo "erreur excute <br>";;
		}	
		else {
			echo $id ;
		}
		
			

	die ;
	  }
	  	public function userlist()
		  {
			$login = (isset($_POST['login'])) ? $_POST['login'] : '';
			$first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : '';
			$last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';
			$email = (isset($_POST['email'])) ? $_POST['email'] : '';
			$password = $first_name.".".$last_name;
			$password = Crypto::sha512($password, true);
			$role = (isset($_POST['role'])) ? $_POST['role'] : '';
			  
			
			$option = (isset($_POST['option'])) ? $_POST['option'] : '';
			$id = (isset($_POST['id'])) ? $_POST['id'] : '';
			
			//var_dump($_POST) ; die; 
			switch($option){
				case 1:
					$sql = "INSERT INTO users (email,login, first_name, last_name, password, role) VALUES('$email','$login', '$first_name', '$last_name','$password', '$role') ";			
					//var_dump($sql) ; die; 
					$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());; 
					
					$sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
					$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$data=$result->fetchAll(PDO::FETCH_ASSOC);       
					break;    
				case 2:        
					$sql = "UPDATE users SET login='$login',email='$email', first_name='$first_name', last_name='$last_name', role='$role' WHERE id='$id' ";		
					$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;        
					
					$sql = "SELECT * FROM users WHERE id='$id' ";       
					$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$data=$result->fetchAll(PDO::FETCH_ASSOC);
					break;
				case 3:        
					$sql = "DELETE FROM users WHERE id='$id' ";		
					$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;                           
					break;
				case 4:    
					$sql = "SELECT * FROM users";
					$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());
					$result->execute() or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());      
					$data=$result->fetchAll(PDO::FETCH_ASSOC);
					break;

				case 5:    
				
					$sql = "UPDATE users SET password='$password'  WHERE id='$id' ";	
					//echo ($sql) ; die; 	
					$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;        
					
					$sql = "SELECT * FROM users WHERE id='$id' ";       
					$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
					$data=$result->fetchAll(PDO::FETCH_ASSOC);
					break;
			}
			
			print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

			 die ;
		  }

	  public function deletegouv()
	  {
		$id=$_POST['id'] ;
		$sql1="DELETE FROM `gouv`  WHERE  Code_Gouv='$id'" ; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
			print_r($query1->errorInfo());
		echo "erreur excute <br>";;
		}	
		else {
			echo $id ;
		}
		
			

	die ;
	  }
	public function com_dep_credit ($ges,$filename)
	{
		$path="../data-insert/data/commune/dep_credit/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
                    
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{		
				$GESTION=addslashes($xml->RECORD[$i]->GESTION);
				$CODE_MUNICI=addslashes($xml->RECORD[$i]->CODE_MUNICI);
				
				$TITRE=addslashes($xml->RECORD[$i]->TITRE);
				$PARTIE=addslashes($xml->RECORD[$i]->PARTIE);
				$CHAPITRE=addslashes($xml->RECORD[$i]->CHAPITRE);
				$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
				$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
				$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
				$RELIQUAT_CREDITS_PAYEMENT=addslashes($xml->RECORD[$i]->RELIQUAT_CREDITS_PAYEMENT);
				$CREDITS_ANNEE_PAYEMENT=addslashes($xml->RECORD[$i]->CREDITS_ANNEE_PAYEMENT);
				$CREDITS_PAYEMENT=addslashes($xml->RECORD[$i]->CREDITS_PAYEMENT);
				$id="$GESTION"."$CODE_MUNICI"."$TITRE"."$PARTIE"."$CHAPITRE"."$ARTICLE"."$PARAGRAPHE"."$SOUS_PARAGRAPHE" ;
				
				$sql1="INSERT INTO com_dep_credit VALUES 
				('$id','$GESTION','$CODE_MUNICI','$TITRE','$PARTIE','$CHAPITRE','$ARTICLE','$PARAGRAPHE','$SOUS_PARAGRAPHE','$RELIQUAT_CREDITS_PAYEMENT','$CREDITS_ANNEE_PAYEMENT','$CREDITS_PAYEMENT')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
				echo "erreur excute <br>";;
				}
			}
			
	  		$total=AdminModel::get_total('com_dep_credit') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;
	}
	public function com_engagement ($ges,$filename)
	{
		$path="../data-insert/data/commune/engagement/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 	
		for($i=0;$i<$nbr;$i++)
					{
						$ENG_NUMERO=addslashes($xml->RECORD[$i]->ENG_NUMERO) ;$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
						$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;$ENG_BENEFI=addslashes($xml->RECORD[$i]->ENG_BENEFI) ;
						$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
						$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR);$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
						$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE);$RGI_NUMREG=addslashes($xml->RECORD[$i]->RGI_NUMREG) ;
						$ENG_OBJDEP=addslashes($xml->RECORD[$i]->ENG_OBJDEP);$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
						$MUN_MUNICI=addslashes($xml->RECORD[$i]->MUN_MUNICI) ;$TIT_TITRES=addslashes($xml->RECORD[$i]->TIT_TITRES) ;
						$PRT_PARTIE=addslashes($xml->RECORD[$i]->PRT_PARTIE) ;$ART_ARTICL=addslashes($xml->RECORD[$i]->ART_ARTICL) ;
						$PAR_PARAGR=addslashes($xml->RECORD[$i]->PAR_PARAGR) ;$SPA_SPARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG) ;
						$LEN_MNTACD=addslashes($xml->RECORD[$i]->LEN_MNTACD);$LEN_MNTDEG=addslashes($xml->RECORD[$i]->LEN_MNTDEG) ;
						$LEN_MNTORD=addslashes($xml->RECORD[$i]->LEN_MNTORD);$LEN_NOVISA=addslashes($xml->RECORD[$i]->LEN_NOVISA);
						$LEN_DATVIS=addslashes($xml->RECORD[$i]->LEN_DATVIS);$LEN_NATDEP=addslashes($xml->RECORD[$i]->LEN_NATDEP);                       
						$USR_NUM=addslashes($xml->RECORD[$i]->USR_NUM);$USR_NOM=addslashes($xml->RECORD[$i]->USR_NOM);                    
						$USR_GES=addslashes($xml->RECORD[$i]->USR_GES);$LEN_DATVIS=Utils::toDate($LEN_DATVIS) ;$USR_GES=Utils::toDate($USR_GES) ; 
						$sql1="INSERT INTO `com_engagement` VALUES('$ENG_NUMERO','$FRS_TYPFRS','$FRS_NUMFRS','$ENG_BENEFI','$MAR_ANNMAR','$MAR_NUMERO','$RBM_RUBMAR','$PRE_ANNPRE','$PRE_NUMPRE','$RGI_NUMREG','$ENG_OBJDEP','$GES_GESTIO','$MUN_MUNICI','$TIT_TITRES','$PRT_PARTIE','$ART_ARTICL','$PAR_PARAGR', '$SPA_SPARAG','$LEN_MNTACD','$LEN_MNTDEG','$LEN_MNTORD','$LEN_NOVISA','$LEN_DATVIS','$LEN_NATDEP','$USR_NUM','$USR_NOM','$USR_GES')" ; 
						$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
						print_r($query1->errorInfo());
						echo $sql1 ; 
						}
					}
					$total=AdminModel::get_total('com_engagement') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function com_facture   ($ges,$filename)
	{
		$path="../data-insert/data/commune/facture/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
 				$MUN_MUNICI=addslashes($xml->RECORD[$i]->MUN_MUNICI) ;
				$FAC_NUMERO=addslashes($xml->RECORD[$i]->FAC_NUMERO) ; 
 				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
 				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;
 				$FRS_NOMFRS=addslashes($xml->RECORD[$i]->FRS_NOMFRS) ;
 				$FAC_DATREF=Utils::toDate(addslashes($xml->RECORD[$i]->FAC_DATREF));
 				$FAC_REFFAC=addslashes($xml->RECORD[$i]->FAC_REFFAC) ;
 				$FAC_NATFAC=addslashes($xml->RECORD[$i]->FAC_NATFAC);
 				$BCD_NUMERO=addslashes($xml->RECORD[$i]->BCD_NUMERO) ;
 				$FAC_DATORD=Utils::toDate(addslashes($xml->RECORD[$i]->FAC_DATORD));
 				$FAC_MNTFAC=addslashes($xml->RECORD[$i]->FAC_MNTFAC) ;
 				$FAC_MNTORD=addslashes($xml->RECORD[$i]->FAC_MNTORD) ;
				$FAC_MNTPAY=addslashes($xml->RECORD[$i]->FAC_MNTPAY) ;
				$USR_NUM=addslashes($xml->RECORD[$i]->USR_NUM) ;
 				$USR_NOM=addslashes($xml->RECORD[$i]->USR_NOM) ;
				$USR_DATGES=Utils::toDate(addslashes($xml->RECORD[$i]->USR_DATGES)) ; 
				 
 				$sql1="INSERT INTO `com_facture` VALUES(
				'$GES_GESTIO','$MUN_MUNICI','$FAC_NUMERO','$FRS_TYPFRS','$FRS_NUMFRS','$FRS_NOMFRS','$FAC_DATREF',
				'$FAC_REFFAC','$FAC_NATFAC','$BCD_NUMERO','$FAC_DATORD','$FAC_MNTFAC','$FAC_MNTORD','$FAC_MNTPAY','$USR_NUM','$USR_NOM','$USR_DATGES')" ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
						if ($sth == false) {
						print_r($query1->errorInfo());
						echo $sql1 ; 
						}
			}		
			$total=AdminModel::get_total('com_facture') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function com_facture_ordonnance ($ges,$filename)
	{
		$path="../data-insert/data/commune/facture_ordonnance/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$MUN_MUNICI=addslashes($xml->RECORD[$i]->MUN_MUNICI) ;
				$FAC_NUMERO=addslashes($xml->RECORD[$i]->FAC_NUMERO) ;
				$ORD_NUMERO=addslashes($xml->RECORD[$i]->ORD_NUMERO) ;
				$OFA_MNTORD=addslashes($xml->RECORD[$i]->OFA_MNTORD) ;
				$OFA_MNTPAY=addslashes($xml->RECORD[$i]->OFA_MNTPAY) ;
				$sql1="INSERT INTO `com_facture_ordonnance`VALUES 
				('$GES_GESTIO','$MUN_MUNICI','$FAC_NUMERO','$ORD_NUMERO','$OFA_MNTORD','$OFA_MNTPAY')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
									$sth=$query1->execute() ;
									if ($sth == false) {
									print_r($query1->errorInfo());
									echo $sql1 ; 
									}
			}
			$total=AdminModel::get_total('com_facture_ordonnance') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	} 
	public function com_commande ($ges,$filename)
	 {
		$path="../data-insert/data/commune/commande/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$MUN_MUNICI=addslashes($xml->RECORD[$i]->MUN_MUNICI);
				$BCD_NUMERO=addslashes($xml->RECORD[$i]->BCD_NUMERO);
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS);
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS);
				$BCD_OBJETS=addslashes($xml->RECORD[$i]->BCD_OBJETS);
				$BCD_DATEBC=Utils::toDate(addslashes($xml->RECORD[$i]->BCD_DATEBC));
				$BCD_ENGNUM=addslashes($xml->RECORD[$i]->BCD_ENGNUM);
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO);
				$TIT_TITRES=addslashes($xml->RECORD[$i]->TIT_TITRES);
				$PRT_PARTIE=addslashes($xml->RECORD[$i]->PRT_PARTIE);
				$ART_ARTICL=addslashes($xml->RECORD[$i]->ART_ARTICL);
				$PAR_PARAGR=addslashes($xml->RECORD[$i]->PAR_PARAGR);
				$SPA_SPARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG);
				$BCD_MNTFAC=addslashes($xml->RECORD[$i]->BCD_MNTFAC);
				$LCM_MNTCOM=addslashes($xml->RECORD[$i]->LCM_MNTCOM);
				$LCM_MNTORD=addslashes($xml->RECORD[$i]->LCM_MNTORD);
				$LCM_MNTPAY=addslashes($xml->RECORD[$i]->LCM_MNTPAY);
				$USER_NUM=addslashes($xml->RECORD[$i]->USER_NUM);
				$USER_NOM=addslashes($xml->RECORD[$i]->USER_NOM);
				$USER_GES=Utils::toDate(addslashes($xml->RECORD[$i]->USER_GES));
				$sql1="INSERT INTO com_commande  VALUES ('$MUN_MUNICI', '$BCD_NUMERO', '$FRS_TYPFRS', '$FRS_NUMFRS', '$BCD_OBJETS', '$BCD_DATEBC', '$BCD_ENGNUM', '$GES_GESTIO', '$TIT_TITRES', '$PRT_PARTIE', '$ART_ARTICL', '$PAR_PARAGR', '$SPA_SPARAG', '$BCD_MNTFAC', '$LCM_MNTCOM', '$LCM_MNTORD', '$LCM_MNTPAY', '$USER_NUM', '$USER_NOM', '$USER_GES')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
									$sth=$query1->execute() ;
									if ($sth == false) {
									print_r($query1->errorInfo());
									echo $sql1 ; 
									}
			}
		$total=AdminModel::get_total('com_commande') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	 }
	 public function com_paiement ($ges,$filename)
	{
		$path="../data-insert/data/commune/paiement/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
					$PAY_CENEDI=addslashes($xml->RECORD[$i]->PAY_CENEDI) ;$PAY_GESEMI=addslashes($xml->RECORD[$i]->PAY_GESEMI) ;
					$PAY_GESORI=addslashes($xml->RECORD[$i]->PAY_GESORI) ;$PAY_TITRES=addslashes($xml->RECORD[$i]->PAY_TITRES) ;
					$PAY_CHAPIT=addslashes($xml->RECORD[$i]->PAY_CHAPIT) ;$PAY_MUNICI=addslashes($xml->RECORD[$i]->PAY_MUNICI) ;
					$PAY_ARTICL=addslashes($xml->RECORD[$i]->PAY_ARTICL) ;$PAY_PARAGR=addslashes($xml->RECORD[$i]->PAY_PARAGR);
					$PAY_SPARAG=addslashes($xml->RECORD[$i]->PAY_SPARAG) ;$PAY_NUMORD=addslashes($xml->RECORD[$i]->PAY_NUMORD);
					$PAY_NUMMAR=addslashes($xml->RECORD[$i]->PAY_NUMMAR) ;$PAY_CODBNQ=addslashes($xml->RECORD[$i]->PAY_CODBNQ);
					$PAY_CPTBENT=addslashes($xml->RECORD[$i]->PAY_CPTBENT) ;$PAY_NOMBEN=addslashes($xml->RECORD[$i]->PAY_NOMBEN) ;
					$PAY_ADRBEN=addslashes($xml->RECORD[$i]->PAY_ADRBEN) ;$PAY_OBJETS=addslashes($xml->RECORD[$i]->PAY_OBJETS) ;
					$PAY_CODRET=addslashes($xml->RECORD[$i]->PAY_CODRET) ;$PAY_CEDRET=addslashes($xml->RECORD[$i]->PAY_CEDRET) ;
					$PAY_MTBRUT=addslashes($xml->RECORD[$i]->PAY_MTBRUT) ;$PAY_DATEMI=addslashes($xml->RECORD[$i]->PAY_DATEMI);
					$PAY_NOVISA=addslashes($xml->RECORD[$i]->PAY_NOVISA) ;$PAY_TYPTIP=addslashes($xml->RECORD[$i]->PAY_TYPTIP);
					$PAY_NUMTIP=addslashes($xml->RECORD[$i]->PAY_NUMTIP);$PAY_NUMBRD=addslashes($xml->RECORD[$i]->PAY_NUMBRD);
					$PAY_TYPFRS=addslashes($xml->RECORD[$i]->PAY_TYPFRS);$PAY_NUMFRS=addslashes($xml->RECORD[$i]->PAY_NUMFRS);                       
					$ORD_DATEOR=addslashes($xml->RECORD[$i]->ORD_DATEOR);$NOM_USR=addslashes($xml->RECORD[$i]->NOM_USR); 
					$PAY_DATEMI=Utils::toDate($PAY_DATEMI) ;
					 //echo strlen(trim($ORD_DATEOR))."<br>" ;
					if(strlen(trim($ORD_DATEOR))==7){
						
						///echo "if0000000000 <br> " ;
						$ORD_DATEOR="0".$ORD_DATEOR ;}
					$ORD_DATEOR=Utils::toDate($ORD_DATEOR) ;
					$sql1="INSERT INTO com_paiement (`PAY_CENEDI`, `PAY_GESEMI`, `PAY_GESORI`, `PAY_TITRES`, `PAY_CHAPIT`, `PAY_MUNICI`, `PAY_ARTICL`, `PAY_PARAGR`, `PAY_SPARAG`, `PAY_NUMORD`, `PAY_NUMMAR`, `PAY_CODBNQ`, `PAY_CPTBEN`, `PAY_NOMBEN`, `PAY_ADRBEN`, `PAY_OBJETS`, `PAY_CODRET`, `PAY_CEDRET`, `PAY_MTBRUT`, `PAY_DATEMI`, `PAY_NOVISA`, `PAY_TYPTIP`, `PAY_NUMTIP`, `PAY_NUMBRD`, `PAY_TYPFRS`, `PAY_NUMFRS`, `ORD_DATEOR`) VALUES (
					'$PAY_CENEDI','$PAY_GESEMI','$PAY_GESORI','$PAY_TITRES','$PAY_CHAPIT','$PAY_MUNICI','$PAY_ARTICL','$PAY_PARAGR','$PAY_SPARAG','$PAY_NUMORD','$PAY_NUMMAR','$PAY_CODBNQ','$PAY_CPTBENT','$PAY_NOMBEN','$PAY_ADRBEN','$PAY_OBJETS','$PAY_CODRET','$PAY_CEDRET','$PAY_MTBRUT','$PAY_DATEMI','$PAY_NOVISA','$PAY_TYPTIP','$PAY_NUMTIP','$PAY_NUMBRD','$PAY_TYPFRS','$NOM_USR','$ORD_DATEOR')" ;
					$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
					$sth=$query1->execute() ;
					if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
					}
			}
			$total=AdminModel::get_total('com_paiement') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br> ";  
			die ;
	}
	public function com_avenant($ges,$filename) 
	{
		$path="../data-insert/data/commune/avenant/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$MUN_MUNICI=addslashes($xml->RECORD[$i]->MUN_MUNICI) ;
				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$AVE_NUMERO=addslashes($xml->RECORD[$i]->AVE_NUMERO) ;
				$BNQ_BANQUE=addslashes($xml->RECORD[$i]->BNQ_BANQUE) ;
				$BNQ_AGENCE=addslashes($xml->RECORD[$i]->BNQ_AGENCE) ;
				$TCO_TYPCOM=addslashes($xml->RECORD[$i]->TCO_TYPCOM);
				$TMA_TYPMAR=addslashes($xml->RECORD[$i]->TMA_TYPMAR) ;
				$MDP_MODPAS=addslashes($xml->RECORD[$i]->MDP_MODPAS);
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS);
				$AVE_OBJETS=addslashes($xml->RECORD[$i]->AVE_OBJETS) ;
				$AVE_OBJMAR=addslashes($xml->RECORD[$i]->AVE_OBJMAR) ;
				$AVE_DATORD=Utils::toDate(addslashes($xml->RECORD[$i]->AVE_DATORD)) ;
				$AVE_DATECD=Utils::toDate(addslashes($xml->RECORD[$i]->AVE_DATECD)) ;
				$AVE_NUMPVCM=addslashes($xml->RECORD[$i]->AVE_NUMPVCM) ;
				$AVE_NANTIS=addslashes($xml->RECORD[$i]->AVE_NANTIS) ;
				$AVE_TOLERE=addslashes($xml->RECORD[$i]->AVE_TOLERE) ;
				$MAR_ANNPER=addslashes($xml->RECORD[$i]->MAR_ANNPER) ;
				$MAR_NUMPER=addslashes($xml->RECORD[$i]->MAR_NUMPER) ;
				$AVE_DUREES=addslashes($xml->RECORD[$i]->AVE_DUREES) ;
				$USR_NUM=addslashes($xml->RECORD[$i]->USR_NUM) ;
				$USR_NOM=addslashes($xml->RECORD[$i]->USR_NOM) ;
				$USR_GES=Utils::toDate(addslashes($xml->RECORD[$i]->USR_GES)) ;

				
						if(strlen(trim($MUN_MUNICI))==0)
						{
							echo "ligne vide ... <br>" ;
						} 
						else{
				$sql1="INSERT INTO com_avenant VALUES
				('$MUN_MUNICI','$MAR_ANNMAR','$MAR_NUMERO','$AVE_NUMERO','$BNQ_BANQUE','$BNQ_AGENCE','$TCO_TYPCOM',
				'$TMA_TYPMAR','$MDP_MODPAS','$FRS_TYPFRS','$FRS_NUMFRS','$AVE_OBJETS','$AVE_OBJMAR','$AVE_DATORD',
				'$AVE_DATECD','$AVE_NUMPVCM','$AVE_NANTIS','$AVE_TOLERE','$MAR_ANNPER','$MAR_NUMPER','$AVE_DUREES',
				'$USR_NUM','$USR_NOM','$USR_GES')" ;   
				//echo $sql1 ; die;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
				}	
			}
		}
		$total=AdminModel::get_total('com_avenant') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;


    

		}
	public function com_ligne_avenant($ges,$filename) 
	{
		$path="../data-insert/data/commune/ligne_avenant/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ;// var_dump($xml->RECORD[0]->MUN_MUNICI) ;die;
		for($i=0;$i<$nbr;$i++)
			{
						$MUN_MUNICI=addslashes($xml->RECORD[$i]->MUN_MUNICI) ;
						$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
						$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
						$AVE_NUMERO=addslashes($xml->RECORD[$i]->AVE_NUMERO) ;
						$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
						$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
						$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
						$LAV_MNTAVE=trim(addslashes($xml->RECORD[$i]->LAV_MNTAVE)) ;
						if(strlen(trim($MUN_MUNICI))==0)
						{
							echo "ligne vide ... <br>" ;
						} 
						else{
				$sql1="INSERT INTO `com_ligne_avenant`  VALUES 
				('$MUN_MUNICI', '$MAR_ANNMAR', '$MAR_NUMERO', '$AVE_NUMERO', '$RBM_RUBMAR', '$PRE_ANNPRE', '$PRE_NUMPRE','$LAV_MNTAVE')" ; 
				//echo $sql1 ; die;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
				}	
			}
		}
		$total=AdminModel::get_total('com_ligne_avenant') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;

	}
	public function com_rec_nomenclature($ges,$filename)
	{
		$path="../data-insert/data/commune/rec_nomenclature/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
				{	
					$GESTION=addslashes($xml->RECORD[$i]->GESTION) ;
					$CODE_MINICI=addslashes($xml->RECORD[$i]->CODE_MUNICI); 
					
					$TITRE=addslashes($xml->RECORD[$i]->TITRE) ;
					$CATEGORIE=addslashes($xml->RECORD[$i]->CATEGORIE) ;
					$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE) ;
					$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE) ;
					$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE) ;
					$LIBELLE=addslashes($xml->RECORD[$i]->LIBELLE) ;
					$id=$GESTION.$CODE_MINICI.$TITRE.$CATEGORIE.$ARTICLE.$PARAGRAPHE.$SOUS_PARAGRAPHE;
					$sql1="INSERT INTO `com_rec_nomenclature`VALUES 
					('$id','$GESTION','$CODE_MINICI','$TITRE','$CATEGORIE','$ARTICLE','$PARAGRAPHE','$SOUS_PARAGRAPHE','$LIBELLE')" ; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
		print_r($query1->errorInfo());
		echo $sql1 ; 
		}	
		}
		$total=AdminModel::get_total('com_rec_nomenclature') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function com_rec_credit ($ges,$filename)
	{
		$path="../data-insert/data/commune/rec_credit/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
		{	
			$GESTION=addslashes($xml->RECORD[$i]->GESTION);
			$CODE_MUNICI=addslashes($xml->RECORD[$i]->CODE_MUNICI);
			$TITRE=addslashes($xml->RECORD[$i]->TITRE);
			$CATEGORIE=addslashes($xml->RECORD[$i]->CATEGORIE);
			$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
			$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
			$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
			$CREDITS_PREVUS=trim(addslashes($xml->RECORD[$i]->CREDITS_PREVUS));
			$CREDITS_REALISEES=trim(addslashes($xml->RECORD[$i]->CREDITS_REALISEES));
			$id=$GESTION.$CODE_MUNICI.$TITRE.$CATEGORIE.$ARTICLE.$PARAGRAPHE.$SOUS_PARAGRAPHE;
			$CODE_GOUVER=substr($CODE_MUNICI,0,2) ;
			$sql1="INSERT INTO `com_rec_credit` VALUES (
			'$id','$GESTION','$CODE_MUNICI','$TITRE','$CATEGORIE','$ARTICLE','$PARAGRAPHE','$SOUS_PARAGRAPHE','$CREDITS_PREVUS','$CREDITS_REALISEES')" ; 
			$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
			$sth=$query1->execute() ;
			if ($sth == false) {
			print_r($query1->errorInfo());
			echo $sql1 ; 
				}	
		}
		$total=AdminModel::get_total('com_rec_credit') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
		public function com_dep_nomenclature ($ges,$filename)
{
		$path="../data-insert/data/commune/dep_nomenclature/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{		
				$GESTION=addslashes($xml->RECORD[$i]->GESTION);
				$CODE_MUNICI=addslashes($xml->RECORD[$i]->CODE_MUNICI);
				if($CODE_MUNICI=="") $CODE_MUNICI=addslashes($xml->RECORD[$i]->CODE_MINICI);
				$TITRE=addslashes($xml->RECORD[$i]->TITRE);
				$PARTIE=addslashes($xml->RECORD[$i]->PARTIE);
				$CHAPITRE=addslashes($xml->RECORD[$i]->CHAPITRE);
				$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
				$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
				$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
				$LIBELLE=trim(addslashes($xml->RECORD[$i]->LIBELLE));
				$id="$GESTION"."$CODE_MUNICI"."$TITRE"."$PARTIE"."$CHAPITRE"."$ARTICLE"."$PARAGRAPHE"."$SOUS_PARAGRAPHE" ;
				//var_dump($CODE_MUNICI)  ; die ;
				if(trim($CODE_MUNICI)!="")
				{$sql1="INSERT INTO com_dep_nomenclature VALUES 
				('$id','$GESTION','$CODE_MUNICI','$TITRE','$PARTIE','$CHAPITRE','$ARTICLE','$PARAGRAPHE','$SOUS_PARAGRAPHE','$LIBELLE')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
				echo "erreur excute <br>";
				}
				}
				else
				{
				echo " un ligne vide ... <br>" ; 
				}
			}
			$total=AdminModel::get_total('com_dep_nomenclature') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
}

	public function com_marche ($ges,$filename)
	{
		$path="../data-insert/data/commune/marche/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$MAR_OBJETS=addslashes($xml->RECORD[$i]->MAR_OBJETS) ;
				$MUN_MUNICI=addslashes($xml->RECORD[$i]->MUN_MUNICI) ;
				$MAR_TYPFOU=addslashes($xml->RECORD[$i]->MAR_TYPFOU) ;
				$MAR_CODFOU=addslashes($xml->RECORD[$i]->MAR_CODFOU) ;
				$FRS_RAISON=addslashes($xml->RECORD[$i]->FRS_RAISON);
				$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
				$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE);
				$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
				$LMA_MNTSIG=addslashes($xml->RECORD[$i]->LMA_MNTSIG);
				$LMA_MNTENG=addslashes($xml->RECORD[$i]->LMA_MNTENG) ;
				$LMA_MNTORD=addslashes($xml->RECORD[$i]->LMA_MNTORD) ;
				$LMA_MNTPAY=addslashes($xml->RECORD[$i]->LMA_MNT_PAY) ;
				
						$sql1="INSERT INTO com_marche  VALUES 
						('$MAR_ANNMAR','$MAR_NUMERO','$MAR_OBJETS','$MUN_MUNICI','$MAR_TYPFOU','$MAR_CODFOU','$FRS_RAISON','$RBM_RUBMAR',
						'$PRE_ANNPRE','$PRE_NUMPRE','$LMA_MNTSIG','$LMA_MNTENG','$LMA_MNTORD','$LMA_MNTPAY')" ; 		
						$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
							echo $sql1 ; 
							}	
					
			}
			$total=AdminModel::get_total('com_marche') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;	
	}


	//REGIONS ///REGIONS REGIONS REGIONS REGIONS 


	public function reg_dep_credit ($ges,$filename)
	{
		$path="../data-insert/data/region/dep_credit/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{		
					$GESTION=addslashes($xml->RECORD[$i]->GESTION);
					$CODE_GOUVER=addslashes($xml->RECORD[$i]->CODE_GOUVER);
					$TITRE=addslashes($xml->RECORD[$i]->TITRE);
					$SECTION=addslashes($xml->RECORD[$i]->SECTION);
					$CHAPITRE=addslashes($xml->RECORD[$i]->CHAPITRE);
					$DIVISION=addslashes($xml->RECORD[$i]->DIVISION);
					$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
					$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
					$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
					$RELIQUAT_CREDITS_PAYEMENT=addslashes($xml->RECORD[$i]->RELIQUAT_CREDITS_PAYEMENT);
					$CREDITS_ANNEE_PAYEMENT=addslashes($xml->RECORD[$i]->CREDITS_ANNEE_PAYEMENT);
					$CREDITS_PAYEMENT=addslashes($xml->RECORD[$i]->CREDITS_PAYEMENT);
					$id="$GESTION"."$CODE_GOUVER"."$TITRE"."$SECTION"."$CHAPITRE"."$DIVISION"."$ARTICLE"."$PARAGRAPHE"."$SOUS_PARAGRAPHE" ; 
					$sql1="INSERT INTO reg_dep_credit VALUES 
					('$id','$GESTION','$CODE_GOUVER','$TITRE','$SECTION','$CHAPITRE','$DIVISION','$ARTICLE','$PARAGRAPHE','$SOUS_PARAGRAPHE','$RELIQUAT_CREDITS_PAYEMENT','$CREDITS_ANNEE_PAYEMENT','$CREDITS_PAYEMENT')" ;
					$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
					$sth=$query1->execute() ;
					if ($sth == false) {
						print_r($query1->errorInfo());
					echo "erreur excute <br>";
					}
			}
			$total=AdminModel::get_total('reg_dep_credit') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;
	}
	public function reg_engagement ($ges,$filename)
	{
		$path="../data-insert/data/region/engagement/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 	
		for($i=0;$i<$nbr;$i++)
					{
						$ENG_NUMERO=addslashes($xml->RECORD[$i]->ENG_NUMERO);
						$FRS_TYPFRS=trim(addslashes($xml->RECORD[$i]->FRS_TYPFRS));
						$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS);
						$ENG_BENEFI=addslashes($xml->RECORD[$i]->ENG_BENEFI);
						$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR);
						$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO);
						$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR);
						$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE);
						$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE);
						$RGI_NUMREG=addslashes($xml->RECORD[$i]->RGI_NUMREG);
						$ENG_OBJDEP=addslashes($xml->RECORD[$i]->ENG_OBJDEP);
						$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO);
						$GVR_GOUVER=addslashes($xml->RECORD[$i]->GVR_GOUVER);
						$TIT_TITRES=addslashes($xml->RECORD[$i]->TIT_TITRES);
						$SEC_SECTIO=addslashes($xml->RECORD[$i]->SEC_SECTIO);
						$CHP_CHAPIT=addslashes($xml->RECORD[$i]->CHP_CHAPIT);
						$DIV_DIVISI=addslashes($xml->RECORD[$i]->DIV_DIVISI);
						$ART_ARTICL=addslashes($xml->RECORD[$i]->ART_ARTICL);
						$PAR_PARAGR=addslashes($xml->RECORD[$i]->PAR_PARAGR);
						$SPA_SPARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG);
						$LEN_MNTACD=addslashes($xml->RECORD[$i]->LEN_MNTACD);
						$LEN_MNTDEG=addslashes($xml->RECORD[$i]->LEN_MNTDEG);
						$LEN_MNTORD=addslashes($xml->RECORD[$i]->LEN_MNTORD);
						$LEN_NOVISA=addslashes($xml->RECORD[$i]->LEN_NOVISA);
						$LEN_DATVIS=Utils::toDate(addslashes($xml->RECORD[$i]->LEN_DATVIS));
						$LEN_NATDEP=addslashes($xml->RECORD[$i]->LEN_NATDEP);
						if(strlen(trim($GVR_GOUVER))==0)
 						{$GVR_GOUVER=0;}
						$sql1="INSERT INTO reg_engagement VALUES (
						'$ENG_NUMERO', '$FRS_TYPFRS','$FRS_NUMFRS','$ENG_BENEFI','$MAR_ANNMAR', '$MAR_NUMERO', '$RBM_RUBMAR', '$PRE_ANNPRE', '$PRE_NUMPRE', '$RGI_NUMREG', '$ENG_OBJDEP', '$GES_GESTIO', '$GVR_GOUVER', '$TIT_TITRES', '$SEC_SECTIO', '$CHP_CHAPIT',
						'$DIV_DIVISI', '$ART_ARTICL', '$PAR_PARAGR', '$SPA_SPARAG', '$LEN_MNTACD', '$LEN_MNTDEG', '$LEN_MNTORD', '$LEN_NOVISA', '$LEN_DATVIS', '$LEN_NATDEP')" ; 
						$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
						print_r($query1->errorInfo());
						echo $sql1 ; 
						}
					}
					$total=AdminModel::get_total('reg_engagement') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function reg_facture   ($ges,$filename)
	{
		$path="../data-insert/data/region/facture/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$GVR_GOUVER=addslashes($xml->RECORD[$i]->GVR_GOUVER) ;
				$FAC_NUMERO=addslashes($xml->RECORD[$i]->FAC_NUMERO) ; 
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;
				$FRS_NOMFRS=trim(addslashes($xml->RECORD[$i]->FRS_NOMFRS)) ;
				$FAC_DATREF=Utils::toDate(addslashes($xml->RECORD[$i]->FAC_DATREF));
				$FAC_REFFAC=addslashes($xml->RECORD[$i]->FAC_REFFAC) ;
				$FAC_NATFAC=addslashes($xml->RECORD[$i]->FAC_NATFAC);
				$BCD_NUMERO=addslashes($xml->RECORD[$i]->BCD_NUMERO) ;
				$FAC_DATORD=Utils::toDate(addslashes($xml->RECORD[$i]->FAC_DATORD));
				$FAC_MNTFAC=addslashes($xml->RECORD[$i]->FAC_MNTFAC) ;
				$FAC_MNTORD=addslashes($xml->RECORD[$i]->FAC_MNTORD) ;
				$FAC_MNTPAY=addslashes($xml->RECORD[$i]->FAC_MNTPAY) ;
				if(strlen(trim($GES_GESTIO))==0)
					$GES_GESTIO=0;
				if(strlen(trim($GVR_GOUVER))==0)
					$GVR_GOUVER=0 ;
				$sql1="INSERT INTO `reg_facture`  VALUES
 				('$GES_GESTIO','$GVR_GOUVER','$FAC_NUMERO', '$FRS_TYPFRS','$FRS_NUMFRS','$FRS_NOMFRS','$FAC_DATREF','$FAC_REFFAC','$FAC_NATFAC','$BCD_NUMERO','$FAC_DATORD','$FAC_MNTFAC','$FAC_MNTORD','$FAC_MNTPAY')" ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
						if ($sth == false) {
						print_r($query1->errorInfo());
						echo $sql1 ; 
						}
			}		
			$total=AdminModel::get_total('reg_facture') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function reg_facture_ordonnance ($ges,$filename)
	{
		$path="../data-insert/data/region/facture_ordonnance/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
 				$GVR_GOUVER=addslashes($xml->RECORD[$i]->GVR_GOUVER) ;
 				$FAC_NUMERO=addslashes($xml->RECORD[$i]->FAC_NUMERO) ;
 				$ORD_NUMERO=addslashes($xml->RECORD[$i]->ORD_NUMERO) ;
 				$OFA_MNTORD=addslashes($xml->RECORD[$i]->OFA_MNTORD) ;
 				$OFA_MNTPAY=addslashes($xml->RECORD[$i]->OFA_MNTPAY) ;
 				if(strlen(trim($GVR_GOUVER))==0)
				$GVR_GOUVER=0 ;
				$sql1="INSERT INTO `reg_facture_ordonnance` VALUES('$GES_GESTIO','$GVR_GOUVER','$FAC_NUMERO','$ORD_NUMERO','$OFA_MNTORD','$OFA_MNTPAY') " ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
									$sth=$query1->execute() ;
									if ($sth == false) {
									print_r($query1->errorInfo());
									echo $sql1 ; 
									}
			}
			$total=AdminModel::get_total('reg_facture_ordonnance') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	} 
	public function reg_commande ($ges,$filename)
	 {
		$path="../data-insert/data/region/commande/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GVR_GOUVER=addslashes($xml->RECORD[$i]->GVR_GOUVER) ;
				$BCD_NUMERO=addslashes($xml->RECORD[$i]->BCD_NUMERO) ;
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;
				$BCD_OBJETS=addslashes($xml->RECORD[$i]->BCD_OBJETS) ;
				$BCD_DATEBC=Utils::toDate(addslashes($xml->RECORD[$i]->BCD_DATEBC)) ;
				$BCD_ENGNUM=addslashes($xml->RECORD[$i]->BCD_ENGNUM) ;
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$TIT_TITRES=addslashes($xml->RECORD[$i]->TIT_TITRES) ;
				$SEC_SECTIO=addslashes($xml->RECORD[$i]->SEC_SECTIO) ;
				$CHP_CHAPIT=addslashes($xml->RECORD[$i]->CHP_CHAPIT) ;
				$DIV_DIVISI=addslashes($xml->RECORD[$i]->DIV_DIVISI) ;
				$ART_ARTICL=addslashes($xml->RECORD[$i]->ART_ARTICL) ;
				$PAR_PARAGR=addslashes($xml->RECORD[$i]->PAR_PARAGR) ;
				$SPA_SPARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG) ;
				$BCD_MNTFAC=addslashes($xml->RECORD[$i]->BCD_MNTFAC) ;
				$LCM_MNTCOM=addslashes($xml->RECORD[$i]->LCM_MNTCOM) ;
				$LCM_MNTORD=addslashes($xml->RECORD[$i]->LCM_MNTORD) ;
				$LCM_MNTPAY=addslashes($xml->RECORD[$i]->LCM_MNTPAY) ;   
				if(strlen(trim($GVR_GOUVER))==0)
					{$GVR_GOUVER=0;}
				$sql1="INSERT INTO reg_commande VALUES ('$GVR_GOUVER','$BCD_NUMERO',
				'$FRS_TYPFRS','$FRS_NUMFRS','$BCD_OBJETS','$BCD_DATEBC','$BCD_ENGNUM','$GES_GESTIO','$TIT_TITRES','$SEC_SECTIO','$CHP_CHAPIT','$DIV_DIVISI','$ART_ARTICL','$PAR_PARAGR','$SPA_SPARAG','$BCD_MNTFAC','$LCM_MNTCOM','$LCM_MNTORD', '$LCM_MNTPAY')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
									$sth=$query1->execute() ;
									if ($sth == false) {
									print_r($query1->errorInfo());
									echo $sql1 ; 
									}
			}
			$total=AdminModel::get_total('reg_commande') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	 }
	 public function reg_paiement ($ges,$filename)
	{
		$path="../data-insert/data/region/paiement/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$PAY_CENEDI=addslashes($xml->RECORD[$i]->PAY_CENEDI) ;
				$PAY_GESEMI=addslashes($xml->RECORD[$i]->PAY_GESEMI) ;
				$PAY_GESORI=addslashes($xml->RECORD[$i]->PAY_GESORI) ;
				$PAY_TITRES=addslashes($xml->RECORD[$i]->PAY_TITRES) ;
				$PAY_CHAPIT=addslashes($xml->RECORD[$i]->PAY_CHAPIT) ;
				$PAY_GOUVER=addslashes($xml->RECORD[$i]->PAY_GOUVER) ;
				$PAY_DIVISI=addslashes($xml->RECORD[$i]->PAY_DIVISI) ;
				$PAY_ARTICL=addslashes($xml->RECORD[$i]->PAY_ARTICL) ;
				$PAY_PARAGR=addslashes($xml->RECORD[$i]->PAY_PARAGR) ;
				$PAY_SPARAG=addslashes($xml->RECORD[$i]->PAY_SPARAG) ;
				$PAY_NUMORD=addslashes($xml->RECORD[$i]->PAY_NUMORD) ;
				$PAY_NUMMAR=addslashes($xml->RECORD[$i]->PAY_NUMMAR) ;
				$PAY_CODBNQ=addslashes($xml->RECORD[$i]->PAY_CODBNQ) ;
				$PAY_CPTBEN=addslashes($xml->RECORD[$i]->PAY_CPTBEN) ;
				$PAY_NOMBEN=addslashes($xml->RECORD[$i]->PAY_NOMBEN) ;
				$PAY_ADRBEN=addslashes($xml->RECORD[$i]->PAY_ADRBEN) ;
				$PAY_OBJETS=addslashes($xml->RECORD[$i]->PAY_OBJETS) ;
				$PAY_CODRET=addslashes($xml->RECORD[$i]->PAY_CODRET) ;
				$PAY_CEDRET=addslashes($xml->RECORD[$i]->PAY_CEDRET) ;
				$PAY_MTBRUT=addslashes($xml->RECORD[$i]->PAY_MTBRUT) ;
				$PAY_DATEMI=Utils::toDate(addslashes($xml->RECORD[$i]->PAY_DATEMI)) ;
				$PAY_NOVISA=addslashes($xml->RECORD[$i]->PAY_NOVISA) ;
				$PAY_TYPTIP=addslashes($xml->RECORD[$i]->PAY_TYPTIP) ;
				$PAY_NUMTIP=addslashes($xml->RECORD[$i]->PAY_NUMTIP) ;
				$PAY_NUMBRD=addslashes($xml->RECORD[$i]->PAY_NUMBRD) ;
				$PAY_TYPFRS=addslashes($xml->RECORD[$i]->PAY_TYPFRS) ;
				$PAY_NUMFRS=addslashes($xml->RECORD[$i]->PAY_NUMFRS) ;
				$ORD_DATEOR=Utils::toDate(addslashes($xml->RECORD[$i]->ORD_DATEOR)) ;
				
				
				if(strlen(trim($PAY_GOUVER))==0)
				 {$PAY_GOUVER=0;}
				 
				$sql1="INSERT INTO reg_paiement VALUES (
				'$PAY_CENEDI', '$PAY_GESEMI', '$PAY_GESORI', '$PAY_TITRES', '$PAY_CHAPIT', '$PAY_GOUVER', '$PAY_DIVISI', '$PAY_ARTICL', '$PAY_PARAGR', '$PAY_SPARAG', '$PAY_NUMORD', '$PAY_NUMMAR', '$PAY_CODBNQ',
				 '$PAY_CPTBEN', '$PAY_NOMBEN', '$PAY_ADRBEN', '$PAY_OBJETS', '$PAY_CODRET', '$PAY_CEDRET', '$PAY_MTBRUT', '$PAY_DATEMI', '$PAY_NOVISA', '$PAY_TYPTIP', '$PAY_NUMTIP', '$PAY_NUMBRD', '$PAY_TYPFRS', '$PAY_NUMFRS', '$ORD_DATEOR')"; 
					$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
					$sth=$query1->execute() ;
					if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
					}
			}
			$total=AdminModel::get_total('reg_paiement') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br> ";  
			die ;
	}
	public function reg_avenant($ges,$filename) 
	{
		$path="../data-insert/data/region/avenant/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$MAR_GOUVER=addslashes($xml->RECORD[$i]->MAR_GOUVER) ;
 				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
 				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
 				$AVE_NUMERO=addslashes($xml->RECORD[$i]->AVE_NUMERO) ;
 				$BNQ_BANQUE=addslashes($xml->RECORD[$i]->BNQ_BANQUE) ;
 				$BNQ_AGENCE=addslashes($xml->RECORD[$i]->BNQ_AGENCE) ;
 				$TCO_TYPCOM=addslashes($xml->RECORD[$i]->TCO_TYPCOM);
				$TMA_TYPMAR=addslashes($xml->RECORD[$i]->TMA_TYPMAR) ;
 				$MDP_MODPAS=addslashes($xml->RECORD[$i]->MDP_MODPAS);
 				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
 				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS);
 				$AVE_OBJETS=addslashes($xml->RECORD[$i]->AVE_OBJETS) ;
 				$AVE_OBJMAR=addslashes($xml->RECORD[$i]->AVE_OBJMAR) ;
 				$AVE_DATORD=Utils::toDate(addslashes($xml->RECORD[$i]->AVE_DATORD)) ;
				$AVE_DATECD=Utils::toDate(addslashes($xml->RECORD[$i]->AVE_DATECD)) ;
 				$AVE_NUMPVCM=addslashes($xml->RECORD[$i]->AVE_NUPVCM) ;
 				$AVE_NANTIS=addslashes($xml->RECORD[$i]->AVE_NANTIS) ;
 				$AVE_TOLERE=addslashes($xml->RECORD[$i]->AVE_TOLERE) ;
 				$MAR_ANNPER=addslashes($xml->RECORD[$i]->MAR_ANNPER) ;
 				$MAR_NUMPER=addslashes($xml->RECORD[$i]->MAR_NUMPER) ;
 				$AVE_DUREES=addslashes($xml->RECORD[$i]->AVE_DUREES) ;
				if(strlen(trim($MAR_GOUVER))==0)
 					{$MAR_GOUVER=0;}
				
						if(strlen(trim($MAR_GOUVER))==0)
						{
							echo "ligne vide ... <br>" ;
						} 
						else{
				$sql1="INSERT INTO reg_avenant VALUES
				('$MAR_GOUVER','$MAR_ANNMAR','$MAR_NUMERO','$AVE_NUMERO','$BNQ_BANQUE','$BNQ_AGENCE','$TCO_TYPCOM',
				'$TMA_TYPMAR','$MDP_MODPAS','$FRS_TYPFRS','$FRS_NUMFRS','$AVE_OBJETS','$AVE_OBJMAR','$AVE_DATORD',
				'$AVE_DATECD','$AVE_NUMPVCM','$AVE_NANTIS','$AVE_TOLERE','$MAR_ANNPER','$MAR_NUMPER','$AVE_DUREES')" ;   
				//echo $sql1 ; die;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
				}	
			}
		}
		$total=AdminModel::get_total("reg_avenant");
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;


    

		}
	public function reg_ligne_avenant($ges,$filename) 
	{
		$path="../data-insert/data/region/ligne_avenant/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ;// var_dump($xml->RECORD[0]->MUN_MUNICI) ;die;
		for($i=0;$i<$nbr;$i++)
			{
				$MAR_GOUVER=addslashes($xml->RECORD[$i]->MAR_GOUVER) ;
						$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
						$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
						$AVE_NUMERO=addslashes($xml->RECORD[$i]->AVE_NUMERO) ;
						$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
						$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
						$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
						$LAV_MNTAVE=trim(addslashes($xml->RECORD[$i]->LAV_MNTAVE)) ;
						if(strlen(trim($MAR_GOUVER))==0)
						{
							echo "ligne vide ... <br>" ;
						} 
						else{
				$sql1="INSERT INTO `reg_ligne_avenant`  VALUES 
				('$MAR_GOUVER', '$MAR_ANNMAR', '$MAR_NUMERO', '$AVE_NUMERO', '$RBM_RUBMAR', '$PRE_ANNPRE', '$PRE_NUMPRE','$LAV_MNTAVE')" ; 
				//echo $sql1 ; die;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
				}	
			}
		}
		$total=AdminModel::get_total('reg_ligne_avenant') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;

	}
	public function reg_rec_nomenclature($ges,$filename)
	{
		$path="../data-insert/data/region/rec_nomenclature/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
				{	
					$GESTION=addslashes($xml->RECORD[$i]->GESTION);
					$CODE_GOUVER=addslashes($xml->RECORD[$i]->CODE_GOUVER);
					$TITRE=addslashes($xml->RECORD[$i]->TITRE);
					$CATEGORIE=addslashes($xml->RECORD[$i]->CATEGORIE);
					$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
					$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
					$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
					$LIBELLE=addslashes($xml->RECORD[$i]->LIBELLE);
					$id="$GESTION"."$CODE_GOUVER"."$TITRE"."$CATEGORIE"."$ARTICLE"."$PARAGRAPHE"."$SOUS_PARAGRAPHE"; 
					$sql1="INSERT INTO reg_rec_nomenclature VALUES 
						('$id','$GESTION','$CODE_GOUVER','$TITRE','$CATEGORIE','$ARTICLE','$PARAGRAPHE',$SOUS_PARAGRAPHE,'$LIBELLE')" ; 
						$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
							echo $sql1 ; 
						}	
				}
				$total=AdminModel::get_total('reg_rec_nomenclature') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function reg_rec_credit ($ges,$filename)
	{
		$path="../data-insert/data/region/rec_credit/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
		{	
				$GESTION=addslashes($xml->RECORD[$i]->GESTION);
				$CODE_GOUVER=addslashes($xml->RECORD[$i]->CODE_GOUVER);
				$TITRE=addslashes($xml->RECORD[$i]->TITRE);
				$CATEGORIE=addslashes($xml->RECORD[$i]->CATEGORIE);
				$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
				$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
				$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
				$CREDITS_PREVUS=addslashes($xml->RECORD[$i]->CREDITS_PREVUS);
				$CREDITS_REALISEES=addslashes($xml->RECORD[$i]->CREDITS_REALISEES);
				$id="$GESTION"."$CODE_GOUVER"."$TITRE"."$CATEGORIE"."$ARTICLE"."$PARAGRAPHE"."$SOUS_PARAGRAPHE"; 
				$sql1="INSERT INTO reg_rec_credit VALUES 
				('$id','$GESTION','$CODE_GOUVER','$TITRE','$CATEGORIE','$ARTICLE','$PARAGRAPHE',$SOUS_PARAGRAPHE,'$CREDITS_PREVUS','$CREDITS_REALISEES')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
					}	
		}
		$total=AdminModel::get_total('reg_rec_credit') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
		public function reg_dep_nomenclature ($ges,$filename)
{
		$path="../data-insert/data/region/dep_nomenclature/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{		
						$GESTION=addslashes($xml->RECORD[$i]->GESTION);
						$CODE_GOUVER=addslashes($xml->RECORD[$i]->CODE_GOUVER);
						$TITRE=addslashes($xml->RECORD[$i]->TITRE);
						$SECTION=addslashes($xml->RECORD[$i]->SECTION);
						$CHAPITRE=addslashes($xml->RECORD[$i]->CHAPITRE);
						$DIVISION=addslashes($xml->RECORD[$i]->DIVISION);
						$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
						$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
						$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
						$LIBELLE=trim(addslashes($xml->RECORD[$i]->LIBELLE));
						$id="$GESTION"."$CODE_GOUVER"."$TITRE"."$SECTION"."$CHAPITRE"."$DIVISION"."$ARTICLE"."$PARAGRAPHE"."$SOUS_PARAGRAPHE" ; 
						
						
						$sql1="INSERT INTO reg_dep_nomenclature VALUES 
						('$id','$GESTION','$CODE_GOUVER','$TITRE','$SECTION','$CHAPITRE','$DIVISION','$ARTICLE','$PARAGRAPHE','$SOUS_PARAGRAPHE','$LIBELLE')" ; 
						$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
					echo "erreur excute <br>";;
							}
			}
			$total=AdminModel::get_total('reg_dep_nomenclature') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
}

	public function reg_marche ($ges,$filename)
	{
		$path="../data-insert/data/region/marche/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$MAR_OBJETS=addslashes($xml->RECORD[$i]->MAR_OBJETS) ;
				$MAR_GOUVER=addslashes($xml->RECORD[$i]->MAR_GOUVER) ;
				$FRS_TYPFOU=addslashes($xml->RECORD[$i]->FRS_TYPFOU) ;
				$FRS_CODFOU=addslashes($xml->RECORD[$i]->FRS_CODFOU) ;
				$FRS_RAISON=addslashes($xml->RECORD[$i]->FRS_RAISON) ;
				$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
				$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
				$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
				$LMA_MNTSIG=intval($xml->RECORD[$i]->LMA_MNTSIG) ;
				$LMA_MNTENG=intval($xml->RECORD[$i]->LMA_MNTENG) ;
				$LMA_MNTORD=intval($xml->RECORD[$i]->LMA_MNTORD) ;
				$LMA_MNTPAY=intval($xml->RECORD[$i]->LMA_MNTPAY) ;
					$sql1="INSERT INTO reg_marche VALUES ('$MAR_ANNMAR','$MAR_NUMERO','$MAR_OBJETS','$MAR_GOUVER','$FRS_TYPFOU','$FRS_CODFOU','$FRS_RAISON','$RBM_RUBMAR','$PRE_ANNPRE','$PRE_NUMPRE','$LMA_MNTSIG','$LMA_MNTENG','$LMA_MNTORD','$LMA_MNTPAY')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
							echo $sql1 ; 
							}	
					}
			
					$total=AdminModel::get_total('reg_marche') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;	
	}





	///// CENTRAL CENTRAL CENTRAL CENTRAL CENTRAL CENTRAL CENTRAL CENTRAL 


	public function min_dep_credit ($ges,$filename)
	{
		$path="../data-insert/data/central/dep_credit/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
					$GESTION=addslashes($xml->RECORD[$i]->GESTION);
					$DEPARTEMENT=addslashes($xml->RECORD[$i]->DEPARTEMENT);
					$DELEGATION=addslashes($xml->RECORD[$i]->DELEGATION);
					$TITRE=addslashes($xml->RECORD[$i]->TITRE);
					$FONDS=addslashes($xml->RECORD[$i]->FONDS);
					$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
					$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
					$REGION=addslashes($xml->RECORD[$i]->REGION);
					$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
					$CREDITS_LOI_FINANCE=addslashes($xml->RECORD[$i]->CRELFI);
					$VIREMENT_PLUS=addslashes($xml->RECORD[$i]->VIRPLU);
					$VIREMENT_MOINS=addslashes($xml->RECORD[$i]->VIRMOI);
					$CREDITS_COM=addslashes($xml->RECORD[$i]->CRECOM);
					$ABACRE=addslashes($xml->RECORD[$i]->ABACRE);
					$CREDITS_PAYES=addslashes($xml->RECORD[$i]->CRD_PAYES);
					$id="$GESTION"."$DEPARTEMENT"."$DELEGATION"."$TITRE"."$FONDS"."$ARTICLE"."$PARAGRAPHE"."$REGION"."$SOUS_PARAGRAPHE" ; 
					$sql1="INSERT INTO min_dep_credit VALUES 
					('$id','$GESTION','$DEPARTEMENT','$DELEGATION','$TITRE','$FONDS','$ARTICLE','$PARAGRAPHE','$REGION','$SOUS_PARAGRAPHE','$CREDITS_LOI_FINANCE','$VIREMENT_PLUS','$VIREMENT_MOINS','$CREDITS_COM','$ABACRE','$CREDITS_PAYES')" ; 

				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
							echo $sql1 ; 
							}	
					}
			
					$total=AdminModel::get_total('min_dep_credit') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;	
	}
	public function min_engagement ($ges,$filename)
	{
		$path="../data-insert/data/central/engagement/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 	
		for($i=0;$i<$nbr;$i++)
					{
						$NUM_ENGAGEMENT=addslashes($xml->RECORD[$i]->ENG_NUMERO);
									$TYPE_FOUR=addslashes($xml->RECORD[$i]->FRS_TYPFRS);
						$CODE_FOUR=addslashes($xml->RECORD[$i]->FRS_NUMFRS);
						$NOM_BENEFICIAIRE=addslashes($xml->RECORD[$i]->ENG_BENEFI);
						$ANNEE_MARCHE=addslashes($xml->RECORD[$i]->MAR_ANNMAR);
						$NUMERO_MARCHE=addslashes($xml->RECORD[$i]->MAR_NUMERO);
						$RUBRIQUE_MARCHE=addslashes($xml->RECORD[$i]->RBM_RUBMAR);
						$ANNEE_PRET=addslashes($xml->RECORD[$i]->PRE_ANNPRE);
						$NUMERO_PRET=addslashes($xml->RECORD[$i]->PRE_NUMPRE);
						$NUMERO_REGIE=addslashes($xml->RECORD[$i]->RGI_NUMREG);
						$OBJET_DEPENSE=addslashes($xml->RECORD[$i]->ENG_OBJDEP);
						$GESTION=addslashes($xml->RECORD[$i]->GES_GESTIO);
						$CODE_DEPARTEMENT=addslashes($xml->RECORD[$i]->DEP_CHAPIT);
						$CODE_DELEGATION=addslashes($xml->RECORD[$i]->DEL_DELEGA);
						$TITRE=addslashes($xml->RECORD[$i]->TIT_TITRES);
						$PARTIE=addslashes($xml->RECORD[$i]->PRT_PARTIE);
						$NO_FONDS=addslashes($xml->RECORD[$i]->FDO_FNDOFF);
						$ARTICLE=addslashes($xml->RECORD[$i]->ART_ARTICL);
						$PARAGRAPHE=addslashes($xml->RECORD[$i]->PAR_PARAGR);
						$CODE_REGION=addslashes($xml->RECORD[$i]->RGN_REGION);
						$SOUS_PARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG);
						$MONTANT_VISE=addslashes($xml->RECORD[$i]->LEN_MNTACD);
						$MONTANT_DEGAGE=addslashes($xml->RECORD[$i]->LEN_MNTDEG);
						$MONTANT_ORDONNANCE=addslashes($xml->RECORD[$i]->LEN_MNTORD);
						$NUMERO_VISA=addslashes($xml->RECORD[$i]->LEN_NOVISA);
						$DATE_VISA=Utils::toDate(addslashes($xml->RECORD[$i]->LEN_DATVIS));
						$NATURE_DEPENSE=addslashes($xml->RECORD[$i]->LEN_NATDEP);
						$USER_NOM=addslashes($xml->RECORD[$i]->USER_NOM);
						$USER_GES=Utils::toDate(addslashes($xml->RECORD[$i]->USER_GES));

						$sql1="INSERT INTO min_engagement VALUES ('$NUM_ENGAGEMENT','$TYPE_FOUR','$CODE_FOUR','$NOM_BENEFICIAIRE','$ANNEE_MARCHE','$NUMERO_MARCHE','$RUBRIQUE_MARCHE','$ANNEE_PRET','$NUMERO_PRET','$NUMERO_REGIE','$OBJET_DEPENSE','$GESTION','$CODE_DEPARTEMENT','$CODE_DELEGATION','$TITRE','$PARTIE','$NO_FONDS','$ARTICLE','$PARAGRAPHE','$CODE_REGION','$SOUS_PARAG','$MONTANT_VISE','$MONTANT_DEGAGE','$MONTANT_ORDONNANCE','$NUMERO_VISA','$DATE_VISA','$NATURE_DEPENSE','$USER_NOM','$USER_GES')" ; 
 						$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
						print_r($query1->errorInfo());
						echo $sql1 ; 
						}
					}
					$total=AdminModel::get_total('min_engagement') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function min_facture   ($ges,$filename)
	{
		$path="../data-insert/data/central/facture/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$DEP_CHAPIT=addslashes($xml->RECORD[$i]->DEP_CHAPIT) ;
				$DEP_SECTIO=addslashes($xml->RECORD[$i]->DEP_SECTIO) ;
				$DEL_DELEGA=addslashes($xml->RECORD[$i]->DEL_DELEGA) ;
				$FAC_NUMERO=addslashes($xml->RECORD[$i]->FAC_NUMERO) ; 
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;
				$FRS_NOMFRS=trim(addslashes($xml->RECORD[$i]->FRS_NOMFRS)) ;
				$FAC_DATREF=Utils::toDate(addslashes($xml->RECORD[$i]->FAC_DATREF));
				$FAC_REFFAC=addslashes($xml->RECORD[$i]->FAC_REFFAC) ;
				 $FAC_NATFAC=addslashes($xml->RECORD[$i]->FAC_NATFAC);
				 $BCD_NUMERO=addslashes($xml->RECORD[$i]->BCD_NUMERO) ;
				 $FAC_DATORD=Utils::toDate(addslashes($xml->RECORD[$i]->FAC_DATORD));
				 $FAC_MNTFAC=addslashes($xml->RECORD[$i]->FAC_MNTFAC) ;
				 $FAC_MNTORD=addslashes($xml->RECORD[$i]->FAC_MNTORD) ;
				 $FAC_MNTPAY=addslashes($xml->RECORD[$i]->FAC_MNTPAY) ;
				$USER_NOM=addslashes($xml->RECORD[$i]->USER_NOM) ;
				 $USER_DATE=Utils::toDate(addslashes($xml->RECORD[$i]->USER_DATE)) ;
				 $USER_N=addslashes($xml->RECORD[$i]->USER_N) ;
				$sql1="INSERT INTO `min_facture`  VALUES
				 ('$GES_GESTIO', '$DEP_CHAPIT','$DEP_SECTIO','$DEL_DELEGA','$FAC_NUMERO', '$FRS_TYPFRS','$FRS_NUMFRS','$FRS_NOMFRS','$FAC_DATREF','$FAC_REFFAC','$FAC_NATFAC','$BCD_NUMERO','$FAC_DATORD','$FAC_MNTFAC','$FAC_MNTORD','$FAC_MNTPAY','$USER_NOM','$USER_DATE','$USER_N')" ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
						if ($sth == false) {
						print_r($query1->errorInfo());
						echo $sql1 ; 
						}
			}		
			$total=AdminModel::get_total('min_facture') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function min_facture_ordonnance ($ges,$filename)
	{
		$path="../data-insert/data/central/facture_ordonnance/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$DEP_CHAPIT=addslashes($xml->RECORD[$i]->DEP_CHAPIT) ;
				$DEP_SECTIO=addslashes($xml->RECORD[$i]->DEP_SECTIO) ;
				$DEL_DELEGA=addslashes($xml->RECORD[$i]->DEL_DELEGA) ;
				$FAC_NUMERO=addslashes($xml->RECORD[$i]->FAC_NUMERO) ;
				$ORD_NUMERO=addslashes($xml->RECORD[$i]->ORD_NUMERO) ;
				$OFA_MNTORD=addslashes($xml->RECORD[$i]->OFA_MNTORD) ;
				$OFA_MNTPAY=addslashes($xml->RECORD[$i]->OFA_MNTPAY) ;
				$sql1="INSERT INTO `min_facture_ordonnance` VALUES(
				'$GES_GESTIO','$DEP_CHAPIT','$DEP_SECTIO','$DEL_DELEGA','$FAC_NUMERO','$ORD_NUMERO','$OFA_MNTORD','$OFA_MNTPAY') " ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
									$sth=$query1->execute() ;
									if ($sth == false) {
									print_r($query1->errorInfo());
									echo $sql1 ; 
									}
			}
			$total=AdminModel::get_total('min_facture_ordonnance') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	} 
	public function min_commande ($ges,$filename)
	 {
		$path="../data-insert/data/central/commande/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$BCD_NUMERO=addslashes($xml->RECORD[$i]->BCD_NUMERO) ;
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;
				$BCD_OBJETS=addslashes($xml->RECORD[$i]->BCD_OBJETS) ;
				$BCD_DATEBC=Utils::toDate(addslashes($xml->RECORD[$i]->BCD_DATEBC)) ;
				$BCD_ENGNUM=addslashes($xml->RECORD[$i]->BCD_ENGNUM) ;
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$DEP_CHAPIT=addslashes($xml->RECORD[$i]->DEP_CHAPIT) ;
				$DEL_DELEGA=addslashes($xml->RECORD[$i]->DEL_DELEGA) ;
				$TIT_TITRES=addslashes($xml->RECORD[$i]->TIT_TITRES) ;
				$PRT_PARTIE=addslashes($xml->RECORD[$i]->PRT_PARTIE) ;
				$FDO_FNDOFF=addslashes($xml->RECORD[$i]->FDO_FNDOFF) ;
				$ART_ARTICL=addslashes($xml->RECORD[$i]->ART_ARTICL) ;
				$PAR_PARAGR=addslashes($xml->RECORD[$i]->PAR_PARAGR) ;
				$RGN_REGION=addslashes($xml->RECORD[$i]->RGN_REGION) ;
				$SPA_SPARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG) ;
				$BCD_MNTFAC=addslashes($xml->RECORD[$i]->BCD_MNTFAC) ;
				$LCM_MNTCOM=addslashes($xml->RECORD[$i]->LCM_MNTCOM) ;
				$LCM_MNTORD=addslashes($xml->RECORD[$i]->LCM_MNTORD) ;
				$LCM_MNTPAY=addslashes($xml->RECORD[$i]->LCM_MNTPAY) ;
				$USR_CODE=addslashes($xml->RECORD[$i]->USR_CODE) ;
				$USR_DATE=Utils::toDate(addslashes($xml->RECORD[$i]->USR_DATE)) ;
				$USR_NOM=addslashes($xml->RECORD[$i]->USR_NOM) ;
				$sql1="INSERT INTO min_commande VALUES ('$BCD_NUMERO','$FRS_TYPFRS','$FRS_NUMFRS','$BCD_OBJETS','$BCD_DATEBC','$BCD_ENGNUM','$GES_GESTIO','$DEP_CHAPIT','$DEL_DELEGA','$TIT_TITRES','$PRT_PARTIE','$FDO_FNDOFF','$ART_ARTICL','$PAR_PARAGR','$RGN_REGION','$SPA_SPARAG','$BCD_MNTFAC','$LCM_MNTCOM','$LCM_MNTORD','$LCM_MNTPAY','$USR_CODE','$USR_DATE','$USR_NOM')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
									$sth=$query1->execute() ;
									if ($sth == false) {
									print_r($query1->errorInfo());
									echo $sql1 ; 
									}
			}
		$total=AdminModel::get_total('min_commande') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	 }
	 public function min_paiement ($ges,$filename)
	{ 
		$path="../data-insert/data/central/paiement/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$CENTRE_COMPTABLE=addslashes($xml->RECORD[$i]->PAY_CENEDI) ;
					$GESTION_EMISSION=addslashes($xml->RECORD[$i]->PAY_GESEMI) ;
					$GESTION_ORIGINE=addslashes($xml->RECORD[$i]->PAY_GESORI) ;
					$TITRE=addslashes($xml->RECORD[$i]->PAY_TITRES) ;
					$CHAP_OFFICIEL__LOI_DE_FINANCES=addslashes($xml->RECORD[$i]->PAY_CHAPIT) ;
					$CODE_DEPARTEMENT=addslashes($xml->RECORD[$i]->DEP_CHAPIT) ;
					$CODE_DELEGATION=addslashes($xml->RECORD[$i]->PAY_DELEGA) ;
					$PARTIE=addslashes($xml->RECORD[$i]->PAY_PARTIE) ;
					$NUMERO_DU_FONDS=addslashes($xml->RECORD[$i]->PAY_FNDOFF) ;
					$ARTICLE=addslashes($xml->RECORD[$i]->PAY_ARTICL) ;
					$PARAGRAPHE=addslashes($xml->RECORD[$i]->PAY_PARAGR) ;
					$CODE_REGION=addslashes($xml->RECORD[$i]->PAY_REGION) ;
					$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->PAY_SPARAG) ;
					$NUMRO_ORDONNANCE=addslashes($xml->RECORD[$i]->PAY_NUMORD) ;
					$NUMERO_DU_MARCHE=addslashes($xml->RECORD[$i]->PAY_NUMMAR) ;
					$PAY_CODBNQ=addslashes($xml->RECORD[$i]->PAY_CODBNQ) ;
					$PAY_CPTBEN=addslashes($xml->RECORD[$i]->PAY_CPTBEN) ;
					$NOM_BENEFICIAIRE=trim(addslashes($xml->RECORD[$i]->PAY_NOMBEN)) ;
					$ADRESSE_BENEFICIAIRE=trim(addslashes($xml->RECORD[$i]->PAY_ADRBEN)) ;
					$OBJET_DE_LA_DEPENSE=trim(addslashes($xml->RECORD[$i]->PAY_OBJETS)) ;
					$PAY_CODRET=addslashes($xml->RECORD[$i]->PAY_CODRET) ;
					$PAY_CEDRET=addslashes($xml->RECORD[$i]->PAY_CEDRET) ;
					$MONTANT_PAIEMENT=addslashes($xml->RECORD[$i]->PAY_MTBRUT) ;
					$DATE_EMISSION_DU_PAIEMENT=Utils::toDate(addslashes($xml->RECORD[$i]->PAY_DATEMI)) ;
					$NUMERO_DU_VISA=addslashes($xml->RECORD[$i]->PAY_NOVISA) ;
					$PAY_TYPTIP=addslashes($xml->RECORD[$i]->PAY_TYPTIP) ;
					$NUMERO_TITRE_DE_PAIEMENT=addslashes($xml->RECORD[$i]->PAY_NUMTIP) ;
					$NUMERO_BORDEREAU=addslashes($xml->RECORD[$i]->PAY_NUMBRD) ;
					$TYPE_FOURNISSEUR=addslashes($xml->RECORD[$i]->PAY_TYPFRS) ;
					$CODE_FOURNISSEUR=addslashes($xml->RECORD[$i]->PAY_NUMFRS) ;
					$DATE_ORDONNATEUR__ORDONNANCE=Utils::toDate(addslashes($xml->RECORD[$i]->ORD_DATEOR)) ;	  

					$sql1="INSERT INTO min_paiement VALUES ('$CENTRE_COMPTABLE','$GESTION_EMISSION',
					'$GESTION_ORIGINE','$TITRE','$CHAP_OFFICIEL__LOI_DE_FINANCES','$CODE_DEPARTEMENT','$CODE_DELEGATION','$PARTIE','$NUMERO_DU_FONDS',
					'$ARTICLE','$PARAGRAPHE','$CODE_REGION','$SOUS_PARAGRAPHE','$NUMRO_ORDONNANCE','$NUMERO_DU_MARCHE','$PAY_CODBNQ','$PAY_CPTBEN','$NOM_BENEFICIAIRE','$ADRESSE_BENEFICIAIRE','$OBJET_DE_LA_DEPENSE','$PAY_CODRET','$PAY_CEDRET','$MONTANT_PAIEMENT','$DATE_EMISSION_DU_PAIEMENT','$NUMERO_DU_VISA','$PAY_TYPTIP','$NUMERO_TITRE_DE_PAIEMENT','$NUMERO_BORDEREAU','$TYPE_FOURNISSEUR','$CODE_FOURNISSEUR','$DATE_ORDONNATEUR__ORDONNANCE')" ; 
					$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
										$sth=$query1->execute() ;
					if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
					}
			}
			$total=AdminModel::get_total('min_paiement') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br> ";  
			die ;
	}
	public function min_avenant($ges,$filename) 
	{
		$path="../data-insert/data/central/avenant/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$DEP_CHAPIT=addslashes($xml->RECORD[$i]->DEP_CHAPIT) ;
				$DEL_DELEGA=addslashes($xml->RECORD[$i]->DEL_DELEGA) ;
				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$AVE_NUMERO=addslashes($xml->RECORD[$i]->AVE_NUMERO) ;
				$BNQ_BANQUE=addslashes($xml->RECORD[$i]->BNQ_BANQUE) ;
				$BNQ_AGENCE=addslashes($xml->RECORD[$i]->BNQ_AGENCE) ;
				$TCO_TYPCOM=addslashes($xml->RECORD[$i]->TCO_TYPCOM);
				$TMA_TYPMAR=addslashes($xml->RECORD[$i]->TMA_TYPMAR) ;
				$MDP_MODPAS=addslashes($xml->RECORD[$i]->MDP_MODPAS);
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS);
				$AVE_OBJETS=addslashes($xml->RECORD[$i]->AVE_OBJETS) ;
				$AVE_OBJMAR=addslashes($xml->RECORD[$i]->AVE_OBJMAR) ;
				$AVE_DATORD=Utils::toDate(addslashes($xml->RECORD[$i]->AVE_DATORD)) ;
				$AVE_DATECD=Utils::toDate(addslashes($xml->RECORD[$i]->AVE_DATECD)) ;
				$AVE_NUMPVCM=addslashes($xml->RECORD[$i]->AVE_NUMPVCM) ;
				$AVE_NANTIS=addslashes($xml->RECORD[$i]->AVE_NANTIS) ;
				$AVE_TOLERE=addslashes($xml->RECORD[$i]->AVE_TOLERE) ;
				$MAR_ANNPER=addslashes($xml->RECORD[$i]->MAR_ANNPER) ;
				$MAR_NUMPER=addslashes($xml->RECORD[$i]->MAR_NUMPER) ;
				$AVE_DUREES=addslashes($xml->RECORD[$i]->AVE_DUREES) ;
				$USER_NOM=addslashes($xml->RECORD[$i]->USER_NOM) ;
				$USER_DATE=Utils::toDate(addslashes($xml->RECORD[$i]->USER_DATE)) ;
				
			   $sql1="INSERT INTO min_avenant VALUES(
			   '$MAR_ANNMAR', '$MAR_NUMERO','$AVE_NUMERO', '$BNQ_BANQUE','$BNQ_AGENCE', '$TCO_TYPCOM','$TMA_TYPMAR', '$MDP_MODPAS','$FRS_TYPFRS', '$FRS_NUMFRS','$DEP_CHAPIT', '$DEL_DELEGA','$AVE_OBJETS', '$AVE_OBJMAR','$AVE_DATORD', '$AVE_DATECD','$AVE_NUMPVCM', '$AVE_NANTIS','$AVE_TOLERE', '$MAR_ANNPER','$MAR_NUMPER', '$AVE_DUREES','$USER_NOM','$USER_DATE')" ; 
			   $query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
				}	
			}
		
		$total=AdminModel::get_total('min_avenant') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;

    

		}
	public function min_ligne_avenant($ges,$filename) 
	{
		$path="../data-insert/data/central/ligne_avenant/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ;// var_dump($xml->RECORD[0]->MUN_MUNICI) ;die;
		for($i=0;$i<$nbr;$i++)
			{
				
				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$AVE_NUMERO=addslashes($xml->RECORD[$i]->AVE_NUMERO) ;
				$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
				$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
				$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
				$LAV_MNTAVE=addslashes($xml->RECORD[$i]->LAV_MNTAVE) ;
			   $sql1="INSERT INTO `min_ligne_avenant` VALUES ('$MAR_ANNMAR', '$MAR_NUMERO', '$AVE_NUMERO', '$RBM_RUBMAR', '$PRE_ANNPRE', '$PRE_NUMPRE', '$LAV_MNTAVE')" ; 
				   $query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
				}	
			}
		
		$total=AdminModel::get_total('min_ligne_avenant') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;


	}

		public function min_dep_nomenclature ($ges,$filename)
{
	$path="../data-insert/data/central/dep_nomenclature/".$ges;
	$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
	$nbr=count($xml->RECORD) ; 
	for($i=0;$i<$nbr;$i++)
		{		
				$GESTION=addslashes($xml->RECORD[$i]->GESTION);
				$DEPARTEMENT=addslashes($xml->RECORD[$i]->DEPARTEMENT);
				$DELEGATION=addslashes($xml->RECORD[$i]->DELEGATION);
				$TITRE=addslashes($xml->RECORD[$i]->TITRE);
				$FONDS=addslashes($xml->RECORD[$i]->FONDS);
				$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
				$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
				$REGION=addslashes($xml->RECORD[$i]->REGION);
				$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
				$LIBELLE=trim(addslashes($xml->RECORD[$i]->LIBELLE));
				$id="$GESTION"."$DEPARTEMENT"."$DELEGATION"."$TITRE"."$FONDS"."$ARTICLE"."$PARAGRAPHE"."$REGION"."$SOUS_PARAGRAPHE" ; 
			//var_dump(intval($CREDITS_PAYEMENT)); die ;
			//$req="UPDATE `com_dep_credit` SET `CREDITS_PAYEMENT`='$CREDITS_PAYEMENT' WHERE id='$id' ";
				$sql1="INSERT INTO min_dep_nomenclature VALUES 
			('$id','$GESTION','$DEPARTEMENT','$DELEGATION','$TITRE','$FONDS','$ARTICLE','$PARAGRAPHE','$REGION','$SOUS_PARAGRAPHE','$LIBELLE')" ; $query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
					$sth=$query1->execute() ;
					if ($sth == false) {
						print_r($query1->errorInfo());
				echo "erreur excute <br>";;
						}
		}
		$total=AdminModel::get_total('min_dep_nomenclature') ;
	echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
	die ;
}

	public function min_marche ($ges,$filename)
	{
		$path="../data-insert/data/central/marche/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$MAR_OBJETS=addslashes($xml->RECORD[$i]->MAR_OBJETS) ;
				$MAR_CHAPIT=addslashes($xml->RECORD[$i]->MAR_CHAPIT) ;
				$MAR_DELEGA=addslashes($xml->RECORD[$i]->MAR_DELEGA) ;
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_CODFRS=addslashes($xml->RECORD[$i]->FRS_CODFRS) ;
				$FRS_RAISON=addslashes($xml->RECORD[$i]->FRS_TRAISON) ;
				$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
				$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
				$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
				$LMA_MNTSIG=intval($xml->RECORD[$i]->LMA_MNTSIG) ;
				$LMA_MNTENG=intval($xml->RECORD[$i]->LMA_MNTENG) ;
				$LMA_MNTORD=intval($xml->RECORD[$i]->LMA_MNTORD) ;
				$LMA_MNTPAY=intval($xml->RECORD[$i]->LMA_MNTPAY) ;
				$sql1="INSERT INTO min_marche VALUES ('$MAR_ANNMAR','$MAR_NUMERO','$MAR_OBJETS','$MAR_CHAPIT','$MAR_DELEGA','$FRS_TYPFRS','$FRS_CODFRS','$FRS_RAISON','$RBM_RUBMAR','$PRE_ANNPRE','$PRE_NUMPRE','$LMA_MNTSIG','$LMA_MNTENG','$LMA_MNTORD','$LMA_MNTPAY')" ; $query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
							echo $sql1 ; 
							}	
					
			}
			$total=AdminModel::get_total('min_marche') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;	
	}


public function min_arrets ($ges,$filename)
	{
		$path="../data-insert/data/central/arrets/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
                $TAR_TPARR=addslashes($xml->RECORD[$i]->TAR_TPARR) ;
				$ARR_NUMERO=addslashes($xml->RECORD[$i]->ARR_NUMERO) ;
                $ARR_NUMMOD=addslashes($xml->RECORD[$i]->ARR_NUMMOD) ;
                $ARR_NUMCOM=addslashes($xml->RECORD[$i]->ARR_NUMCOM) ;
                $ARR_DATDGB=Utils::toDate(addslashes($xml->RECORD[$i]->ARR_DATDGB)) ;
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$DEP_CHAPIT=addslashes($xml->RECORD[$i]->DEP_CHAPIT) ;
				$TIT_TITRES=addslashes($xml->RECORD[$i]->TIT_TITRES) ;
				$PRT_PARTIE=addslashes($xml->RECORD[$i]->PRT_PARTIE) ;
				$FDO_FNDOFF=addslashes($xml->RECORD[$i]->FDO_FNDOFF) ;
				$ART_ARTICL=addslashes($xml->RECORD[$i]->ART_ARTICL) ;
				$PAR_PARAGR=addslashes($xml->RECORD[$i]->PAR_PARAGR) ;
				$RGN_REGION=addslashes($xml->RECORD[$i]->RGN_REGION) ;
				$SPA_SPARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG) ;
				$MNTENG=intval($xml->RECORD[$i]->MNTENG) ;
				$MNTPMT=intval($xml->RECORD[$i]->MNTPMT) ;
				$LAR_MNTSIG=addslashes($xml->RECORD[$i]->LAR_MNTSIG) ;
				$sql1="INSERT INTO min_arrets VALUES ('$TAR_TPARR', '$ARR_NUMERO', '$ARR_NUMMOD', '$ARR_NUMCOM', '$ARR_DATDGB', '$GES_GESTIO', '$DEP_CHAPIT', '$TIT_TITRES', '$PRT_PARTIE', '$FDO_FNDOFF', '$ART_ARTICL', '$PAR_PARAGR', '$RGN_REGION', '$SPA_SPARAG', '$MNTENG', '$MNTPMT', '$LAR_MNTSIG')" ; $query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
							echo $sql1 ; 
							}	
					
			}
			$total=AdminModel::get_total('min_arrets') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;	
	}



	//EPA EPA EPA EPA EPA EPA EPA EPA EPA EPA EPA EPA EPA


	public function epa_dep_credit ($ges,$filename)
	{
		$path="../data-insert/data/epa/dep_credit/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{		
				$GESTION=addslashes($xml->RECORD[$i]->GESTION);
				$CODE_EPA=addslashes($xml->RECORD[$i]->CODE_EPA);
				$TITRE=addslashes($xml->RECORD[$i]->TITRE);
				$SECTION=addslashes($xml->RECORD[$i]->SECTION);
				$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
				$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
				$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
				$RELIQUAT_CREDITS_PAYEMENT=addslashes($xml->RECORD[$i]->RELIQUAT_CREDITS_PAYEMENT);
				$CREDITS_ANNEE_PAYEMENT=addslashes($xml->RECORD[$i]->CREDITS_ANNEE_PAYEMENT);
				$CREDITS_PAYEMENT=addslashes($xml->RECORD[$i]->CREDITS_PAYEMENT);
				$id="$GESTION"."$CODE_EPA"."$TITRE"."$SECTION"."$ARTICLE"."$PARAGRAPHE"."$SOUS_PARAGRAPHE" ; 
				$sql1="INSERT INTO epa_dep_credit VALUES 
				('$id','$GESTION','$CODE_EPA','$TITRE','$SECTION','$ARTICLE','$PARAGRAPHE','$SOUS_PARAGRAPHE','$RELIQUAT_CREDITS_PAYEMENT','$CREDITS_ANNEE_PAYEMENT','$CREDITS_PAYEMENT')" ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
					$sth=$query1->execute() ;
					if ($sth == false) {
						print_r($query1->errorInfo());
					echo "erreur excute <br>";
					}
			}
			$total=AdminModel::get_total('epa_dep_credit') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;
	}
	public function epa_engagement ($ges,$filename)
	{
		$path="../data-insert/data/epa/engagement/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 	
		for($i=0;$i<$nbr;$i++)
					{
						$ENG_NUMERO=addslashes($xml->RECORD[$i]->ENG_NUMERO) ;
						$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
						$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;
						$ENG_BENEFI=addslashes($xml->RECORD[$i]->ENG_BENEFI) ;
						$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
						$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
						$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
						$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
						$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
						$RGI_NUMREG=addslashes($xml->RECORD[$i]->RGI_NUMREG) ;
						$ENG_OBJDEP=addslashes($xml->RECORD[$i]->ENG_OBJDEP) ;
						$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
						$EPA_CODEPA=addslashes($xml->RECORD[$i]->EPA_CODEPA) ;
						$TIT_TITRES=addslashes($xml->RECORD[$i]->TIT_TITRES) ;
						$SEC_SECTIO=addslashes($xml->RECORD[$i]->SEC_SECTIO) ;
						$ART_ARTICL=addslashes($xml->RECORD[$i]->ART_ARTICL) ;
						$PAR_PARAGR=addslashes($xml->RECORD[$i]->PAR_PARAGR) ;
						$SPA_SPARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG) ;
						$LEN_MNTACD=addslashes($xml->RECORD[$i]->LEN_MNTACD) ;
						$LEN_MNTDEG=addslashes($xml->RECORD[$i]->LEN_MNTDEG) ;
						$LEN_MNTORD=addslashes($xml->RECORD[$i]->LEN_MNTORD) ;
						$LEN_NOVISA=addslashes($xml->RECORD[$i]->LEN_NOVISA) ;
						$LEN_DATVIS=Utils::toDate(addslashes($xml->RECORD[$i]->LEN_DATVIS)) ;
						$LEN_NATDEP=addslashes($xml->RECORD[$i]->LEN_NATDEP) ;
						$USR_CODGES=addslashes($xml->RECORD[$i]->USR_CODGES) ;
						$USR_NOMGES =addslashes($xml->RECORD[$i]->USR_NOMGES) ;
						$USR_DATGES=Utils::toDate(addslashes($xml->RECORD[$i]->USR_DATGES)) ;

						if(strlen(trim($EPA_CODEPA))==0)
						{$EPA_CODEPA=0;}
						$sql1="INSERT INTO epa_engagement VALUES (
						'$ENG_NUMERO', '$FRS_TYPFRS',
						'$FRS_NUMFRS', '$ENG_BENEFI', 
						'$MAR_ANNMAR', '$MAR_NUMERO', 
						'$RBM_RUBMAR', '$PRE_ANNPRE', 
						'$PRE_NUMPRE', '$RGI_NUMREG', 
						'$ENG_OBJDEP', '$GES_GESTIO', 
						'$EPA_CODEPA', '$TIT_TITRES', 
						'$SEC_SECTIO', '$ART_ARTICL', 
						'$PAR_PARAGR', '$SPA_SPARAG', 
						'$LEN_MNTACD', '$LEN_MNTDEG', 
						'$LEN_MNTORD', '$LEN_NOVISA', 
						'$LEN_DATVIS', '$LEN_NATDEP', 
						'$USR_CODGES', '$USR_NOMGES', '$USR_DATGES')" ; 
							$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
						print_r($query1->errorInfo());
						echo $sql1 ; 
						}
					}
					$total=AdminModel::get_total('epa_engagement') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function epa_facture   ($ges,$filename)
	{
		$path="../data-insert/data/epa/facture/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$EPA_CODEPA=addslashes($xml->RECORD[$i]->EPA_CODEPA) ;
				$FAC_NUMERO=addslashes($xml->RECORD[$i]->FAC_NUMERO) ; 
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;
				$FRS_NOMFRS=trim(addslashes($xml->RECORD[$i]->FRS_NOMFRS)) ;
				$FAC_DATREF=Utils::toDate(addslashes($xml->RECORD[$i]->FAC_DATREF));
				$FAC_REFFAC=addslashes($xml->RECORD[$i]->FAC_REFFAC) ;
				$FAC_NATFAC=addslashes($xml->RECORD[$i]->FAC_NATFAC);
				$BCD_NUMERO=addslashes($xml->RECORD[$i]->BCD_NUMERO) ;
				$FAC_DATORD=Utils::toDate(addslashes($xml->RECORD[$i]->FAC_DATORD));
				$FAC_MNTFAC=addslashes($xml->RECORD[$i]->FAC_MNTFAC) ;
				$FAC_MNTORD=addslashes($xml->RECORD[$i]->FAC_MNTORD) ;
				$FAC_MNTPAY=addslashes($xml->RECORD[$i]->FAC_MNTPAY) ;
				$USR_CODGES=addslashes($xml->RECORD[$i]->USR_CODGES) ;
				$USR_DATGES=Utils::toDate(addslashes($xml->RECORD[$i]->USR_DATGES)) ;
				$USR_NOMGES=addslashes($xml->RECORD[$i]->USR_NOMGES) ;
				if(strlen(trim($GES_GESTIO))==0)
						$GES_GESTIO=0;
				if(strlen(trim($EPA_CODEPA))==0)
				$EPA_CODEPA=0 ;
				$sql1="INSERT INTO `epa_facture`  VALUES
				 ('$GES_GESTIO','$EPA_CODEPA','$FAC_NUMERO', '$FRS_TYPFRS','$FRS_NUMFRS','$FRS_NOMFRS','$FAC_DATREF','$FAC_REFFAC','$FAC_NATFAC','$BCD_NUMERO','$FAC_DATORD','$FAC_MNTFAC','$FAC_MNTORD','$FAC_MNTPAY','$USR_CODGES','$USR_NOMGES','$USR_DATGES')" ;
 				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
						if ($sth == false) {
						print_r($query1->errorInfo());
						echo $sql1 ; 
						}
			}		
			$total=AdminModel::get_total('epa_facture') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function epa_facture_ordonnance ($ges,$filename)
	{
		$path="../data-insert/data/epa/facture_ordonnance/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
 				$EPA_CODEPA=addslashes($xml->RECORD[$i]->EPA_CODEPA) ;
				$FAC_NUMERO=addslashes($xml->RECORD[$i]->FAC_NUMERO) ;
				$ORD_NUMERO=addslashes($xml->RECORD[$i]->ORD_NUMERO) ;
				$OFA_MNTORD=addslashes($xml->RECORD[$i]->OFA_MNTORD) ;
				$OFA_MNTPAY=addslashes($xml->RECORD[$i]->OFA_MNTPAY) ;
				if(strlen(trim($EPA_CODEPA))==0)
					$EPA_CODEPA=0 ;
				$sql1="INSERT INTO `epa_facture_ordonnance` VALUES(
				'$GES_GESTIO',
				'$EPA_CODEPA',
				'$FAC_NUMERO',
				'$ORD_NUMERO',
				'$OFA_MNTORD',
				'$OFA_MNTPAY') " ;
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
									$sth=$query1->execute() ;
									if ($sth == false) {
									print_r($query1->errorInfo());
									echo $sql1 ; 
									}
			}
			$total=AdminModel::get_total('epa_facture_ordonnance') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	} 
	public function epa_commande ($ges,$filename)
	 {
		$path="../data-insert/data/epa/commande/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$EPA_CODEPA=addslashes($xml->RECORD[$i]->EPA_CODEPA) ;
				$BCD_NUMERO=addslashes($xml->RECORD[$i]->BCD_NUMERO) ;
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS) ;
				$BCD_OBJETS=addslashes($xml->RECORD[$i]->BCD_OBJETS) ;
				$BCD_DATEBC =Utils::toDate(addslashes($xml->RECORD[$i]->BCD_DATEBC)) ;
				$BCD_ENGNUM=addslashes($xml->RECORD[$i]->BCD_ENGNUM) ;
				$GES_GESTIO=addslashes($xml->RECORD[$i]->GES_GESTIO) ;
				$TIT_TITRES=addslashes($xml->RECORD[$i]->TIT_TITRES) ;
				$SEC_SECTIO=addslashes($xml->RECORD[$i]->SEC_SECTIO) ;
				$ART_ARTICL=addslashes($xml->RECORD[$i]->ART_ARTICL) ;
				$PAR_PARAGR=addslashes($xml->RECORD[$i]->PAR_PARAGR) ;
				$SPA_SPARAG=addslashes($xml->RECORD[$i]->SPA_SPARAG) ;
				$BCD_MNTFAC=addslashes($xml->RECORD[$i]->BCD_MNTFAC) ;
				$LCM_MNTCOM=addslashes($xml->RECORD[$i]->LCM_MNTCOM) ;
				$LCM_MNTORD=addslashes($xml->RECORD[$i]->LCM_MNTORD) ;
				$LCM_MNTPAY=addslashes($xml->RECORD[$i]->LCM_MNTPAY) ;
				$USR_CODGES=addslashes($xml->RECORD[$i]->USR_CODGES) ;
				$USR_NOMGES=addslashes($xml->RECORD[$i]->USR_NOMGES) ;
				$USR_DATGES=Utils::toDate(addslashes($xml->RECORD[$i]->USR_DATGES)) ;
				$sql1="INSERT INTO epa_commande VALUES (
					'$EPA_CODEPA', '$BCD_NUMERO', '$FRS_TYPFRS', '$FRS_NUMFRS', '$BCD_OBJETS',
					 '$BCD_DATEBC', '$BCD_ENGNUM', '$GES_GESTIO', '$TIT_TITRES', '$SEC_SECTIO',
					  '$ART_ARTICL', '$PAR_PARAGR', '$SPA_SPARAG', '$BCD_MNTFAC', '$LCM_MNTCOM',
					   '$LCM_MNTORD', '$LCM_MNTPAY', '$USR_CODGES', '$USR_NOMGES', '$USR_DATGES')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
									$sth=$query1->execute() ;
									if ($sth == false) {
									print_r($query1->errorInfo());
									echo $sql1."<br>" ; 
									}
			}
			$total=AdminModel::get_total('epa_commande') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	 }
	 public function epa_paiement ($ges,$filename)
	{
		$path="../data-insert/data/epa/paiement/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$PAY_CENEDI=addslashes($xml->RECORD[$i]->PAY_CENEDI) ;
				$PAY_GESEMI=addslashes($xml->RECORD[$i]->PAY_GESEMI) ;
				$PAY_GESORI=addslashes($xml->RECORD[$i]->PAY_GESORI) ;
				$PAY_TITRES=addslashes($xml->RECORD[$i]->PAY_TITRES) ;
				$PAY_CODEPA=addslashes($xml->RECORD[$i]->PAY_CODEPA) ;
				$PAY_ARTICL=addslashes($xml->RECORD[$i]->PAY_ARTICL) ;
				$PAY_PARAGR=addslashes($xml->RECORD[$i]->PAY_PARAGR) ;
				$PAY_SPARAG=addslashes($xml->RECORD[$i]->PAY_SPARAG) ;
				$PAY_NUMORD=addslashes($xml->RECORD[$i]->PAY_NUMORD) ;
				$PAY_NUMMAR=trim(addslashes($xml->RECORD[$i]->PAY_NUMMAR)) ;
				$PAY_CODBNQ=addslashes($xml->RECORD[$i]->PAY_CODBNQ) ;
				$PAY_CPTBEN=addslashes($xml->RECORD[$i]->PAY_CPTBEN) ;
				$PAY_NOMBEN=addslashes($xml->RECORD[$i]->PAY_NOMBEN) ;
				$PAY_ADRBEN=addslashes($xml->RECORD[$i]->PAY_ADRBEN) ;
				$PAY_OBJETS=addslashes($xml->RECORD[$i]->PAY_OBJETS) ;
				$PAY_CODRET=addslashes($xml->RECORD[$i]->PAY_CODRET) ;
				$PAY_CEDRET=addslashes($xml->RECORD[$i]->PAY_CEDRET) ;
				$PAY_MTBRUT=addslashes($xml->RECORD[$i]->PAY_MTBRUT) ;
				$PAY_DATEMI=Utils::toDate(addslashes($xml->RECORD[$i]->PAY_DATEMI)) ;
				$PAY_NOVISA=addslashes($xml->RECORD[$i]->PAY_NOVISA) ;
				$PAY_TYPTIP=addslashes($xml->RECORD[$i]->PAY_TYPTIP) ;
				$PAY_NUMTIP=addslashes($xml->RECORD[$i]->PAY_NUMTIP) ;
				$PAY_NUMBRD=addslashes($xml->RECORD[$i]->PAY_NUMBRD) ;
				$PAY_TYPFRS=addslashes($xml->RECORD[$i]->PAY_TYPFRS) ;
				$PAY_NUMFRS=addslashes($xml->RECORD[$i]->PAY_NUMFRS) ;
				$ORD_DATEOR=Utils::toDate(addslashes($xml->RECORD[$i]->ORD_DATEOR)) ;
				$ORD_NOMUSR=addslashes($xml->RECORD[$i]->ORD_NOMUSR) ;
			  
			  if(strlen(trim($PAY_CODEPA))==0)
			   {$PAY_CODEPA=0;}
			   
			 
			  $sql1="INSERT INTO epa_paiement VALUES (
			  '$PAY_CENEDI','$PAY_GESEMI', '$PAY_GESORI', '$PAY_TITRES', '$PAY_CODEPA',
			   '$PAY_ARTICL', '$PAY_PARAGR', '$PAY_SPARAG', '$PAY_NUMORD', '$PAY_NUMMAR', '$PAY_CODBNQ',
			   '$PAY_CPTBEN', '$PAY_NOMBEN', '$PAY_ADRBEN', '$PAY_OBJETS', '$PAY_CODRET', '$PAY_CEDRET', '$PAY_MTBRUT', '$PAY_DATEMI',
			   '$PAY_NOVISA', '$PAY_TYPTIP','$PAY_NUMTIP', '$PAY_NUMBRD', '$PAY_TYPFRS', '$PAY_NUMFRS', '$ORD_DATEOR', '$ORD_NOMUSR')"; 	$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
					$sth=$query1->execute() ;
					if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
					}
			}
			$total=AdminModel::get_total('epa_paiement') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br> ";  
			die ;
	}
	public function epa_avenant($ges,$filename) 
	{
		$path="../data-insert/data/epa/avenant/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$EPA_CODEPA=addslashes($xml->RECORD[$i]->EPA_CODEPA) ;
				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$AVE_NUMERO=addslashes($xml->RECORD[$i]->AVE_NUMERO) ;
				$BNQ_BANQUE=addslashes($xml->RECORD[$i]->BNQ_BANQUE) ;
				$BNQ_AGENCE=addslashes($xml->RECORD[$i]->BNQ_AGENCE) ;
				$TCO_TYPCOM=addslashes($xml->RECORD[$i]->TCO_TYPCOM);
				$TMA_TYPMAR=addslashes($xml->RECORD[$i]->TMA_TYPMAR) ;
				$MDP_MODPAS=addslashes($xml->RECORD[$i]->MDP_MODPAS);
				$FRS_TYPFRS=addslashes($xml->RECORD[$i]->FRS_TYPFRS) ;
				$FRS_NUMFRS=addslashes($xml->RECORD[$i]->FRS_NUMFRS);
				$AVE_OBJETS=addslashes($xml->RECORD[$i]->AVE_OBJETS) ;
				$AVE_OBJMAR=addslashes($xml->RECORD[$i]->AVE_OBJMAR) ;
				$AVE_DATORD=Utils::toDate(addslashes($xml->RECORD[$i]->AVE_DATORD)) ;
				$AVE_DATECD=Utils::toDate(addslashes($xml->RECORD[$i]->AVE_DATECD)) ;
				$AVE_NUMPVCM=addslashes($xml->RECORD[$i]->AVE_NUPVCM) ;
				$AVE_NANTIS=addslashes($xml->RECORD[$i]->AVE_NANTIS) ;
				$AVE_TOLERE=addslashes($xml->RECORD[$i]->AVE_TOLERE) ;
				$MAR_ANNPER=addslashes($xml->RECORD[$i]->MAR_ANNPER) ;
				$MAR_NUMPER=addslashes($xml->RECORD[$i]->MAR_NUMPER) ;
				$AVE_DUREES=addslashes($xml->RECORD[$i]->AVE_DUREES) ;
				$USR_CODGES=addslashes($xml->RECORD[$i]->USR_CODGES) ;
				$USR_NOMGES=addslashes($xml->RECORD[$i]->USR_NOMGES) ;
				$USR_DATGES=Utils::toDate(addslashes($xml->RECORD[$i]->USR_NOMGES)) ;
				$sql1="INSERT INTO epa_avenant VALUES('$EPA_CODEPA', '$MAR_ANNMAR','$MAR_NUMERO', '$AVE_NUMERO','$BNQ_BANQUE', '$BNQ_AGENCE','$TCO_TYPCOM', '$TMA_TYPMAR','$MDP_MODPAS', '$FRS_TYPFRS','$FRS_NUMFRS', '$AVE_OBJETS','$AVE_OBJMAR', '$AVE_DATORD','$AVE_DATECD', '$AVE_NUMPVCM','$AVE_NANTIS', '$AVE_TOLERE','$MAR_ANNPER', '$MAR_NUMPER','$AVE_DUREES', '$USR_CODGES','$USR_NOMGES', '$USR_DATGES')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
				}	
			
		}
		$total=AdminModel::get_total("epa_avenant");
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;


    

		}
	public function epa_ligne_avenant($ges,$filename) 
	{
		$path="../data-insert/data/epa/ligne_avenant/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ;// var_dump($xml->RECORD[0]->MUN_MUNICI) ;die;
		for($i=0;$i<$nbr;$i++)
			{
				$EPA_CODEPA=addslashes($xml->RECORD[$i]->EPA_CODEPA) ;
				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$AVE_NUMERO=addslashes($xml->RECORD[$i]->AVE_NUMERO) ;
				$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
				$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
				$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
				$LAV_MNTAVE=addslashes($xml->RECORD[$i]->LAV_MNTAVE) ;
				if(strlen(trim($EPA_CODEPA))==0)
					$EPA_CODEPA=0 ;
				if(strlen(trim($MAR_NUMERO))==0)
					$MAR_NUMERO=0 ;
				$sql1="INSERT INTO `epa_ligne_avenant` VALUES ('$EPA_CODEPA','$MAR_ANNMAR', '$MAR_NUMERO', '$AVE_NUMERO', '$RBM_RUBMAR', '$PRE_ANNPRE', '$PRE_NUMPRE', '$LAV_MNTAVE')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
				}	
			
		}
		$total=AdminModel::get_total('epa_ligne_avenant') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;

	}
	public function epa_rec_nomenclature($ges,$filename)
	{
		$path="../data-insert/data/epa/rec_nomenclature/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
				{	
					$GESTION=addslashes($xml->RECORD[$i]->GESTION);
					$CODE_EPA=addslashes($xml->RECORD[$i]->CODE_EPA);
					$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
					$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
					$LIBELLE=trim(addslashes($xml->RECORD[$i]->LIBELLE));
					$id="$GESTION"."$CODE_EPA"."$ARTICLE"."$PARAGRAPHE" ; 
					if(strlen(trim($CODE_EPA))==0)
					{$CODE_EPA=0;}
					$sql1="INSERT INTO epa_rec_nomenclature VALUES 
					('$id','$GESTION','$CODE_EPA','$ARTICLE','$PARAGRAPHE','$LIBELLE')" ; 

					$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
							echo $sql1 ; 
						}	
				}
				$total=AdminModel::get_total('epa_rec_nomenclature') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
	public function epa_rec_credit ($ges,$filename)
	{
		$path="../data-insert/data/epa/rec_credit/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
		{	
			$GESTION=addslashes($xml->RECORD[$i]->GESTION);
			$CODE_EPA=addslashes($xml->RECORD[$i]->CODE_EPA);
			$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
			$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
			$CREDITS_PREVUS=addslashes($xml->RECORD[$i]->CREDITS_PREVUS);
			$CREDITS_REALISEES=addslashes($xml->RECORD[$i]->CREDITS_REALISEES);
			$id="$GESTION"."$CODE_EPA"."$ARTICLE"."$PARAGRAPHE"; 
			$sql1="INSERT INTO epa_rec_credit VALUES 
			('$id','$GESTION','$CODE_EPA','$ARTICLE','$PARAGRAPHE','$CREDITS_PREVUS','$CREDITS_REALISEES')" ; 
			$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					echo $sql1 ; 
					}	
		}
		$total=AdminModel::get_total('epa_rec_credit') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
	}
		public function epa_dep_nomenclature ($ges,$filename)
{
		$path="../data-insert/data/epa/dep_nomenclature/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{		
					$GESTION=addslashes($xml->RECORD[$i]->GESTION);
					$CODE_EPA=addslashes($xml->RECORD[$i]->CODE_EPA);
					$TITRE=addslashes($xml->RECORD[$i]->TITRE);
					$SECTION=addslashes($xml->RECORD[$i]->SECTION);
					$ARTICLE=addslashes($xml->RECORD[$i]->ARTICLE);
					$PARAGRAPHE=addslashes($xml->RECORD[$i]->PARAGRAPHE);
					$SOUS_PARAGRAPHE=addslashes($xml->RECORD[$i]->SOUS_PARAGRAPHE);
					$LIBELLE=trim(addslashes($xml->RECORD[$i]->LIBELLE));
					$id="$GESTION"."$CODE_EPA"."$TITRE"."$SECTION"."$ARTICLE"."$PARAGRAPHE"."$SOUS_PARAGRAPHE" ; 
					$sql1="INSERT INTO epa_dep_nomenclature VALUES 
					('$id','$GESTION','$CODE_EPA','$TITRE','$SECTION','$ARTICLE','$PARAGRAPHE','$SOUS_PARAGRAPHE','$LIBELLE')" ;$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
					echo "erreur excute <br>";;
							}
			}
			$total=AdminModel::get_total('epa_dep_nomenclature') ;
		echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
		die ;
}

	public function epa_marche ($ges,$filename)
	{
		$path="../data-insert/data/epa/marche/".$ges;
		$xml=simplexml_load_file($path."/".$filename) or die ("chemin invalide: ".$path."/".$filename) ; 
		$nbr=count($xml->RECORD) ; 
		for($i=0;$i<$nbr;$i++)
			{
				$MAR_ANNMAR=addslashes($xml->RECORD[$i]->MAR_ANNMAR) ;
				$MAR_NUMERO=addslashes($xml->RECORD[$i]->MAR_NUMERO) ;
				$MAR_OBJETS=addslashes($xml->RECORD[$i]->MAR_OBJETS) ;
				$MAR_CODEPA=addslashes($xml->RECORD[$i]->MAR_CODEPA) ;
				$MAR_TYPFOU=addslashes($xml->RECORD[$i]->MAR_TYPFOU) ;
				$MAR_CODFOU=addslashes($xml->RECORD[$i]->MAR_CODFOU) ;
				$FRS_RAISON=addslashes($xml->RECORD[$i]->FRS_RAISON) ;
				$RBM_RUBMAR=addslashes($xml->RECORD[$i]->RBM_RUBMAR) ;
				$PRE_ANNPRE=addslashes($xml->RECORD[$i]->PRE_ANNPRE) ;
				$PRE_NUMPRE=addslashes($xml->RECORD[$i]->PRE_NUMPRE) ;
				$LMA_MNTSIG=intval($xml->RECORD[$i]->LMA_MNTSIG) ;
				$LMA_MNTENG=intval($xml->RECORD[$i]->LMA_MNTENG) ;
				$LMA_MNTORD=intval($xml->RECORD[$i]->LMA_MNTORD) ;
				$LMA_MNTPAY=intval($xml->RECORD[$i]->LMA_MNTPAY) ;
				$sql1="INSERT INTO epa_marche VALUES (
				'$MAR_ANNMAR',
				'$MAR_NUMERO',
				'$MAR_OBJETS',
				'$MAR_CODEPA','$MAR_TYPFOU','$MAR_CODFOU','$FRS_RAISON','$RBM_RUBMAR','$PRE_ANNPRE','$PRE_NUMPRE','$LMA_MNTSIG','$LMA_MNTENG','$LMA_MNTORD','$LMA_MNTPAY')" ;
				 $query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
						$sth=$query1->execute() ;
						if ($sth == false) {
							print_r($query1->errorInfo());
							echo $sql1 ; 
							}	
					}
			
					$total=AdminModel::get_total('epa_marche') ;
			echo "le fichier : <b>".$filename. "</b> est ajouté avec succès ( <b>".$nbr."</b>  enregistrement ) le nombre d'enregistrements dans la table sera : <b>".$total."</b> <br>" ;  
			die ;	
	}
}
