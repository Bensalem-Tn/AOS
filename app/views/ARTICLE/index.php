
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">ITEMS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">AOS SYSTEME</a></li>
                                <li class="breadcrumb-item active">ITEMS</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="d-grid mb-3">
                                                <button type="button"  id="btnNouveau" class="btn btn-primary btn-lg waves-effect waves-light"  data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen"></i> ADD NEW ITEM</button>
                                </div>
                       
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">ALL ITEMS</h4>
                                        <p class="card-title-desc">
                                        </p>
        
                                        <table id="artilce_table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                           
                                                <th>ID</th>
                                                <th>CODE</th>
                                                <th>NAME</th>
                                                <th>PARTIAL</th>
                                                <th>ANALYTICAL</th>
                                                 <th>AMOUNT</th>
                                                <th>UNIT</th>
                                                <th>UNIT OF MOVEMENT</th>
                                                <th>LOCATION</th>
                                               <th>STATE</th>
                                               
                                               
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
            </div>
           
        </div>
    </div>
</div>

            <div id="modalCRUD" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreen" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Fullscreen Modal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" id="formulaire" enctype="multipart/form-data" >
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3"> 
                                                        <label for="article_code" class="form-label">CODE</label>
                                                        <input type="text" class="form-control" id="article_code" placeholder="eg:A006525"  required>
                                                        <div class="valid-feedback">
                                                            YES!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="article_name" class="form-label">ITEM NAME</label>
                                                        <input type="text" class="form-control" id="article_name"
                                                            placeholder="ITEM NAME"  required>
                                                        <div class="valid-feedback">
                                                           YES!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="partial" class="form-label">PARTIAL</label>
                                                        <select class="form-select" id="partial" required>
                                                           
                                                        <?= $DATA['out_partial']?>
                                                        </select>
                                                        
        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="analytical" class="form-label">ANALYTICAL</label>
                                                        <select class="form-select" id="analytical" required>
                                                        <option selected value="1">_______________</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="qte" class="form-label">QTE</label>
                                                        <input type="text" class="form-control" id="qte"
                                                            placeholder="QUANTITE"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="unit" class="form-label">UNIT</label>
                                                        <select class="form-select" id="unit" required>
                                                        <?= $DATA['out_unit']?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="unit_mouv" class="form-label">UNIT OF MOUVEMENT</label>
                                                        <select class="form-select" id="unit_mouv" required>
                                                        <?= $DATA['out_unit_mouv']?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="location" class="form-label">LOCATION</label>
                                                        <select class="form-select" id="location" required>
                                                        <?= $DATA['out_location']?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="state" class="form-label">STATE</label>
                                                        <select class="form-select" id="state" required>
                                                          <?= $DATA['out_state']?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            
                                            </div>
                                            <div class="row">
                                            <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="file1" class="form-label" >PHOTO</label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" accept="image/*" name="file1" id="file1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="file2" class="form-label">USER GUIDE</label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control"  accept="image/*"  name="file2" id="file2">
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                             
                                            <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="btnAdd" class="form-label"></label>
                                                        <div class="input-group  d-grid ">
                                                            <button class="btn btn-primary btn-lg waves-effect" id="btnAdd" type="submit">Add Item</button>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            <div class="col-md-1">
                                                    <div class="mb-3">
                                                    <label for="validationCustom05" class="form-label"></label>
                                                        <div class="input-group  d-grid ">
                                                                <button type="button" class="btn btn-lg btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                            </div>           
                                                
                                                
                                               
                                            </div>
                                                </div>
                                               
                                            </div>
                                            
                                            <div>
                                              
                                            </div>
                        </form>                      
                            <div >
                            <p  id="console" class="card-title-desc">
                                        </p>
                            </div>
                    </div>
                       
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
                                        