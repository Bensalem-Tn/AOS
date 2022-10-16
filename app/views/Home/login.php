<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?= Utils::generateLink('assets/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= Utils::generateLink('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= Utils::generateLink('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
    <?php if (isset($DATA['message'])): ?>
<?= '<br><div class="alert alert-info" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.
Security::escape($DATA['message']).'                                
                            </div>'; ?>
	<?php endif; ?>
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
							
                            <div class="mb-3">
							AOS SYSTEME
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>
    
                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST">
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input  name="login" class="form-control" type="text" required="" placeholder="Username">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input   name="password" class="form-control" type="password" required="" placeholder="Password">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                         <!--     <input type="checkbox" class="custom-control-input" id="customCheck1">
                                          <label class="form-label ms-1" for="customCheck1">Remember me</label>-->
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
    
                                <div class="form-group mb-0 row mt-2">
                                   
                                   
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="<?= Utils::generateLink('assets/libs/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/metismenu/metisMenu.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/simplebar/simplebar.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/node-waves/waves.min.js'); ?>"></script>

        <script src="<?= Utils::generateLink('assets/js/app.js'); ?>"></script>

    </body>
</html>
