<?php require "config/koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/form/css/main.css">
	<link rel="stylesheet" href="assets/style/styles.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/form/images/bg_form2.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="index.php?bettakuu=login" method="post">

					<span class="login100-form-title p-b-34 p-t-27">
						<a class="navbar-brand" href="index.php?bettaku=home"><img src="assets/images/logo_4.png"
								style="height:60px" alt=""></a>
					</span>

					<span class="login100-form-title p-b-34">
						Login
					</span>


					<div class="wrap-input100 validate-input" data-validate="Enter email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf15a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-30">
						<a class="txt1" href="index.php?bettakuu=signup-user">Dont have account? Sign up</a>

					</div>
				</form>
			</div>
		</div>
	</div>


	<!--===============================================================================================-->
	<script src="assets/form/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/form/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/form/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/form/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/form/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/form/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/form/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets/form/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="assets/form/js/main.js"></script>

</body>

</html>