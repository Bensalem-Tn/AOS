<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 id="step-text"></h1>
			</div>
			<div class="panel-body">
				<div class="row setup-content" id="step-1">
					<div class="col-xs-12">
						<div class="col-md-12 well">
							<div class="form-group">
                            	<label for="" class="col-form-label">La gestion à insérer</label>
                            	<input type="number"   min="2010" max="2040" placeholder="2021" class="form-control" id="gestion">
                        	</div>               
                    		<button id="activate-step-1" class="btn btn-primary btn-block">Suivant</button>
						</div>
					</div>
				</div>
			<?php  $tab =array (1=>'',2=>'min_dep_nomenclature',3=>'min_dep_credit',4=>'min_engagement',5=>'min_facture',6=>'min_facture_ordonnance',7=>'min_commande',8=>'min_paiement',9=>'min_avenant',10=>'min_ligne_avenant',11=>'min_marche',12=>'min_arrets') ;
				for($i=1;$i<=12; $i++){
								echo '
				<div class="row setup-content" id="step-'.$i.'">
					<div class="col-xs-12">
						<div class="col-md-12 well">
							<form id="import_xml">
								<div class="form-group">
                                	<div class="progress" id="progress">
                                    	<div  id="progress-'.$i.'"class="progress-bar progress-bar-primary file-progress" role="progressbar" style="width:0%">0%</div>
                                	</div>
								</div>
								<div class="form-group">
								    <label> Vous devez choisir le(s)  fichier(s) à insérer (le repertoire doit étre : data/central/'.$tab[$i].'/ </label>
									<p id="gestion-text"></p>
								    <input type="file" name="xml_data" id="xml_data-'.$i.'" multiple="multiple"  required />
								</div>
                                <br>
								<div class="form-group">
								    <button type="button"name="btn-submit" id="btn-submit-'.$i.'"   class="btn btn-success btn-block insert" >insérer</button>
								</div>
							</form>             
                    		<button id="activate-step-'.$i.'" class="btn btn-primary btn-block btn-suiv">Suivant</button>
						</div>
					</div>
				</div>' ;}
			?>
			<div class="row setup-content" id="step-13">
					<div class="col-xs-12">
						<div class="col-md-12 well">
							<button id="activate-step-13" class="btn btn-primary btn-block">Finaliser L'insertion</button>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row form-group">
					<div class="col-xs-12">
						<ul class="nav nav-pills nav-justified thumbnail setup-panel">
							<li class="active">
									<a href="#step-1">
										<h4 class="list-group-item-heading">1</h4>
									</a>
							</li>
							<?php  
							 
							 for($i=2;$i<=12; $i++){
								echo '<li class="disabled">
											<a href="#step-'.$i.'">
												<h4 class="list-group-item-heading">'.$i.'</h4>
											</a>
									</li>' ;}?>
								
							<li>
									<a href="#step-13">
										<h4 class="list-group-item-heading">13</h4>
									</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>	
</div>
<div class="row">
	
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
                <div class="panel-title-box" >
                    <h2 id='indicateurs'> console </h2>
                </div>                                    
                    <ul  dir="ltr"class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul> 
            </div>
			<div class="col-md-12">
                <div  class="panel panel-danger">
					<div    class="panel-body  scrollable-panel">
		                <ul  class="list-group" id="liste" >
                                       
		                </ul>                                
                    </div>
                </div>
            </div>	
        </div>
	</div>
	
</div>

<div id="dialog-confirm" style="display: none;" title="Données existe déja">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Les données de cette table existe déja .Voulez vous contunier</p>
</div>