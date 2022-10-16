<?php  //var_dump (Crypto::sha512('bensalem.amine', true));?>
<div class="row"><div class="col-md-12">
                            
                            
                            <div class="panel panel-default">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><strong>GESTION DES UTILISATEURS</strong></h3>
                                   
                                   
                                </div>
								
                                <div class="panel-body">                                                                        
							        <table width="100%" class="table table-bordered" cellspacing="0" id="user_table">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Login</th>
                                                <th>E-mail</th>    
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Login</th>
                                                <th>E-mail</th>    
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                <button   dir="ltr" id="btnNouveau" type="button" class="btn btn-primary btn-block" data-toggle="modal"  ><i class="fa fa-plus">  Ajouter Un Nouveau Utilisateur </i></button>
                                </div>   
                               
                            </div>
                           
                            
                        </div>
                    </div>


<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"></h6>
            </div>
        <form id="formulaire">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Login:</label>
                            <input type="text" class="form-control" id="login">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">E-mail</label>
                            <input type="text" class="form-control" id="email">
                        </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Nom</label>
                            <input type="text" class="form-control" id="first_name">
                        </div>               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Prénom</label>
                            <input type="text" class="form-control" id="last_name">
                        </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="col-form-label">Role</label>
                            <select class="form-control" id="role">
                            <option value="user">User</option>   
                            <option value="admin">Admin</option>
                            </select>
                        </div>               
                    </div>
                   
                </div>         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                <button type="submit" id="btnAdd" class="btn btn-primary">Ajouter</button>
            </div>
        </form>    
        </div>
    </div>
</div>  