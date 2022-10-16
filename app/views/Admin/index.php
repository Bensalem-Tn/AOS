<?//s=var_dump($DATA) ;?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-primary">
		    <div class="panel-heading">
                <div class="panel-title-box" >
                    <h2 id='indicateurs'> TABLES </h2>
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
	            <div    class="panel-body  scrollable-panel" >
                    <table class="table ">
                        <thead>
                            <tr>
                                <th width="60%">Table</th>
                                <th width="40%">Taille</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            foreach($DATA['centrals'] as $central)
                            {
                                echo "
                                <tr>
                                    <td><a href='".Utils::generateLink('admin/table_info/'.$central)."'><strong>".$central."</strong></a></td>
                                    
                                    <td><span class='label label-danger get'id='".$central."'>".number_format(intval($DATA[$central]))."&nbsp;<i  class='fa fa-refresh' ></i></span></td>
                                   
                                </tr>
                                
                                ";
                            }
                            ?>
                           
                        </tbody>
                    </table>                                                      
                </div>
            </div>
        </div>	
        <div class="col-md-3">
            <div  class="panel panel-success">
                <div class="panel-heading">
					<h4 class="panel-title-box">REGIONS</h4>
				</div>
            <div    class="panel-body  scrollable-panel" >
                <table class="table ">
                        <thead>
                            <tr>
                                <th width="70%">Table</th>
                                <th width="30%">Taille</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  
                            foreach($DATA['regions'] as $region)
                            {
                                echo "
                                <tr>
                                    <td><a href='".Utils::generateLink('admin/table_info/'.$region)."'><strong>".$region."</strong></a></td>
                                    <td><span class='label label-success get'id='".$region."'>".number_format(intval($DATA[$region]))."&nbsp;<i  class='fa fa-refresh' ></i></span></td>
                                </tr>
                                
                                ";
                            }
                            ?>
                        </tbody>
                    </table>                                                     
                </div>
            </div>
        </div>
		<div class="col-md-3">
            <div  class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title-box">COMMUNES</h4>
                </div>
            <div class="panel-body  scrollable-panel" >
                <table class="table ">
                    <thead>
                        <tr>
                            <th width="70%">Table</th>
                            <th width="30%">Taille</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($DATA['communes'] as $commune)
                            {
                                echo "
                                <tr>
                                    <td><a href='".Utils::generateLink('admin/table_info/'.$commune)."'><strong>".$commune."</strong></a></td>
                                    <td><span class='label label-info get'id='".$commune."'>".number_format(intval($DATA[$commune]))."&nbsp;<i  class='fa fa-refresh' ></i></span></td>
                                </tr>
                                
                                ";
                            }
                            ?>
                    </tbody>
                </table>                              
            </div>
        </div>
        </div>
        <div class="col-md-3">
        <div  class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title-box">EPA</h4>
            </div>
            <div    class="panel-body  scrollable-panel" >
                <table class="table ">
                    <thead>
                        <tr>
                            <th width="70%">Table</th>
                            <th width="30%">Taille</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($DATA['epas'] as $epa)
                            {
                                echo "
                                <tr>
                                    <td><a href='".Utils::generateLink('admin/table_info/'.$epa)."'><strong>".$epa."</strong></a></td>
                                    <td><span class='label label-primary get'id='".$epa."'>".number_format(intval($DATA[$epa]))."&nbsp;<i  class='fa fa-refresh' ></i></span></td>
                                </tr>
                                
                                ";
                            }
                            ?>
                    </tbody>
                    </table>                        
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
                    <h2 id='indicateurs'> GESTIONS </h2>
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
	            <div    class="panel-body  scrollable-panel" >
                    <table class="table ">
                        <thead>
                            <tr>
                                <th width="70%">Table</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                           foreach($DATA['ges_centrals'] as $li)
                           {
                                echo "
                                <tr>
                                <td><a href='#'><strong>".$li['GESTION']."</strong></a></td>
                           </tr>
                                ";
                           } ?>
                            
                        </tbody>
                    </table>                                                      
                </div>
            </div>
        </div>	
        <div class="col-md-3">
            <div  class="panel panel-success">
                <div class="panel-heading">
					<h4 class="panel-title-box">REGIONS</h4>
				</div>
            <div    class="panel-body  scrollable-panel">
            <table class="table ">
                        <thead>
                            <tr>
                                <th >Table</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                           foreach($DATA['ges_regions'] as $li)
                           {
                                echo "
                                <tr>
                                <td><a href='#'><strong>".$li['GESTION']."</strong></a></td>
                           </tr>
                                ";
                           } ?>
                        </tbody>
                    </table>                                                     
                </div>
            </div>
        </div>
		<div class="col-md-3">
            <div  class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title-box">COMMUNES</h4>
                </div>
            <div class="panel-body  scrollable-panel">
            <table class="table">
                        <thead>
                            <tr>
                                <th>Table</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                           foreach($DATA['ges_communes'] as $li)
                           {
                                echo "
                                <tr>
                                <td><a href='#'><strong>".$li['GESTION']."</strong></a></td>
                           </tr>
                                ";
                           } ?>
                        </tbody>
                    </table>                        
            </div>
        </div>
        </div>
        <div class="col-md-3">
        <div  class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title-box">EPA</h4>
            </div>
            <div    class="panel-body  scrollable-panel">
            <table class="table ">
                        <thead>
                            <tr>
                                <th>Table</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                           foreach($DATA['ges_epas'] as $li)
                           {
                                echo "
                                <tr>
                                <td><a href='#'><strong>".$li['GESTION']."</strong></a></td>
                           </tr>
                                ";
                           } ?>                        </tbody>
                    </table>                      
                </div>
            </div>
        </div>	
    </div>
</div>




</div>