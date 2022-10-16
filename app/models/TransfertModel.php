<?php
class TransfertModel extends Model {

	
	protected static $tableName = 'transfert';
    
	public function getemployeebyproject($project_id) {
		$sql1 = "SELECT * FROM employee WHERE id_project='$project_id'";
		///echo $sql1 ; die ;
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$query1->execute() ;
		$table = $query1->fetchAll(PDO::FETCH_ASSOC);
		return $table ;	
	}


	


	






























	


	






















	

	
}
