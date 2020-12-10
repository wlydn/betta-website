<?php require "config/koneksi.php";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bettaku</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">

	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">

	<link rel="stylesheet" href="assets/css/aos.css">

	
    <!-- Bootstrap core CSS -->
    <link href="diagnosa/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="diagnosa/css/justified-nav.css" rel="stylesheet">
	
	<link rel="stylesheet" href="assets/css/ionicons.min.css">

	<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="assets/css/jquery.timepicker.css">


	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/style/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class="goto-here">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php?bettaku=home"><img src="assets/images/logo_3.png" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php?bettaku=home" class="nav-link">Home</a></li>
					<?php if(isset($_SESSION["pelanggan"])): ?>
					<li class="nav-item"><a href="index.php?bettaku=profile" class="nav-link">Profile</a></li>
					<?php endif ?>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Diagnosa</a>
					<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="index.php?bettaku=diag#tentang">About</a>
							<a class="dropdown-item" href="index.php?bettaku=diag#ambiltes">Check</a>
						</div></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Catalog</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<?php if(isset($_SESSION["pelanggan"])): ?>
							<a class="dropdown-item" href="index.php?bettaku=shop">Shop</a>
							<a class="dropdown-item" href="index.php?bettaku=cart">Cart</a>
							<a class="dropdown-item" href="index.php?bettaku=history">History</a>
							<a class="dropdown-item" href="index.php?bettaku=ongkir">Shipping Information</a>
							<?php else: ?>
							<a class="dropdown-item" href="index.php?bettaku=shop">Shop</a>
							<a class="dropdown-item" href="index.php?bettaku=ongkir">Shipping Information</a>
							<?php endif ?>
						</div>
					</li>
					<?php if(isset($_SESSION["pelanggan"])): ?>
					<li class="nav-item"><a href="index.php?bettaku=logout" class="nav-link btn-login">Logout</a></li>
					<?php else: ?>
					<li class="nav-item"><a href="index.php?bettakuu=login-user" class="nav-link btn-login">Login</a>
					</li>
					<?php endif ?>
					<li class="nav-item cta cta-colored"><a href="index.php?bettaku=cart" class="nav-link"><span
								class="icon-shopping_cart"></span></a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<?php include "user/content/content.php" ?>


	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row">
				<div class="mouse">
					<a href="#" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
					</a>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<a class="navbar-brand" href="index.html"><img src="assets/images/logo_3.png" alt=""></a>
						<br>
						<br>
						<br>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Menu</h2>
						<ul class="list-unstyled">
							<li><a href="index.php?bettaku=home" class="py-2 d-block">Home</a></li>
							<li><a href="index.php?bettaku=shop" class="py-2 d-block">Shop</a></li>
							<li><a href="index.php?bettaku=diagnosa" class="py-2 d-block">Diagnosa</a></li>
							<li><a href="index.php?bettaku=faq" class="py-2 d-block">FAQ</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Help</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
								<li><a href="index.php?bettaku=ongkir" class="py-2 d-block">Shipping Information</a>
								</li>
								<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
								<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
								<li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">Jl. Ring Road Utara,
										Condong Catur, Sleman, Yogyakarta - Indonesia.</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+62
											89523269898</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">bettaku.id@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>


	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing.1.3.js"></script>
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<script src="assets/js/jquery.stellar.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/aos.js"></script>
	<script src="assets/js/jquery.animateNumber.min.js"></script>
	<script src="assets/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
	</script>
	<script src="assets/js/google-map.js"></script>
	<script src="assets/js/main.js"></script>

	<script>
		$(document).ready(function () {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function (e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function (e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#provinsi').change(function () {
				//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
				var prov = $('#provinsi').val();
				$.ajax({
					type: 'GET',
					url: 'http://localhost:8080/projectweb/minishop/user/cek_kabupaten.php',
					data: 'prov_id=' + prov,
					success: function (data) {
						//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
						$("#kabupaten").html(data);
					}
				});
			});
			$("#cek").click(function () {
				//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
				var asal = $('#asal').val();
				var kab = $('#kabupaten').val();
				var kurir = $('#kurir').val();
				var berat = $('#berat').val();
				$.ajax({
					type: 'POST',
					url: 'http://localhost:8080/projectweb/minishop/user/cek_ongkir.php',
					data: {
						'kab_id': kab,
						'kurir': kurir,
						'asal': asal,
						'berat': berat
					},
					success: function (data) {
						//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
						$("#ongkir").html(data);
					}
				});
			});
		});
	</script>

	<script>
		$(".custom-file-input").on("change", function () {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>

	


		  <script src="diagnosa/js/popper.min.js"></script>
    <script src="diagnosa/js/jquery-slim.min.js"></script>
    <script src="diagnosa/js/bootstrap.min.js"></script>


</body>

</html>