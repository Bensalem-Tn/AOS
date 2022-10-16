<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title> صفحة في طور الإنجاز</title>           
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?= Utils::generateLink('assets/css/theme-default.css'); ?>"/>
		<link rel="icon" href="<?= Utils::generateLink('assets/favicon.ico'); ?>">
        <!-- EOF CSS INCLUDE -->                    
     <style>img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
}
</style>	 
    </head>
    <body>

					
	
                
        </div>  
	
	<div class="error-container">
    <img src='<?= Utils::generateLink('assets/img/enconstruction.png'); ?>' class="img-responsive">
            <div class="error-text"> صفحة في طور الإنجاز</div>
            <!--<div class="error-subtext">للأسف ، نواجه مشكلة في تحميل الصفحة التي تبحث عنها. يرجى الانتظار قليلاً وإعادة المحاولة أو استخدام الإجراء أدناه.</div>-->
            <div class="error-actions">                                
                <div class="row">
                  <!--  <div class="col-md-6">
                        <button class="btn btn-info btn-block btn-lg" onClick="document.location.href = '<?php Utils::generateLink('');?>';">العودة إلى الصفحة الرئيسية</button>
                    </div>-->
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">الصفحة السابقة</button>
                    </div>
                </div>                                
            </div>
           
        </div>       
			         
    </body>
</html>
