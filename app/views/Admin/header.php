<!DOCTYPE html>
<html>
<head>
	<title><?= isset($DATA['title']) ? $DATA['title'] : 'تثميـــــن'; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" /><!-- CSS -->
      
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/css/theme-brown.css'); ?>">  
    
	<link rel="icon" href="<?= Utils::generateLink('assets/favicon.ico'); ?>">

 <link href="<?= Utils::generateLink('assets/css/busy-load.css'); ?>" rel="stylesheet">
 <link href="<?= Utils::generateLink('assets/css/editor.bootstrap.min.css'); ?>" rel="stylesheet">
 <link href="<?= Utils::generateLink('assets/css/select.dataTables.css'); ?>" rel="stylesheet">
 <link href="<?= Utils::generateLink('assets/css/select2.min.css'); ?>" rel="stylesheet">


 <?php if (isset($DATA['CSS_MODULE'])): ?>
	<link href="<?= Utils::generateLink($DATA['CSS_MODULE']); ?>"rel="stylesheet">
    <?php endif; ?>

    
        <!-- EOF CSS INCLUDE -->                                    
    <style>




         .sortable_list {
border: 1px solid ;
width: 100%;
min-height: 20px;
list-style-type: none;
margin: 0;
padding: 5px 0 0 0;
float: left;
margin-right: 10px;
}
.delete-gouv {
float : right ;
}
.editable_gouv{
    color :#FFF;
}
.sortable_list li {
margin: 0 5px 5px 5px;
padding: 5px;
font-size: 1.3em;
width: 100%px;
background-color:#008080;
color: #FFFF;
}
.editable{
    font-size: 1.5em;
}
.editable-dept{
    font-size: 1.1em;
}
        .panel-body black {
background:#1caf9a;}
	.scrollable-panel{
      height:300px;
     
      overflow-y:scroll;
      overflow-x:hidden;
      width:100%;
      }
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    
.container {
    margin-top: 20px;
}
.form-inline .form-group > div.col-xs-8 {
    padding-left: 0;
    padding-right: 0;
}
.form-inline label {
    line-height: 34px;
}
.form-inline .form-control {
    width: 100%;
}
@media (min-width: 768px) {
  .form-inline .form-group {
    margin-bottom: 15px;
  }
 
}


</style>

</head>
<body>
    
<!-- page-navigation-toggled   page-mode-rtl page-navigation-toggled  -->
<div class="page-container ">
<?php
$x=AdminModel::get_gestions_by_entite(1) ;
$last_ges=$x[0]['GESTION'];
//var_dump($last_ges) ;
?>
    <div class="page-sidebar ">
        <ul class="x-navigation">
            <li  class="xn-logo">
                <a href="<?= Utils::generateLink('admin/dash'); ?>">TATHMINE </a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <hr>
            <li id="dash">
                <a href="<?= Utils::generateLink('admin/dash'); ?>"><span class="xn-text">TABLEAU DE BOARD</span></a>
            </li>
            <li id="user">
                <a href="<?= Utils::generateLink('admin/user'); ?>"><span class="xn-text">GESTION DES UTILISATEURS</span></a>
            </li>
            <li id="chambre">
                <a href="<?= Utils::generateLink('admin/chambre'); ?>"><span class="xn-text">RÉPARTITION DES CHAMBRES</span></a>
            </li>
            <li id="departement">
                <a href="<?= Utils::generateLink('admin/departement/'.$last_ges); ?>"><span class="xn-text">RÉPARTITION DES DÉPARTEMENTS</span></a>
            </li>
            <li id="data-insert">
                <a href="<?= Utils::generateLink('admin/data-insert'); ?>"><span class="xn-text">INSERTION DES DONNÉES</span></a>                        
            </li>
            <li id="file-manager">
                <a href="<?= Utils::generateLink('admin/file/');  ?>"target='blank'><span class="xn-text">GESTIONNAIRE DES FICHIERS</span></a>                        
            </li> 
            <li id="cache">
                <a href="<?= Utils::generateLink('admin/cache');  ?>"><span class="xn-text">GESTIONNAIRE DE CACHE</span></a>                        
            </li>
            <li id="try">
                <a href="<?= Utils::generateLink('admin/try');  ?>"><span class="xn-text">SQL</span></a>                        
            </li>                      
         
        </ul>
    </div>           
	<div class="page-content">
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
          
			<li class="xn-icon-button pull-left">
            <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            <a id='changepass' href="<?= Utils::generateLink('admin/changepass'); ?>" > <span class="fa fa-cogs fa-spin"></span></a>
            
            </li>
            <li class="xn-icon-button pull-right">
                <a href="" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
            </li> 
        </ul>