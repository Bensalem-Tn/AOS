
</div>
 <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    
                    <div class="mb-footer">
                        <div class="pull-left">
                            <a href="<?= Utils::generateLink('adminlogout'); ?>" class="btn btn-success btn-lg">خروج</a>
                            <button class="btn btn-default btn-lg mb-control-close">إلغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?= Utils::generateLink('assets/audio/alert.mp3'); ?>" preload="auto"></audio>
        <audio id="audio-fail" src="<?= Utils::generateLink('assets/audio/fail.mp3'); ?>" preload="auto"></audio>
        <!-- END PRELOADS -->  
		
		<script type="text/javascript" src="<?= Utils::generateLink('assets/js/plugins/jquery/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= Utils::generateLink('assets/js/plugins/jquery/jquery-ui.js'); ?>"></script>
        <script type="text/javascript" src="<?= Utils::generateLink('assets/js/plugins/bootstrap/bootstrap.min.js'); ?>"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?= Utils::generateLink('assets/js/plugins/icheck/icheck.min.js'); ?>'></script>        
        <script type="text/javascript" src="<?= Utils::generateLink('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= Utils::generateLink('assets/js/plugins/scrolltotop/scrolltopcontrol.js'); ?>"></script>
        
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script src="<?= Utils::generateLink('assets/js/bootstrap-select.js'); ?>"></script>
      <!---  <script type="text/javascript" src="<?= Utils::generateLink('assets/js/settings.js'); ?>"></script>-->
        <script type="text/javascript" src="<?= Utils::generateLink('assets/js/plugins.js'); ?>"></script>        
        <script type="text/javascript" src="<?= Utils::generateLink('assets/js/actions.js'); ?>"></script>
		<script type="text/javascript" src="<?= Utils::generateLink('assets/js/canvasjs.min.js'); ?>"></script>
        
        <!--<script type="text/javascript" src="js/demo_dashboard.js"></script>-->
		
<script src="<?= Utils::generateLink('assets/js/jquery.dataTables.js'); ?>"></script>


<script src="<?= Utils::generateLink('assets/js/bootstrap-editable.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/dataTables.responsive.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/dataTables.select.min.js'); ?>"></script>

<!----- EXPORT---->
<script src="<?= Utils::generateLink('assets/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/buttons.flash.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/jszip.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/pdfMake/pdfmake.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/pdfMake/vfs_fonts.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/buttons.print.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/dataTables.select.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/dataTables.editor.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/select2.min.js'); ?>"></script>

<script type="text/javascript" src="<?= Utils::generateLink('assets/js/plugins/rangeslider/jQAllRangeSliders-min.js'); ?>"></script>       


<script type="text/javascript" src="<?= Utils::generateLink('assets/js/busy-load.js'); ?>"></script>
<script>
        pdfMake.fonts = {
            Roboto: {
                normal: 'Roboto-Regular.ttf',
                bold: 'Roboto-Regular.ttf',
                italics: 'Roboto-Regular.ttf',
                bolditalics: 'Roboto-Regular.ttf'
            },
            Amiri: {
                normal: 'Amiri-Regular.ttf',
                bold: 'Amiri-Regular.ttf',
                italics: 'Amiri-Regular.ttf',
                bolditalics: 'Amiri-Regular.ttf'
            }
        };
    </script>
    <script>
        x=window.location.pathname.split("/") ;
        ch=x[3] ;

        var v = document.getElementById(ch);
         if(v)   v.className += "active"; 

    </script>
 
<?php if (isset($DATA['JAVASCRIPT_MODULE'])): ?>
	<script src="<?= Utils::generateLink($DATA['JAVASCRIPT_MODULE']); ?>"></script>
	<?php endif; ?>
</body>

</html>
