<!DOCTYPE html>
<html>
    <?php  //echo Crypto::sha512('admin', true);?>
<head>
	<title> Accès sur l'interface Administrateur de Tathmine</title>
	<link rel="stylesheet" href="<?= Utils::generateLink('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= Utils::generateLink('assets/css/all.css'); ?>">
	<link rel="icon" href="<?= Utils::generateLink('assets/favicon.ico'); ?>">
<style>
	body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #f5f5f5 url('<?= Utils::generateLink('assets/img/bg.png'); ?>') left top repeat;
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #1A2026;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			background: #f5f5f5 url('<?= Utils::generateLink('assets/img/bg.png'); ?>') left top repeat;;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
		 
			height: 150px;
			width: 150px;
			border-radius: 50%;
			background: #1A2026;
			border: 0px solid green;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #1CAF9A !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
		    
			background: #1CAF9A !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
		h3{
			color : #1CAF9A
		}

</style>
</head>
<body>
<?php if (isset($DATA['message'])): ?>
<?= '<br><div class="alert alert-info" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.
Security::escape($DATA['message']).'                                
                            </div>'; ?>
	<?php endif; ?>
	<div class="container h-100">
		
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?= Utils::generateLink('assets/img/logo.png'); ?>" class="brand_logo" alt="Logo">
					</div>
				</div>
				
				<div class="d-flex justify-content-center form_container">
					<form method="POST">
					<h3 > ADMINISTRATION </h3>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div>
							<input type="text" name="login" class="form-control input_user" dir='rtl' value="" placeholder="إسم المستخدم">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass"  dir='rtl'value="" placeholder="كلمة السر">
						</div>
				<div class="d-flex justify-content-center mt-3 login_container">
					<button type="submit" name="button" class="btn login_btn">دخول</button>
				</div>		
				</form>	
				</div>
				
				
			</div>
		</div>
	</div>
</body>
	<script src="<?= Utils::generateLink('assets/js/jquery.js'); ?>"></script>
</html>