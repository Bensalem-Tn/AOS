<div class="col-md-12">
    <div class="panel panel-primary">
		<div class="panel-heading">
            <div class="panel-title-box" >
                <h2 id='indicateurs'> INSERTION DES DONNÉES </h2>
            </div>                                    
            <ul class="panel-controls">
                 <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
            </ul> 
        </div>
		<div class="col-md-3">
            <div  class="panel panel-danger">
	            <div class="panel-heading">
		            <h4 class="panel-title-box">CENTRAL</h4>
                </div>
	            <div    class="panel-body  scrollable-panel" id="central">
		            <ul  class="list-group " >
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_dep_nomenclature'); ?>"><strong>min_dep_nomenclature</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_dep_credit'); ?>"><strong>min_dep_credit</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_engagement'); ?>"><strong>min_engagement</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_facture'); ?>"><strong>min_facture</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_facture_ordonnance'); ?>"><strong>min_facture_ordonnance</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_commande'); ?>"><strong>min_commande</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_paiement'); ?>"><strong>min_paiement</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_avenant'); ?>"><strong>min_avenant</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_ligne_avenant'); ?>"><strong>min_ligne_avenant</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_marche'); ?>"><strong>min_marche</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-danger btn-block" href="<?= Utils::generateLink('admin/central/min_arrets'); ?>"><strong>min_arrets</strong></a></li></div>
		            </ul>  
                </div>
            </div>
        </div>	
        <div class="col-md-3">
            <div  class="panel panel-success">
                <div class="panel-heading">
					<h4 class="panel-title-box">REGIONS</h4>
				</div>
                <div    class="panel-body  scrollable-panel" id="region">
                    <ul  class="list-group " >
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_dep_nomenclature'); ?>"><strong>reg_dep_nomenclature</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_dep_credit'); ?>"><strong>reg_dep_credit</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_engagement'); ?>"><strong>reg_engagement</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_facture'); ?>"><strong>reg_facture</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_facture_ordonnance'); ?>"><strong>reg_facture_ordonnance</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_commande'); ?>"><strong>reg_commande</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block" href="<?= Utils::generateLink('admin/region/reg_paiement'); ?>"><strong>reg_paiement</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_avenant'); ?>"><strong>reg_avenant</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_ligne_avenant'); ?>"><strong>reg_ligne_avenant</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_rec_nomenclature'); ?>"><strong>reg_rec_nomenclature</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_rec_credit'); ?>"><strong>reg_rec_credit</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-block"href="<?= Utils::generateLink('admin/region/reg_marche'); ?>"><strong>reg_marche</strong></a></li></div>
                    </ul>                                
                </div>
            </div>
        </div>
		<div class="col-md-3">
            <div  class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title-box">COMMUNES</h4>
                </div>
                <div class="panel-body  scrollable-panel" id="engagement_decembre">
                    <ul  class="list-group ">
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_dep_nomenclature'); ?>"><strong>com_dep_nomenclature</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_dep_credit'); ?>"><strong>com_dep_credit</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_engagement'); ?>"><strong>com_engagement</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_facture'); ?>"><strong>com_facture</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_facture_ordonnance'); ?>"><strong>com_facture_ordonnance</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_commande'); ?>"><strong>com_commande</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_paiement'); ?>"><strong>com_paiement</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_avenant'); ?>"><strong>com_avenant</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_ligne_avenant'); ?>"><strong>com_ligne_avenant</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_rec_nomenclature'); ?>"><strong>com_rec_nomenclature</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_rec_credit'); ?>"><strong>com_rec_credit</strong></a></li></div>
                        <div class="form-group"><li><a class="btn btn-success btn-info btn-block"href="<?= Utils::generateLink('admin/commune/com_marche'); ?>"><strong>com_marche</strong></a></li></div>
                    </ul>                                
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div  class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title-box">EPA's</h4>
                </div>
                <div    class="panel-body  scrollable-panel" id="ordemi_ordpay">
                    <ul  class="list-group ">
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_dep_nomenclature'); ?>"><strong>epa_dep_nomenclature</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_dep_credit'); ?>"><strong>epa_dep_credit</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_engagement'); ?>"><strong>epa_engagement</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_facture'); ?>"><strong>epa_facture</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_facture_ordonnance'); ?>"><strong>epa_facture_ordonnance</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_commande'); ?>"><strong>epa_commande</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_paiement'); ?>"><strong>epa_paiement</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_avenant'); ?>"><strong>epa_avenant</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_ligne_avenant'); ?>"><strong>epa_ligne_avenant</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_rec_nomenclature'); ?>"><strong>epa_rec_nomenclature</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_rec_credit'); ?>"><strong>epa_rec_credit</strong></a></li></div>
                        <div class="form-group"><li><a class="btn  btn-primary btn-block"href="<?= Utils::generateLink('admin/epa/epa_marche'); ?>"><strong>epa_marche</strong></a></li></div>
                    </ul>                                
                </div>
            </div>
        </div>	
        <div    class="panel-footer">
            <div class="col-md-3">    
                <div class="form-group">                                        
                    <button type="button" id="delete-central" class="btn btn-danger btn-rounded btn-block">Élimination des lignes vides</button>
                    <button type="button" id="verif-central"  class="btn btn-danger btn-rounded btn-block">Vérification des champs de type DATE</button>
                </div>
            </div>
            <div class="col-md-3">    
                <div class="form-group">                                        
                    <button type="button" id="delete-region" class="btn btn-success btn-rounded btn-block">Élimination des lignes vides</button>
                    <button type="button" id="verif-region" class="btn btn-success btn-rounded btn-block">Vérification des champs de type DATE</button>
                </div>
            </div>
            <div class="col-md-3">    
                <div class="form-group">                                        
                    <button type="button" id="delete-commune" class="btn btn-info  btn-block btn-rounded">Élimination des lignes vides</button>
                    <button type="button"id="verif-commune" class="btn btn-info btn-rounded btn-block">Vérification des champs de type DATE</button>
                </div>
            </div>
            <div class="col-md-3">    
                <div class="form-group">                                        
                    <button type="button" id="delete-epa" class="btn btn-primary btn-block btn-rounded">Élimination des lignes vides</button>
                    <button type="button" id="verif-epa"  class="btn btn-primary btn-rounded btn-block">Vérification des champs de type DATE</button>
                </div>
            </div>
        </div>	 
    </div>
</div>


<div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box" >
                        <h3>Indexer les données d'une gestion</h3>
                </div>                                    
            </div>
            <div class="panel-body">                                                                        
                <div class="col-md-4">
                    <div class="form-group">
                                <select class="form-control" id="composante">
                                        <option value='1'>Central</option>
                                        <option value='2'> Commune</option>
                                        <option value='3'>Région</option>
                                        <option value='4'>EPA</option>
                                </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">                                        
                       <input type="number"   min="2010" max="2040" placeholder="2021" class="form-control" id="gestions">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                                    <button class="btn btn-primary btn-block"id="indexer">Indexer</button>
                    </div>
                </div>    
                
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box" >
                        <h3>Supprimer les données d'une gestion</h3>
                </div>                                    
            </div>
            <div class="panel-body">                                                                        
                <div class="col-md-4">
                    <div class="form-group">
                                <select class="form-control" id="del_composante">
                                        <option value='1'>Central</option>
                                        <option value='2'> Commune</option>
                                        <option value='3'>Région</option>
                                        <option value='4'>EPA</option>
                                </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">                                        
                       <input type="number"   min="2010" max="2040" placeholder="2021" class="form-control" id="del_gestions">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                                    <button class="btn btn-danger btn-block"id="supprimer">Supprimer</button>
                    </div>
                </div>    
                
            </div>
        </div>
    </div>

<button  id="bt" style="display: none;"class="btn btn-info mb-control" data-box="#message-box-sound-1"></button>
<div class="message-box animated fadeIn" data-sound="alert" id="message-box-sound-1">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title" id='mb-title'><span class="fa fa-check-circle"></span>Succès
                    </div>
                    <div class="mb-content">
                        <p id='content'></p>                    
                    </div>
                    <div class="mb-footer" id="mb-footer">
                        <button id='close-pop' class="btn btn-default btn-lg pull-right mb-control-close">Fermer</button>
                    </div>
                </div>
            </div>
        </div>