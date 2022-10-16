<div class="row"><section class="container">
			<div class="form-group custom-input-space has-feedback">
            <div class="page-heading">
					<h3 class="post-title">             </h3>
				</div>
				<div class="page-body clearfix">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading">Insertion des données de la table : <b id="tbl_name"></b>  </div>
								<div class="panel-body">
									
									<div class="form-group">
                                    <div class="progress" id="progress">
                                    <div class="progress-bar progress-bar-primary file-progress" role="progressbar" style="width:0%">0%</div>
                                    </div>

				                        <div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
											<i class="fa fa-fw fa-check-circle"></i>
											<strong> Success ! </strong> <span class="success-message"> </span>
										</div>
										<div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
											<i class="fa fa-fw fa-times-circle"></i>
											<strong> Note !</strong> <span class="warning-message"> </span>
										</div>

				                    </div>

									<form id="import_xml">
								      <div class="form-group">
								       <label>CHoisir le  fichier de départ XML (le fichier doit étre placé sous le repertoire /data/<b id="base">comune</b>/<b id='titre'>dep_nomenclature</b>/%GESTION% ) </label>
								       <input type="file" name="xml_data" id="xml_data" multiple="multiple"  required />
								      </div>
                                      <br />
                                      <div class="form-group">
								       <label>GESTION  </label>
								       <input type="number" name="nbr_file" id="nbr_file"  required />
								      </div>
								      <br />
								      <div class="form-group">
								       <button type="button"name="btn-submit" id="btn-submit"   class="btn btn-success btn-block" >insérer</button>
								      </div>
								     </form>

								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</section>
                    </div>

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