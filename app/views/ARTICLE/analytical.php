
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">ANALYTICALS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">AOS SYSTEME</a></li>
                                <li class="breadcrumb-item active">ITEMS</li>
                                <li class="breadcrumb-item active">ANALYTICALS</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                        <form class="needs-validation" id="formulaire" >
                                            <div class="row">
                                               <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="article_name" class="form-label">PARTIAL</label>
                                                        <select class="form-select" id="partial" required>
                                                           
                                                           <?= $DATA['out_partial']?>
                                                           </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="article_name" class="form-label">LABEL ANALYTICAL</label>
                                                        <input type="text" class="form-control" id="libelle_analytical"
                                                            placeholder="LABEL ANALYTICAL"  required>
                                                        <div class="valid-feedback">
                                                           YES!
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="btnAdd" class="form-label"></label>
                                                        <div class="input-group d-grid ">
                                                            <button class="btn btn-primary btn-lg waves-effect" id="btnAdd" type="submit">ADD ANALYTICIAL</button>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                        </form>
                    </div>
                </div>

            </div>
           
            <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">ALL ANALYTICALS</h4>
                                        <p class="card-title-desc">
                                        </p>
        
                                        <table id="artilce_table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                           
                                                <th>ID ANALYTICAL</th>
                                                <th> LABEL PARTIAL</th>
                                                <th> LABEL ANALYTICAL</th>
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

           
                                        