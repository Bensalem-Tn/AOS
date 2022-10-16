<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">TRANSFERT</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">AOS SYSTEME</a></li>
                                <li class="breadcrumb-item active">TRANSFERT</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <form class="needs-validation" id="formulaire">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <div class="mb-4">
                                                            <label class="form-label">ITEM : </label>
                                                            <select id="item"class="form-control js-example-basic-single ">
                                                              <?= $DATA['out_article'] ;?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">PROJECT : </label>
                                                            <select id="project" class="form-control js-example-basic-single">
                                                              
                                                              <?= $DATA['out_project'] ;?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">DATE TRANSFERT :</label>
                                                            <div class="input-group" id="datepicker">
                                                                    <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container='#datepicker' data-provide="datepicker">
                                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label for="qte" class="form-label">QTE : </label>
                                                            <input type="text" class="form-control " id="qte" placeholder="QTE"  required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-4 mt-lg-0">
                                                        <div class="mb-4">
                                                            <label class="form-label">REQUESTED BY : </label>
                                                            <select id="requested"class="form-control js-example-basic-single">
                                                            <option value="0" selected="selected">CHOOSE A PROJECT</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">RECEIPT BY : </label>
                                                            <select id="receipt" class="form-control js-example-basic-single">
                                                            <option value="0" selected="selected">CHOOSE A PROJECT</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">APPROUVED BY : </label>
                                                            <select id="approved" class="form-control js-example-basic-single">
                                                            <option value="0" selected="selected">CHOOSE A PROJECT</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-4">
                                                        <label for="btnAdd" class="form-label"></label>
                                                        <div class="input-group  d-grid ">
                                                            <button class="btn btn-primary btn-lg waves-effect" id="btnAdd" type="submit">TRANSFER</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>