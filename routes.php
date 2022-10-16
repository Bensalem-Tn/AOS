<?php
return [
	//controller , methode , pattern
	// HomeController
	new Route('Home','index','|^/?$|'),
	new Route('Home','login','|^login/?$|'),
	new Route('Home','adminlogin','|^adminlogin/?$|'),
	new Route('Home','logout','|^logout/?$|'),
	new Route('Home','adminlogout','|^adminlogout/?$|'),
	new Route('Home','soon','|^soon/?$|'),
	new Route('User','index','|^user/?$|'),

		//DAILY MOUVEMENT
		new Route('Daily','index','|^daily-mouvement/?$|'),
		//Criteria
		new Route('Criteria','index','|^criteria/?$|'),  
		//Article
		new Route('Article','index','|^article/?$|'),
		new Route('Article','index','|^article/?$|'),
		new Route('Article','partial','|^partial/?$|'),
		new Route('Article','analytical','|^analytical/?$|'),
		new Route('Article','unit','|^unit/?$|'),
		new Route('Article','unit_mouv','|^unit_mouv/?$|'),
		new Route('Article','state','|^state/?$|'),
		new Route('Article','location','|^location/?$|'),
		new Route('Article','details','|^article/details/([A-Z,a-z,0-9]+)/?$|'),
		new Route('Article','partial','|^partial/?$|'),
		new Route('Article','analytical','|^analytical/?$|'),
		new Route('Article','unit','|^unit/?$|'),
		new Route('Article','unit_mouv','|^unit_mouv/?$|'),
		new Route('Article','location','|^location/?$|'),
		new Route('Article','state','|^state/?$|'), 
		//Article API 
		new Route('ArticleApi','articlelist','|^api/article/articlelist/.*?$|') ,
		new Route('ArticleApi','fetch','|^api/article/fetch/.*?$|') ,
		new Route('ArticleApi','edit','|^api/article/edit/.*?$|') ,
		//PARTIAL
		new Route('ArticleApi','insertpartial','|^api/article/insertpartial/.*?$|') ,
		new Route('ArticleApi','fetch_partial','|^api/article/fetch_partial/.*?$|') ,
		new Route('ArticleApi','edit_partial','|^api/article/edit_partial/.*?$|') ,
		//UNIT
		new Route('ArticleApi','insertunit','|^api/article/insertunit/.*?$|') ,
		new Route('ArticleApi','fetch_unit','|^api/article/fetch_unit/.*?$|') ,
		new Route('ArticleApi','edit_unit','|^api/article/edit_unit/.*?$|'),
		//UNIT MOUV
		new Route('ArticleApi','insertunitmouv','|^api/article/insertunitmouv/.*?$|') ,
		new Route('ArticleApi','fetch_unit_mouv','|^api/article/fetch_unit_mouv/.*?$|') ,
		new Route('ArticleApi','edit_unit_mouv','|^api/article/edit_unit_mouv/.*?$|'),

		//STATE
		new Route('ArticleApi','insertstate','|^api/article/insertstate/.*?$|') ,
		new Route('ArticleApi','fetch_state','|^api/article/fetch_state/.*?$|') ,
		new Route('ArticleApi','edit_state','|^api/article/edit_state/.*?$|'),
		

		//LOCATION
		new Route('ArticleApi','insertlocation','|^api/article/insertlocation/.*?$|') ,
		new Route('ArticleApi','fetch_location','|^api/article/fetch_location/.*?$|') ,
		new Route('ArticleApi','edit_location','|^api/article/edit_location/.*?$|'),

		new Route('ArticleApi','getallpartial','|^api/article/getallpartial/.*?$|') ,
		new Route('ArticleApi','getAllstate','|^api/article/getallstate/.*?$|') ,
		new Route('ArticleApi','getAlllocation','|^api/article/getalllocation/.*?$|') ,
		new Route('ArticleApi','getAllunitmouv','|^api/article/getallunitmouv/.*?$|') ,
		new Route('ArticleApi','getAllunit','|^api/article/getallunit/.*?$|') ,
		new Route('ArticleApi','getallanalytical','|^api/article/getallanalytical/.*?$|') ,
		new Route('ArticleApi','getanalyticalbypartial','|^api/article/getanalyticalbypartial/([0-9]+)?$|') ,





		//TRANFERT API 
		new Route('TransfertApi','getemployeebyproject','|^api/transfert/getemployeebyproject/([0-9]+)?$|') ,
		new Route('TransfertApi','transferitem','|^api/transfert/transferitem/.*?$|') ,
		
		
		//Stroe Plan
		new Route('Plan','index','|^store-plan/?$|'), 
		//receipt
		new Route('Receipt','index','|^receipt/?$|'), 
		//Transfert
		new Route('Transfert','index','|^transfert/?$|'), 
		//Final
		new Route('Final','index','|^final-report/?$|'),                           
	
	///ADMIN API 
	new Route('AdminApi','vider','|^api/admin/vider/([a-z]+)/?$|'),
	new Route('AdminApi','try','|^api/admin/try?$|'),
	new Route('AdminApi','trytofind','|^api/admin/trytofind/([a-z_]+)/(.*)?$|'),
	new Route('AdminApi', 'getgestion', '|^api/admin/getgestion/([1-4])?$|'),
	new Route('AdminApi', 'getids', '|^api/admin/getids/([1-4])/([0-9]+)?$|'),
	new Route('AdminApi', 'addchambre', '|^api/admin/addchambre?$|'),
	new Route('AdminApi', 'editchambre', '|^api/admin/editchambre?$|'),
	new Route('AdminApi', 'editgouv', '|^api/admin/editgouv?$|'),
	new Route('AdminApi', 'editdept', '|^api/admin/editdept?$|'),
	new Route('AdminApi', 'updatechambre', '|^api/admin/updatechambre?$|'),
	new Route('AdminApi', 'deletechambre', '|^api/admin/deletechambre/([0-9]+)?$|'),
	new Route('AdminApi', 'addgouv', '|^api/admin/addgouv?$|'),
	new Route('AdminApi', 'gouvexist', '|^api/admin/gouvexist?$|'),
	new Route('AdminApi', 'gesexist', '|^api/admin/gesexist?$|'),
	new Route('AdminApi', 'deletegouv', '|^api/admin/deletegouv?$|'),
	
	new Route('AdminApi','resetdate','|^api/admin/resetdate/([1-4])?$|') ,
	new Route('AdminApi','deletevoid','|^api/admin/deletevoid/([1-4])?$|') ,
	new Route('AdminApi','activategestion','|^api/admin/activategestion/([0-9]+)/([0-9]+)?$|') ,
	new Route('AdminApi','deleteallgestion','|^api/admin/deleteallgestion/([0-9]+)/([0-9]+)?$|') ,
	new Route('AdminApi','deletegestion','|^api/admin/deletegestion/([a-z_]+)/([A-Z_]+)/([0-9]+)?$|') ,
	new Route('AdminApi','changepassword','|^api/user/changepassword?$|') ,
	new Route('AdminApi','reload','|^api/admin/reload/([a-z_]+)?$|') ,
	new Route('AdminApi','tableinfo','|^api/admin/tableinfo/([a-z_]+)?$|') ,
	
	
	
/// NOT FOUND 404
///ADMIN INTERFACE



/// NOT FOUND 404
	new Route('Home','e404','|^.*$|'),
	
	 
	
	
	
];
