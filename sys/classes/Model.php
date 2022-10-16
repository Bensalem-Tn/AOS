<?php

/**
 * Classe de modèle de base. Chaque modèle devrait étendre cette classe.
 */
abstract class Model {

	/**
	 * Nom de la table
	 * @var string
	 */
	protected static $tableName = null;

	/**
	 * Renvoie le nom de la table
	 * @return string
	 */
	protected static function getTableName() {
		if (!empty(static::$tableName)) {
			return static::$tableName;
		}

		ob_clean();
		die('MODEL: Table name not defined.');
	}
		public static function setGestion($champ,$ges)
		{
			$gestion=$ges;
		//die($ges)  ;
		$tges= explode(",",$gestion);
		//var_dump(count($tges)) ; //die ;
		$gest="AND (".$champ."=" ; 
		for($i=0;$i<count($tges)-1;$i++)
		{
		$gest.="'$tges[$i]' OR  ".$champ."=";	
		}	
		$gest.="'$tges[$i]')";
		return $gest ;
		}
	/**
	 * Renvoie toutes les lignes de la table
	 * <code>
	 * 	Model::getAll();
	 * </code>
	 * @return array
	 */
	public static function get_All($TableName) {
	
		$sql = "SELECT * FROM $TableName;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->execute();

		return $pst->fetchAll();
	}
	 
	public  static function getListe_deroulante($liste,$id,$code,$libelle)
	{
	$output=""; 
		foreach ($liste as $ligne): 
			if($ligne[$code]==$id)
			{
			$output .= '<option  selected="true" value="'.$ligne[$code].'">'.trim($ligne[$code]).':'.trim($ligne[$libelle]).'</option>';
		}
		else 
		{$output .= '<option value="'.$ligne[$code].'">'.trim($ligne[$code]).':'.trim($ligne[$libelle]).'</option>';}	
		endforeach;
				   $output .='</select>' ;
				return $output ;
				} 
	/**
	 * Renvoie une ligne d'une table ayant le paramètre ID approprié.
	 * <code>
	 * 	Model::getById($id);
	 * </code>
	 * @param int $id ID параметар
	 * @return object|bool
	 */
	 public static function get_gestion ($id)
	 {
		$sql = "SELECT GESTION FROM gestion WHERE `entite` =$id  ORDER BY GESTION DESC";
		$pst = DB::getInstance()->prepare($sql);
		$pst->execute();
		return $pst->fetchAll(); 
	 }


	public static function getById($id) {
		$tableName = sprintf('`%s`', self::getTableName());

		$sql = "SELECT * FROM $tableName WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, intval($id), PDO::PARAM_INT);
		$pst->execute();

		return $pst->fetch();
	}

	/**
	 * Ajouter une nouvelle ligne à la table
	 * <code>
	 * 	Model::create([
	 * 		'field_1' => 'value_1',
	 * 		'field_2' => 'value_2'
	 * 	]);
	 * </code>
	 * @param array $data Улазни параметри
	 * @return int|bool
	 */
	public static function create($data) {
		$tableName = sprintf('`%s`', self::getTableName());
		$fields = $placeholders = $values = [];

		if (!is_array($data) || empty($data)) {
			ob_clean();
			die('MODEL: Bad input for create.');
		}

		foreach ($data as $field => $value) {
			$fields[] = "`$field`";
			$values[] = $value;
			$placeholders[] = '?';
		}

		$fields = '(' . implode(', ', $fields) . ')';
		$placeholders = '(' . implode(', ', $placeholders) . ')';

		$sql = "INSERT INTO $tableName $fields VALUES $placeholders;";
		$pst = DB::getInstance()->prepare($sql);

		if (!$pst) {
			return false;
		}

		if (!$pst->execute($values)) {
			return false;
		}

		return DB::getInstance()->lastInsertId();
	}

	/**
	 * Mise à jour d'une ligne dans une table ayant le paramètre ID approprié
	 * <code>
	 * 	Model::update($id, [
	 * 		'field_1' => 'value_1',
	 * 		'field_2' => 'value_2'
	 * 	]);
	 * </code>
	 * @param int $id ID параметар
	 * @param array $data Остали улазни параметри
	 * @return bool
	 */
	public static function update($id, $data) {
		$tableName = sprintf('`%s`', self::getTableName());
		$fields = $values = [];

		if (!is_array($data) || empty($data)) {
			ob_clean();
			die('MODEL: Bad input for update.');
		}

		foreach ($data as $field => $value) {
			$fields[] = "`$field` = ?";
			$values[] = $value;
		}

		$fields = implode(', ', $fields);
		$values[] = intval($id);

		$sql = "UPDATE $tableName SET $fields WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);

		if (!$pst) {
			return false;
		}

		return $pst->execute($values);
	}

	/**
	 * Suppression d'une ligne dans une table ayant le paramètre ID approprié
	 * <code>
	 * 	Model::delete($id);
	 * </code>
	 * @param int $id ID параметар
	 * @return bool
	 */
	public static function delete($id) {
		$tableName = sprintf('`%s`', self::getTableName());

		$sql = "DELETE FROM $tableName WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, intval($id), PDO::PARAM_INT);

		return $pst->execute();
	}

	/**
	 * "Déconnexion "constructeur.
	 */
	private function __construct() {}

}
