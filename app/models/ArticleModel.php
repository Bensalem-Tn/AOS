<?php
class ArticleModel extends Model {

	
	protected static $tableName = 'article';
    
	
	
	public function getAnalyticalByPartial($partial_id) {
		$sql1 = "SELECT * FROM analytical WHERE id_partial='$partial_id'";
		///echo $sql1 ; die ;
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$query1->execute() ;
		$table = $query1->fetchAll(PDO::FETCH_ASSOC);
		return $table ;	
	}


	public function ArticleDetail($code)
	{
		$sql1 = "SELECT id,code,description,libelle_partial,libelle_analytical,libelle_unit_mouv,libelle_unit,libelle_state , libelle_location,qte ,photo,photo_technique FROM article, partial,analytical,unit_mouv,unit,article_state,article_location WHERE partial.id_partial=partial AND analytical.id_analytical=analytical AND unit_mouv.id_unit_mouv=unit_mouv AND unit.id_unit=unit AND article_state.id_state=etat AND article_location.id_location=location AND code='$code' ";
		
		///echo $sql1 ; die ;
		$query1=DB::getInstance()->prepare($sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.DB::getInstance()->errorInfo());
		$query1->execute() ;
		$table = $query1->fetchAll(PDO::FETCH_ASSOC);
		return $table ;
	}


	






























	


	






















	

	
}
