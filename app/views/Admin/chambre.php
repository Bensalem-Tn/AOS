<div class="row">  
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box" >
                        <h3>Ajouter une chambre</h3>
                </div>                                    
            </div>
            <div class="panel-body">                                                                        
               <form class="form-horizontal" method="POST">
                        <div class="col-md-9">
                            <div class="form-group">
                              <input type="text" class="form-control" id="chambre-name" name="chambre_name"placeholder="Nom de la chambre" required >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block"id="ajouter">Ajouter</button>
                                </div>
                            </div>
                        </div>    
                </form>
            </div>
        </div>
    </div>

	<div class="col-md-12">
        <div class="panel panel-primary">
			<div class="panel-heading">
                <div class="panel-title-box" >
                    <h2 id='indicateurs'>Répartition des Gouvernorats sur les Chambres De la Cour Des Comptes</h2>
                </div>                                    
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul> 
            </div>
            <div class="panel-body"id="p-body">
				<?php
                    foreach($DATA['data'] as $li)
                            { 
                                
                                echo '
                                <div  id="'.$li['id'].'"class="col-md-3">
                            <div  class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4><a id="chsortable'.$li['id'].'" href="#" data-type="text" data-pk="0'.$li['id'].'" data-name="'.$li['id'].'" class="panel-title-box editable">'.$li['libelle'].'</a></h4>
                                  </div>
                                <div    class="panel-body">
                                    <ul id="sortable'.$li['id'].'" class="sortable_list connectedSortable">';
                                foreach($li['gouvs'] as $l)
                                {
                                    
                                    echo '  <li class="ui-state-default">'.$l['Code_Gouv'].' - '.'<a class="editable_gouv" href="#" id="'.$l['Code_Gouv'].' data-name="'.$l['Code_Gouv'].'" data-pk="0" >'.$l['LibelleReg'].'</a>  <button  class="btn btn-primary delete-gouv"  id="delete-gouv-'.$l['Code_Gouv'].'"><span class="fa fa-trash"></span></button></li>' ;
                                }
                                   echo ' </ul>
                                    </div>
                                    <div class="panel-footer"> ' ; 
                                echo  empty($li['gouvs']) ?  '<button  class="btn btn-primary btn-block delete-chambre" id="delete-chambre-'.$li['id'].'"><span class="fa fa-trash"></span> '.$li['id'].'-Supprimer la Chambre</button>' : '<button  class="btn btn-disabled btn-block delete-chambre" id="delete-chambre-'.$li['id'].'"><span class="fa fa-trash"></span> '.$li['id'].'-Supprimer la Chambre</button>'   ;                                
                                echo '
                                <button  data-toggle="modal" data-target="#modal_small" class="btn btn-primary btn-block chambre" id="chambre-'.$li['id'].'"><span class="fa fa-plus"></span>Ajouter une gouvernorat</button>
                                 </div> </div>
                            </div>' ;
                                }
                             
                ?>
                       
            </div>
         </div>
    </div>
</div>
<div id="dialog-confirm" style="display: none;" title="Suppression d'une gouvernorat">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Êtes-vous sûr de vouloir supprimer la gouvernorat</p>
</div>
<div id="dialog-confirm_ch"  style="display: none;"title="Suppression d'une chambre">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Êtes-vous sûr de vouloir supprimer la chambre</p>
</div>


<div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true" style="display: none;">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Ajouter une Gouvernorat</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" class="form-horizontal">
                                   
                                    
                                   

                                    <h5 class="push-up-20">Code De Gouvernorat</h5>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-lg">                                            
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control" id="code_gouv" placeholder="Code De Gouvernorat">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="push-up-20">Nom De Gouvernorat</h5>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-lg">                                            
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control" id="nom_gouv" placeholder="Nom De Gouvernorat">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <div class="modal-footer">
                        <button type="button" id="add-gouv" class="btn btn-primary btn-block" data-dismiss="modal">Ajouter</button>                        
                    </div>
                </div>
            </div>
        </div>