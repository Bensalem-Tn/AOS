        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="<?= Utils::generateLink('assets/images/layouts/layout-1.jpg'); ?>" class="img-fluid img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="<?= Utils::generateLink('assets/images/layouts/layout-2.jpg'); ?>" class="img-fluid img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="<?= Utils::generateLink('assets/css/bootstrap-dark.min.css'); ?>" data-appStyle="<?= Utils::generateLink('assets/css/bootstrap-dark.min.css'); ?>">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="<?= Utils::generateLink('assets/images/layouts/layout-3.jpg'); ?>" class="img-fluid img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="<?= Utils::generateLink('assets/css/app-rtl.min.css'); ?>">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?= Utils::generateLink('assets/libs/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/metismenu/metisMenu.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/simplebar/simplebar.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/node-waves/waves.min.js'); ?>"></script>

        
       
      
        <!-- Required datatable js -->
       
        
        
        <!-- Responsive examples -->
       
        
        <script src="<?= Utils::generateLink('assets/libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/jquery-tabledit/jquery.tabledit.min.js'); ?>"></script>
        <!-- Buttons examples -->
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/jszip/jszip.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/pdfmake/build/pdfmake.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/pdfmake/build/vfs_fonts.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js'); ?>"></script>

        <script src="<?= Utils::generateLink('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-select/js/dataTables.select.min.js'); ?>"></script>
        
        <!-- Responsive examples -->
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'); ?>"></script>
        <script src="<?= Utils::generateLink('assets/libs/parsleyjs/parsley.min.js'); ?>"></script>

        <script src="<?= Utils::generateLink('assets/js/pages/form-validation.init.js'); ?>"></script>
         <!--<script src="assets/js/pages/dashboard.init.js"></script> -->
         <script src="<?= Utils::generateLink('assets/libs/select2/js/select2.min.js'); ?>"></script>
         <script src="<?= Utils::generateLink('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

        <!-- App js -->
        <script src="<?= Utils::generateLink('assets/js/app.js'); ?>"></script>
        <?php if (isset($DATA['JAVASCRIPT_MODULE'])): ?>
	<script src="<?= Utils::generateLink($DATA['JAVASCRIPT_MODULE']); ?>"></script>
	<?php endif; ?>
    </body>

</html>