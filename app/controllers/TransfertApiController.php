<?php
class TransfertApiController extends ApiController {

	protected static $tableName = "project";
	public function index() 
	{
		
	}
	


public function getemployeebyproject($project_id) 
{
	$tab=TransfertModel::getemployeebyproject($project_id) ; 
		
	echo json_encode($tab); die; 
}



public function transferitem() 
{
	var_dump($_POST) ; die; 
	$tab=TransfertModel::getemployeebyproject($project_id) ; 
		
	echo json_encode($tab); die; 
}
}