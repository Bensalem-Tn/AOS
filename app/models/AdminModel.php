<?php
class AdminModel extends Model {
	protected static $tableName = '';
	


	public function oldpassword($id,$old_password) 
	{
		$old_password=Crypto::sha512($old_password, true);
		$sql1=" SELECT *  FROM users WHERE password='$old_password' AND id =$id" ; 
		//echo $sql1 ;
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		$table = $query1->fetchAll(PDO::FETCH_ASSOC);
		if($table==NULL)
		return FALSE ; 
		else 
		return TRUE ;
	}
	public function changepassword($id,$password) 
	{	$password=Crypto::sha512($password, true);
		$sql1="UPDATE  users SET password='$password' WHERE id =$id" ; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
			print_r($query1->errorInfo());
		echo "erreur excute <br>";;
		}	
		else {
			echo " لقد تم تغيير  كلمة المرور بنجاح" ;
		}
		
			
	}
	public function DeleteGestion($table,$gestion,$valeur)
	{
		$sql1="DELETE FROM $table WHERE $gestion = '$valeur'" ; 
		echo $sql1."<br>" ; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
			print_r($query1->errorInfo());
			
			echo "erreur d'éxcution <br>";
		}	
		else {
			echo "les de données de la table : ".$table." puor la gestion : ".$valeur." ont été supprimé avec succés <br>" ;
		}
		
	}
	public function activateGestion($gestion,$entite)
	{
		$sql1="INSERT INTO `gestion`( `GESTION`, `entite`) VALUES ('$gestion','$entite')" ; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
			print_r($query1->errorInfo());
			 echo $sql1 ;
			echo "erreur excute <br>";;
		}	
		
				echo DB::getInstance()->lastInsertId() ; 
	}
	public function deleteVoid($table,$colonne)
	 {

		
		$sql1="DELETE FROM  $table WHERE $colonne='' " ; 
		//echo $sql1." <br>" ; //die; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
			print_r($query1->errorInfo());
		echo "erreur excute <br>";;
		}	
		else {
			//echo $sql1." <br>" ;
		}
		
			echo "les lignes vides  de la table  : ".$table." ont été supprimé avec succés <br>" ; 

	 }
	public function resetDate($table,$colonne)
	 {

		
		$sql1="UPDATE  $table SET $colonne=NULL WHERE $colonne='1956-03-20' " ; 
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$sth=$query1->execute() ;
		if ($sth == false) {
			print_r($query1->errorInfo());
		echo "erreur excute <br>";;
		}	
		else {
			//echo $sql1." <br>" ;
		}
		
			echo "la colonne ".$colonne." de la table  : ".$table." est bien vérifier <br>" ; 

	 }
	public function tryToFind($table,$condtion)
	{
		$sql2="SELECT *  FROM $table WHERE $condtion " ; 
		//echo $sql2 ;
		$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
		$query2->execute() ;
		$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		if($table==NULL)
		return '0' ; 
		else 
		return '1' ; 	 
		
	}
	public static function existe($table_name,$param,$ch)
	{
		$sql2="SELECT *  FROM $table_name WHERE CONCAT($param)=$ch" ; 
		//return $sql2 ;
		$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
		$query2->execute() ;
		$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		if($table==NULL)
		return FALSE ; 
		else 
		return TRUE ; 	 
		}
	public static function get_total($table)
	{
		$sql2="SELECT COUNT(*)  FROM $table" ; 
		$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
		$query2->execute() ;
		$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total=$table[0]['COUNT(*)'] ;
		return $total ;
	}
	public static function get_total_by($table,$by)
	{
		$sql2="SELECT $by,COUNT(*)  FROM $table GROUP BY $by " ; 
		$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
		$query2->execute() ;
		$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		return var_dump($table) ;
	}

	public static function try($req)
	{
		
		$query2=DB::getInstance()->prepare($req) or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
		 if($query2->execute())  
			$table = $query2->fetchAll(PDO::FETCH_ASSOC);
	 	else 
		 $table="Erreur SQL !" ;
			return $table ;
	}
	public function getIds($entite,$gestion) 
	{
		switch ($entite) {
			case 1 : {
						$req="SELECT DEPARTEMENT  AS id FROM min_departement WHERE GESTION=$gestion" ;			
	 					$query2=DB::getInstance()->prepare($req) or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
	 					$query2->execute() or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
	 					$table = $query2->fetchAll();
						 $req1="SELECT DISTINCT ln AS id FROM min_departement WHERE GESTION=$gestion AND LENGTH(ln)>2" ;			
	 					$query1=DB::getInstance()->prepare($req1) or die('Erreur SQL !<br />'.$req1.'<br />'.DB::getInstance()->errorInfo());
	 					$query1->execute() or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
	 					$table1 = $query1->fetchAll();
	 					//var_dump($table) ; die ;
	 					return array_merge($table,$table1) ;
			
			}
			break ;
			case 2 : {
				$req="SELECT CODE_MUNICI  AS id FROM comune " ;			
				$query2=DB::getInstance()->prepare($req) or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
				$query2->execute() or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
				$table = $query2->fetchAll();
				return $table ;
			}
			break ;
			case 3 : {
				$req="SELECT CODE_GOUVER  AS id FROM gouvernerat " ;			
				$query2=DB::getInstance()->prepare($req) or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
				$query2->execute() or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
				$table = $query2->fetchAll();
				return $table ;
				

			}
			break ;
			case 4 : {
				$req="SELECT CODE_EPA  AS id FROM epa " ;			
				$query2=DB::getInstance()->prepare($req) or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
				$query2->execute() or die('Erreur SQL !<br />'.$req.'<br />'.DB::getInstance()->errorInfo());
				$table = $query2->fetchAll();
				return $table ;
			}
			break ;
			
		} 
	}
 public function get_chambres()
 	{
		$sql2="SELECT * FROM chambre"; 
	 	$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
	 	$query2->execute() ;
	 	$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		return $table ;
 	}
	 public function get_departement_by_pay($gestion)
 	{
		$sql2="SELECT PAY_CHAPIT,DEP_CHAPIT,PAY_TITRES FROM `min_paiement` WHERE PAY_GESEMI=$gestion GROUP BY PAY_CHAPIT,DEP_CHAPIT ORDER BY PAY_CHAPIT" ; 
	 	//echo $sql2; die; 
		$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
	 	$query2->execute() ;
	 	$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		return $table ;
 	}
	
	 public function get_dept_name($gestion,$dept)
 	{
		$sql2="SELECT DEPARTEMENT,LIBELLE FROM `min_dep_nomenclature` WHERE  DEPARTEMENT=$dept AND GESTION=$gestion AND DELEGATION=000 AND TITRE=0" ; 
	 	$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
	 	$query2->execute() ;
	 	$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		return $table[0]['LIBELLE'] ;
 	}
	 public function get_departement($gestion)
 	{
		$sql2="SELECT * FROM `min_departement` WHERE GESTION=$gestion  ORDER BY LF" ; 
	 	$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
	 	$query2->execute() ;
	 	$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		return $table ;
 	}
	 public function insert_dept($gestion)
	 {
		 $tab1=self::get_departement_by_pay($gestion)  ; 
		 $result=Utils::group_by("PAY_CHAPIT",$tab1) ;
		  foreach($result as $chapitre)
		  {		$ln="" ;
			  foreach($chapitre as $dept)
			  {	
				
				$dep=$dept['DEP_CHAPIT'] ; $chap=$dept['PAY_CHAPIT'] ;
				$libelle=self::get_dept_name($gestion,$dep) ;
				$ln.=$dep.',' ; 
				$sql1="INSERT INTO `min_departement`( `GESTION`,`DEPARTEMENT`, `LIBELLE`, `LF`, `LF_LIBELLE`, `ln`) VALUES ('$gestion','$dep','$libelle','$chap','','')" ; 
				$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
				if ($sth == false) {
					print_r($query1->errorInfo());
					 echo $sql1 ;
					echo "erreur excute <br>";;
				}	
			  }
			  $ln=substr($ln, 0,strlen($ln)-1);
			  $sql1=" UPDATE `min_departement` SET ln='$ln' WHERE GESTION='$gestion' AND LF='$chap'" ; 
			  echo $sql1."<br>" ;
			  $query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
				$sth=$query1->execute() ;
		  }
		 var_dump($result) ; 
	 }
	 public function get_gouvs($chambre)
 	{
		$sql2="SELECT * FROM gouv WHERE IdChambre=$chambre" ; 
	 	$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
	 	$query2->execute() ;
	 	$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		return $table ;
 	}

	 public function get_gestions_by_entite($entite)
 	{
		$sql2="SELECT GESTION FROM gestion WHERE entite=$entite ORDER BY GESTION DESC" ; 
	 	$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
	 	$query2->execute() ;
	 	$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		return $table ;
 	}



	 public function get_table_info($table)
	 {
		$sql2="SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'tathmine' AND TABLE_NAME ='$table'" ; 
	 	$query2=DB::getInstance()->prepare($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.DB::getInstance()->errorInfo());
	 	$query2->execute() ;
	 	$table = $query2->fetchAll(PDO::FETCH_ASSOC);
		return $table ;
	 }
}
