<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><strong>Vider le cache </strong></h3>
                    <ul  dir="ltr"class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul> 
                </div>
				<div class="panel-body">                                                                        
					
                    <div class="row">
                       <div class="col-xs-12">
						<div class="col-md-12 well">
							
                        <label for="" class="col-form-label">Choisir la composante : </label>
                                <select class="form-control" id="vider_composante">
                                <option value='central'>Central</option>
                                        <option value='commune'> Commune</option>
                                        <option value='region'>Région</option>
                                        <option value='epa'>EPA</option>       
                               
                                </select>
                                <br>
                            <button id="vider" class="btn btn-primary btn-block">Vider</button>
						</div>
					</div>
                       
                                            </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><strong>Préchargement des pages</strong></h3>
                    <ul  dir="ltr"class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul> 
                </div>
				<div class="panel-body">                                                                        
					<div class="progress" id="progress">
                        <div class="progress-bar progress-bar-primary file-progress" role="progressbar" style="width:0%">chargement...  0%</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Composante</label>
                                <div class="col-md-9">                                                                                            
                                    <select class="form-control" id="composante">
                                    <option value='1'>Central</option>
                                        <option value='2'> Commune</option>
                                        <option value='3'>Région</option>
                                        <option value='4'>EPA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">URL</label>
                                <div class="col-md-9">                                            
                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-chain"></span></span>
                                                        <input type="text" class="form-control" required id="url">
                                    </div>                                            
                                                    <span class="help-block">ex : localhost/tathmine</span>
                                </div>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">                                        
								<label class="col-md-3 control-label">Gestion</label>
                                    <div class="col-md-9">                                                                                            
                                        <select class="form-control" id="gestions">
                                            <?=$DATA['gestions'] ;?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">                                        
                                <label class="col-md-3 control-label">temps de chargement</label>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
                                                        <input type="number" required class="form-control" id="time">
                                    </div>            
                                    <span class="help-block">temps de chargement de chaque page en seconde</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">        
                            <br>                        
                            <div class="form-group">
								<button type="button"name="btn-submit" id="btn-submit"   class="btn btn-primary btn-block" >Charger</button>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">    
    <div class="col-md-12">
	    <div class="panel panel-primary">
			<div class="panel-heading">
                <div class="panel-title-box" >
                    <h2 id='indicateurs'> Console <button type="button" id="vider"   class="btn btn-danger" >vider</button> </h2>
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