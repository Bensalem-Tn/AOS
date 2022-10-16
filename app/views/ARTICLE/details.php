
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">DETAILS</h4>

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          
                            <div class="invoice-title ">
                                <h4 class="float-end font-size-16 pe-5"><strong><?= $DATA['item'][0]['code'] ;?></strong></h4>
                                <h3 class="ps-5">
                                    <img src="<?= Utils::generateLink('assets/images/uploads/'.$DATA['item'][0]['photo']); ?>" alt="logo" height="24"/>
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 ps-5">
                                    <strong><?= $DATA['item'][0]['description'] ;?></strong><br>
                                    <?= " PARIAL : ".$DATA['item'][0]['libelle_partial'] ;?><br>
                                    <?="ANALYTICAL : ".$DATA['item'][0]['libelle_analytical'] ;?><br>
                                </div>
                                    <div class="col-6 text-end pe-5">
                                                   
                                        <strong>CARACTÉRISTIQUES</strong><br>
                                        <?= $DATA['item'][0]['libelle_location'] ;?><br>
                                        <?= $DATA['item'][0]['libelle_unit'] ;?><br>
                                        <?= $DATA['item'][0]['libelle_unit_mouv'] ;?>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-6 ">
                                                  
                                        <strong class="ms-5">STATE</strong><br>
                                        <strong class="ms-5"><?= $DATA['item'][0]['libelle_state'] ;?></strong>
                                        <br>
                                </div>
                                <div class="col-6 mt-4 text-end">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>QTE</strong>
                                                    </td>
                                                    <td class="no-line text-end"><h4 class="me-4"><?=$DATA['item'][0]['qte'] ;?></h4></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="card-title">Responsive images</h4>
                                            <p class="card-title-desc">Images in Bootstrap are made responsive
                                                with <code class="highlighter-rouge">.img-fluid</code>. <code class="highlighter-rouge">max-width: 100%;</code> and <code class="highlighter-rouge">height: auto;</code> are applied to
                                                the image so that it scales with the parent element.</p>
            
                                            <div class="">
                                            <img src="<?= Utils::generateLink('assets/images/uploads/'.$DATA['item'][0]['photo']); ?>" class="img-fluid" alt="Responsive image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="card-title">Responsive images</h4>
                                            <p class="card-title-desc">Images in Bootstrap are made responsive
                                                with <code class="highlighter-rouge">.img-fluid</code>. <code class="highlighter-rouge">max-width: 100%;</code> and <code class="highlighter-rouge">height: auto;</code> are applied to
                                                the image so that it scales with the parent element.</p>
            
                                            <div class="">
                                            <img src="<?= Utils::generateLink('assets/images/uploads/'.$DATA['item'][0]['photo_technique']); ?>" class="img-fluid" alt="Responsive image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                           
                               
                            <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="">
                                                <div class="d-print-none">
                                                    <div class="float-end">
                                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light">PRINT<i class="fa fa-print"></i></a>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                    </div>
                            </div>
                           
                        </div> <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>


            
                                        