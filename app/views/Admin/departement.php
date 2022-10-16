<div class="row">  
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box" >
                        <h3>Choisir la gestion</h3>
                </div>                                    
            </div>
            <div class="panel-body">                                                                        
               <form class="form-horizontal" method="POST">
                        <div class="col-md-9">
                            <div class="form-group">
                                <select class="form-control"  id="ges" title="السنة">
                                                <?= $DATA['gestions']?>
                            </div>
                        </div>
                       <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block"id="choisir">Choisir</button>
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
                    <h2 id='indicateurs'>Répartition des chapitres selon la loi des finanaces</h2>
                </div>                                    
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul> 
            </div>
            <div class="panel-body"id="p-body">
				<?php
                    foreach($DATA['data'] as $li)
                            { // var_dump($li) ;
                                $ch=$li[0]['LF_LIBELLE'].' : '.$li[0]['LF'] ;
                                if($li[0]['LF_LIBELLE']=='')
                                $ch='  الباب :  '.$li[0]['LF'].'   من قانون المالية  ' ;
                               echo '
                                <div  id="'.$li[0]['id'].'"class="col-md-3">
                            <div  class="panel panel-primary">
                                <div class="panel-heading">
                                    <h5><a id="chsortable'.$li[0]['LF'].'" href="#" data-type="text" data-pk="'.$li[0]['LF'].'" data-name="'.$li[0]['LF'].'" class="panel-title-box editable-dept edit">'.$ch.'</a></h5>
                                  </div>
                                <div    class="panel-body">
                                    <ul id="sortable'.$li[0]['id'].'" class="sortable_list connectedSortable">';
                                foreach($li as $l)
                                { 
                                    
                                    echo '  <li class="ui-state-default">'.$l['DEPARTEMENT'].' - '.$l['LIBELLE'].'</li>' ;
                                }
                                   echo ' </ul>
                                    </div>
                                   </div>
                            </div>' ;
                                }
                             
                ?>
                       
            </div>
         </div>
    </div>
</div>
