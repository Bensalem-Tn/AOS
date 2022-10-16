<?php
class ArticleApiController extends ApiController {

	protected static $tableName = "partial";
	public function index() 
	{
		
	}
		//ARTICLES
	public function fetch()
	{	
		
		$column = ["id", "code", "description","partial", "analytical", "qte", "unit", "unit_mouv", "location" , "etat"];
 		$query = "SELECT id,code,description,libelle_partial,libelle_analytical,libelle_unit_mouv,libelle_unit,libelle_state , libelle_location,qte FROM article, partial,analytical,unit_mouv,unit,article_state,article_location WHERE partial.id_partial=partial AND analytical.id_analytical=analytical AND unit_mouv.id_unit_mouv=unit_mouv AND unit.id_unit=unit AND article_state.id_state=etat AND article_location.id_location=location  ";
		
		 if (isset($_POST["search"]["value"])) {
			$query .=
				' AND (code LIKE "%' .$_POST["search"]["value"] .'%" OR description LIKE "%' .$_POST["search"]["value"] . 
				'%" OR libelle_partial LIKE "%' .$_POST["search"]["value"] .'%" OR libelle_analytical LIKE "%' .$_POST["search"]["value"] .
				'%"OR qte LIKE "%' .$_POST["search"]["value"] .'%" OR  libelle_unit LIKE "%' .$_POST["search"]["value"] .'%"
				 OR libelle_unit_mouv LIKE "%' .$_POST["search"]["value"] .'%"OR libelle_location LIKE "%' .$_POST["search"]["value"] .
				'%"OR etat LIKE "%' .$_POST["search"]["value"].
				'%")';
	 	 }
		if (isset($_POST["order"])) {
			$query .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id ASC ';
		}
		$query1 = '';
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$statement = DB::getInstance()->prepare($query)or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());;
		$statement->execute()or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());; 
		$number_filter_row = $statement->rowCount();
		 
		$statement = DB::getInstance()->prepare($query . $query1);
		 
		$statement->execute();
		 
		$result = $statement->fetchAll();
	 
		$data = [];
		 
		foreach ($result as $row) {
			$sub_array = [];
		
			$sub_array[] = $row->id;
			$sub_array[] = "<a href='".Utils::generateLink('article/details/'.$row->code)."' target='blank'>".$row->code."</a>";
			$sub_array[] = $row->description;
			$sub_array[] = $row->libelle_partial;
			$sub_array[] = $row->libelle_analytical;
			$sub_array[] = $row->qte;
			$sub_array[] = $row->libelle_unit;
			$sub_array[] = $row->libelle_unit_mouv;
			$sub_array[] = $row->libelle_location;
			$sub_array[] = $row->libelle_state;
			
			
			
			$data[] = $sub_array;
		}
			//echo $query ;
			//var_dump($query);
			
		 
		$output = [
			'draw' => intval($_POST['draw']),
			'recordsTotal' =>self::count_all_data('article'),
			'recordsFiltered' => $number_filter_row,
			'data' => $data,
		];
		//var_dump($output) ;
		echo json_encode($output); die ;
		 
	}
	public function edit ()
	{


	
		if ($_POST['action'] == 'edit') {
			$data = [
				$article_code =$_POST['article_code'],
				$description = $_POST['description'],
				$partial = $_POST['partial'],
				$analytical = $_POST['analytical'],
				$qte = $_POST['qte'],
				$unit = $_POST['unit'],
				$unit_mouv =  $_POST['unit_mouv'],
				$location = $_POST['location'],
				$etat = $_POST['etat'],
				$id = $_POST['id'],
			];
		 
			$query = "
		 UPDATE article 
		 SET code = '$article_code', 
		 description = '$description', 
		 partial = $partial,
		 analytical = $analytical,
		 qte = $qte,
		 unit = $unit,
		 unit_mouv = $unit_mouv,
		 location = $location,
		 etat = $etat 
		 WHERE id = $id
		 ";
		//echo $query; die ;
			$statement =DB::getInstance()->prepare($query);
			$statement->execute($data);
			echo json_encode($_POST); die;
		}
		 
		if ($_POST['action'] == 'delete') {
			$query =
				"
		 DELETE FROM article 
		 WHERE id = '" .
				$_POST["id"] .
				"'
		 ";
			$statement = DB::getInstance()->prepare($query);
			$statement->execute();
			echo json_encode($_POST);
			die;
		}
		 
	}
	public function articlelist()
{
	  
	  $uploadDirectory ="app/views/_global/uploads/";
	  $fileExtensions = ['jpeg','jpg','png','gif','pdf'];
	  $article_code = (isset($_POST['article_code'])) ? $_POST['article_code'] : '';
	  $article_name = (isset($_POST['article_name'])) ? $_POST['article_name'] : '';
	  $partial = (isset($_POST['partial'])) ? $_POST['partial'] : '';
	  $analytical =(isset($_POST['analytical'])) ? $_POST['analytical'] : '';
	  $qte = (isset($_POST['qte'])) ? $_POST['qte'] : '';
	  $unit_mouv = (isset($_POST['unit_mouv'])) ? $_POST['unit_mouv'] : '';
	  $unit = (isset($_POST['unit'])) ? $_POST['unit'] : '';
	  $location = (isset($_POST['location'])) ? $_POST['location'] : '';
	  $state = (isset($_POST['state'])) ? $_POST['state'] : '';


	  
	  
	  if(!empty($_FILES['file1'] ?? null)) {
	  $fileName1 = $_FILES['file1']['name'];
	  $fileTmpName1  = $_FILES['file1']['tmp_name'];
	  $fileType1 = $_FILES['file1']['type'];
	  $fileExtension = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	  $uploadPath =$uploadDirectory . basename($fileName);
	  if (isset($fileName1)) {
		  $didUpload = move_uploaded_file($fileTmpName1, $uploadPath);
	  } else {
		  $fileName1="default1.jpg" ;
	  }
  	}
 	 if(!empty($_FILES['file2'] ?? null)) {
	  $fileName2 = $_FILES['file2']['name'];
	  $fileTmpName2  = $_FILES['file2']['tmp_name'];
	  $fileType2 = $_FILES['file2']['type'];
	  $fileExtension = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	  $uploadPath =$uploadDirectory . basename($fileName2);
	  if (isset($fileName2)) {
		  $didUpload = move_uploaded_file($fileTmpName2, $uploadPath);
	  } else {
		  $fileName2="default2.jpg" ;
	  }
  	}

		
	  
	  $option = (isset($_POST['option'])) ? $_POST['option'] : '';
	  
	  
	  //var_dump($_POST) ; die; 
	  switch($option){
		  case 1:
			  $sql = "INSERT INTO `article`( code,partial,analytical,description,qte,unit_mouv,unit,location,photo,photo_technique,etat) VALUES 
			  ( '$article_code','$partial','$analytical','$article_name','$qte','$unit_mouv','$unit','$location','$fileName1','$fileName2','$state')"; ;
			  
			  $result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
			  $result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());; 
			  
			  $sql = "SELECT * FROM article ORDER BY id DESC LIMIT 1";
			  $result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
			  $result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
			  $data=$result->fetchAll(PDO::FETCH_ASSOC);       
			  break;    
	  
	  

	  }
	  
	  print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

	   die ;
}
	//PARTIALS
	public function fetch_partial()

	{	
		
		$column = ["id_partial", "libelle_partial"];
 		$query = "SELECT * FROM partial";
		
		 if (isset($_POST["search"]["value"])) {
			$query .=
				' WHERE (id_partial LIKE "%' .$_POST["search"]["value"] .'%" OR libelle_partial LIKE "%' .$_POST["search"]["value"] . 
				'%")';
	 	 }
		if (isset($_POST["order"])) {
			$query .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id_partial ASC ';
		}
		$query1 = '';
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$statement = DB::getInstance()->prepare($query)or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());;
		$statement->execute()or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());; 
		$number_filter_row = $statement->rowCount();
		 
		$statement = DB::getInstance()->prepare($query . $query1);
		 
		$statement->execute();
		 
		$result = $statement->fetchAll();
	 
		$data = [];
		 
		foreach ($result as $row) {
			$sub_array = [];
			$sub_array[] = $row->id_partial;
			$sub_array[] = $row->libelle_partial;
			$sub_array[] = $row->libelle_analytical;
			$data[] = $sub_array;
		}
		$output = [
			'draw' => intval($_POST['draw']),
			'recordsTotal' =>self::count_all_data('partial'),
			'recordsFiltered' => $number_filter_row,
			'data' => $data,
		];
		//var_dump($output) ;
		echo json_encode($output); die ;
		 
	}

	public function edit_partial ()
	{
		if ($_POST['action'] == 'edit') {
			$data = [$article_code =$_POST['id'],$description = $_POST['libelle_partial']];
		 	$query = "UPDATE partial SET libelle_partial = '$libelle_partial' WHERE id_partial = $id";
			$statement =DB::getInstance()->prepare($query);
			$statement->execute($data);
			echo json_encode($_POST); die;
		}
		if ($_POST['action'] == 'delete') {
			$query ="DELETE FROM partial WHERE id_partial = '" .$_POST["id"] ."'";
			$statement = DB::getInstance()->prepare($query);
			$statement->execute();
			echo json_encode($_POST);
			die;
		}
	}


	public function insertpartial ()
	{
		$libelle_partial = (isset($_POST['libelle_partial'])) ? $_POST['libelle_partial'] : '';
		$sql = "INSERT INTO `partial`( libelle_partial) VALUES ( '$libelle_partial')"; 
		$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
		$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());; 
	}
	//UNIT
	public function insertunit ()
	{

		$libelle_unit = (isset($_POST['libelle_unit'])) ? $_POST['libelle_unit'] : '';
		$sql = "INSERT INTO `unit`( libelle_unit) VALUES 
		( '$libelle_unit')"; ;
		
		$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
		$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());; 


		
		 
	}
	public function edit_unit ()
	
	{
		//var_dump($_POST) ; die ;
		if ($_POST['action'] == 'edit') {
			$data = [
				$article_code =$_POST['id'],
				$description = $_POST['libelle_unit'],
				
			];
		 
			$query = "
		 UPDATE unit 
		 SET libelle_unit = '$libelle_unit' WHERE id_unit = $id";
		//echo $query; die ;
			$statement =DB::getInstance()->prepare($query);
			$statement->execute($data);
			echo json_encode($_POST); die;
		}
		 
		if ($_POST['action'] == 'delete') {
			$query ="DELETE FROM unit WHERE id_unit = '".$_POST["id"] ."'";
			$statement = DB::getInstance()->prepare($query);
			$statement->execute();
			echo json_encode($_POST);
			die;
		}
		 
	}
	public function fetch_unit()

	{	
		
		$column = ["id_unit", "libelle_unit"];
		 $query = "SELECT * FROM unit";
		
		 if (isset($_POST["search"]["value"])) {
			$query .=
				' WHERE (id_unit LIKE "%' .$_POST["search"]["value"] .'%" OR libelle_unit LIKE "%' .$_POST["search"]["value"] . 
				'%")';
		  }
		if (isset($_POST["order"])) {
			$query .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id_unit ASC ';
		}
		$query1 = '';
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$statement = DB::getInstance()->prepare($query)or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());;
		$statement->execute()or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());; 
		$number_filter_row = $statement->rowCount();
		 
		$statement = DB::getInstance()->prepare($query . $query1);
		 
		$statement->execute();
		 
		$result = $statement->fetchAll();
	 
		$data = [];
		 
		foreach ($result as $row) {
			$sub_array = [];
			$sub_array[] = $row->id_unit;
			$sub_array[] = $row->libelle_unit;
			
			$data[] = $sub_array;
		}
		$output = [
			'draw' => intval($_POST['draw']),
			'recordsTotal' =>self::count_all_data('unit'),
			'recordsFiltered' => $number_filter_row,
			'data' => $data,
		];
		//var_dump($output) ;
		echo json_encode($output); die ;
		 
	}
	//UNIT MOUV
	public function edit_unit_mouv ()
	
	{
		//var_dump($_POST) ; die ;
		if ($_POST['action'] == 'edit') {
			$data = [
				$id =$_POST['id'],
				$libelle_unit_mouv = $_POST['libelle_unit_mouv'],
				
			];
		 
			$query = "
		 UPDATE unit_mouv SET libelle_unit_mouv = '$libelle_unit_mouv' WHERE id_unit_mouv = $id";
		//echo $query; die ;
			$statement =DB::getInstance()->prepare($query);
			$statement->execute($data);
			echo json_encode($_POST); die;
		}
		 
		if ($_POST['action'] == 'delete') {
			$query ="DELETE FROM unit_mouv WHERE id_unit_mouv = '".$_POST["id"] ."'";
			$statement = DB::getInstance()->prepare($query);
			$statement->execute();
			echo json_encode($_POST);
			die;
		}
		 
	}
	
	public function insertunitmouv ()
	{

		$libelle_unit_mouv = (isset($_POST['libelle_unit_mouv'])) ? $_POST['libelle_unit_mouv'] : '';
		$sql = "INSERT INTO `unit_mouv`( libelle_unit_mouv) VALUES ( '$libelle_unit_mouv')"; ;
		
		$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
		$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());; 


		
		 
	}
	public function fetch_unit_mouv()

		{	
			
			$column = ["id_unit_mouv", "libelle_unit_mouv"];
			 $query = "SELECT * FROM unit_mouv";
			
			 if (isset($_POST["search"]["value"])) {
				$query .=
					' WHERE (id_unit_mouv LIKE "%' .$_POST["search"]["value"] .'%" OR libelle_unit_mouv LIKE "%' .$_POST["search"]["value"] . 
					'%")';
			  }
			  //var_dump($query) ;
			if (isset($_POST["order"])) {
				$query .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
			} else {
				$query .= 'ORDER BY id_unit_mouv ASC ';
			}
			$query1 = '';
			if ($_POST["length"] != -1) {
				$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}
			$statement = DB::getInstance()->prepare($query)or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());;
			$statement->execute()or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());; 
			$number_filter_row = $statement->rowCount();
			 
			$statement = DB::getInstance()->prepare($query . $query1);
			 
			$statement->execute();
			 
			$result = $statement->fetchAll();
		 
			$data = [];
			 
			foreach ($result as $row) {
				$sub_array = [];
				$sub_array[] = $row->id_unit_mouv;
				$sub_array[] = $row->libelle_unit_mouv;
				
				$data[] = $sub_array;
			}
			$output = [
				'draw' => intval($_POST['draw']),
				'recordsTotal' =>self::count_all_data('unit_mouv'),
				'recordsFiltered' => $number_filter_row,
				'data' => $data,
			];
			//var_dump($output) ;
			echo json_encode($output); die ;
			 
		}
	// STATES
	public function fetch_state()

	{	
		
		$column = ["id_state", "libelle_state"];
 		$query = "SELECT * FROM article_state";
		
		 if (isset($_POST["search"]["value"])) {
			$query .=
				' WHERE (id_state LIKE "%' .$_POST["search"]["value"] .'%" OR libelle_state LIKE "%' .$_POST["search"]["value"] . 
				'%")';
	 	 }
		if (isset($_POST["order"])) {
			$query .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id_state ASC ';
		}
		$query1 = '';
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$statement = DB::getInstance()->prepare($query)or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());;
		$statement->execute()or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());; 
		$number_filter_row = $statement->rowCount();
		 
		$statement = DB::getInstance()->prepare($query . $query1);
		 
		$statement->execute();
		 
		$result = $statement->fetchAll();
	 
		$data = [];
		 
		foreach ($result as $row) {
			$sub_array = [];
			$sub_array[] = $row->id_state;
			$sub_array[] = $row->libelle_state;
			
			$data[] = $sub_array;
		}
		$output = [
			'draw' => intval($_POST['draw']),
			'recordsTotal' =>self::count_all_data('article_state'),
			'recordsFiltered' => $number_filter_row,
			'data' => $data,
		];
		//var_dump($output) ;
		echo json_encode($output); die ;
		 
	}
	public function insertstate ()
	{

		$libelle_state = (isset($_POST['libelle_state'])) ? $_POST['libelle_state'] : '';
		$sql = "INSERT INTO `article_state`( libelle_state) VALUES ( '$libelle_state')"; ;
		
		$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
		$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());; 
	}
	public function edit_state ()
	
	{
		//var_dump($_POST) ; die ;
		if ($_POST['action'] == 'edit') {
			$data = [
				$id =$_POST['id'],
				$libelle_state = $_POST['libelle_state'],
				
			];
		 
			$query = "
		 UPDATE article_state SET libelle_state = '$libelle_state' WHERE id_state = $id";
		//echo $query; die ;
			$statement =DB::getInstance()->prepare($query);
			$statement->execute($data);
			echo json_encode($_POST); die;
		}
		 
		if ($_POST['action'] == 'delete') {
			$query ="DELETE FROM article_state WHERE id_state = '".$_POST["id"] ."'";
			$statement = DB::getInstance()->prepare($query);
			$statement->execute();
			echo json_encode($_POST);
			die;
		}
		 
	}

	///LOCATIONS
	public function fetch_location()

	{	
		
		$column = ["id_state", "libelle_location"];
 		$query = "SELECT * FROM article_location";
		
		 if (isset($_POST["search"]["value"])) {
			$query .=
				' WHERE (id_location LIKE "%' .$_POST["search"]["value"] .'%" OR libelle_location LIKE "%' .$_POST["search"]["value"] . 
				'%")';
	 	 }
		if (isset($_POST["order"])) {
			$query .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id_location ASC ';
		}
		$query1 = '';
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$statement = DB::getInstance()->prepare($query)or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());;
		$statement->execute()or die('Erreur SQL !<br />'.$query.'<br />'.DB::getInstance()->errorInfo());; 
		$number_filter_row = $statement->rowCount();
		 
		$statement = DB::getInstance()->prepare($query . $query1);
		 
		$statement->execute();
		 
		$result = $statement->fetchAll();
	 
		$data = [];
		 
		foreach ($result as $row) {
			$sub_array = [];
			$sub_array[] = $row->id_location;
			$sub_array[] = $row->libelle_location;
			
			$data[] = $sub_array;
		}
		$output = [
			'draw' => intval($_POST['draw']),
			'recordsTotal' =>self::count_all_data('article_state'),
			'recordsFiltered' => $number_filter_row,
			'data' => $data,
		];
		//var_dump($output) ;
		echo json_encode($output); die ;
		 
	}
	public function insertlocation ()
	{

		$libelle_location = (isset($_POST['libelle_location'])) ? $_POST['libelle_location'] : '';
		$sql = "INSERT INTO `article_location`( libelle_location) VALUES ( '$libelle_location')"; ;
		
		$result = DB::getInstance()->prepare($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());;
		$result->execute()or die('Erreur SQL !<br />'.$sql.'<br />'.DB::getInstance()->errorInfo());; 
	}
	public function edit_location ()
	
	{
		//var_dump($_POST) ; die ;
		if ($_POST['action'] == 'edit') {
			$data = [
				$id =$_POST['id'],
				$libelle_location = $_POST['libelle_location'],
				
			];
		 
			$query = "
		 UPDATE article_location SET libelle_location = '$libelle_location' WHERE id_location = $id";
		//echo $query; die ;
			$statement =DB::getInstance()->prepare($query);
			$statement->execute($data);
			echo json_encode($_POST); die;
		}
		 
		if ($_POST['action'] == 'delete') {
			$query ="DELETE FROM article_location WHERE id_location = '".$_POST["id"] ."'";
			$statement = DB::getInstance()->prepare($query);
			$statement->execute();
			echo json_encode($_POST);
			die;
		}
		 
	}
		

	function count_all_data($table)
		{
			$query = "SELECT * FROM $table";
			
			$statement = DB::getInstance()->prepare($query);
			$statement->execute();
			
			return $statement->rowCount();
		}


	
		  public function getAllUnit(){
      
			
			
			$out='{';$i=0;
				$tab=Model:: get_All('unit') ; 
				foreach($tab as $t)
				{   $i++ ;
					$out.='"'.$t->id_unit.'":"'.$t->libelle_unit.'"';
					if($i<sizeof($tab))
					$out.=',' ;
				}
				$out.='}' ;
				echo $out ; die;   
	}

	public function getAllUnitMouv(){
      
	
		
		$out='{';$i=0;
			$tab=Model:: get_All('unit_mouv') ;  
			foreach($tab as $t)
			{   $i++ ;
				$out.='"'.$t->id_unit_mouv.'":"'.$t->libelle_unit_mouv.'"';
				if($i<sizeof($tab))
				$out.=',' ;
			}
			$out.='}' ;
			echo $out ; die;   
		}
public function getAllstate(){
    $out='{';$i=0;
		$tab=Model:: get_All('article_state') ; 
		foreach($tab as $t)
		{   $i++ ;
			$out.='"'.$t->id_state.'":"'.$t->libelle_state.'"';
			if($i<sizeof($tab))
			$out.=',' ;
		}
		$out.='}' ;
		echo $out ; die;   
}
public function getAlllocation(){
	$out='{';$i=0;
		$tab=Model:: get_All('article_location') ; 
		foreach($tab as $t)
		{   $i++ ;
			$out.='"'.$t->id_location.'":"'.$t->libelle_location.'"';
			if($i<sizeof($tab))
			$out.=',' ;
		}
		$out.='}' ;
		echo $out ; die;   
	
	
	
}

public function getAllPartial(){
	
		$out='{';$i=0;
		$tab=Model:: get_All('partial') ; 
		foreach($tab as $t)
		{   $i++ ;
			$out.='"'.$t->id_partial.'":"'.$t->libelle_partial.'"';
			if($i<sizeof($tab))
			$out.=',' ;
		}
		$out.='}' ;
		echo $out ; die; 
}

public function getAllAnalytical(){
      
	
	$out='{';$i=0;
		$tab=Model:: get_All('analytical') ;  
		foreach($tab as $t)
		{   $i++ ;
			$out.='"'.$t->id_partial.'":"'.$t->libelle_analytical.'"';
			if($i<sizeof($tab))
			$out.=',' ;
		}
		$out.='}' ;
		echo $out ; die; 

	
	echo json_encode($tab); die; 
}


public function getanalyticalbypartial($partial_id) 
{
	$tab=ArticleModel::getAnalyticalByPartial($partial_id) 
	; 
		
	echo json_encode($tab); die; 
}
}