<body class="goto-here">

	<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
					<h1 class="mb-0 bread">Detail Product</h1>
				</div>
			</div>
		</div>
	</div>

	<?php 
	
	$id_produk = $_GET['id'];

	$db = mysqli_query($koneksi,"SELECT * FROM produk  join kategori on produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
	$data = mysqli_fetch_assoc($db);


	$db1 = mysqli_query($koneksi,"SELECT * FROM pelanggan where email_pelanggan='".$_SESSION['pelanggan']."'");
	$data1 = mysqli_fetch_assoc($db1);
	
	?>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="ls/images/<?php echo $data['foto_produk']; ?>" class="image-popup img-fluid">
					<img src="ls/images/<?php echo $data['foto_produk']?>" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3 class="font-weight-bold"><?php echo $data['nama_produk']; ?></h3>
					<p>
					 <?php echo $data['nama_kategori'] ?>
					</p>
					
					
					<p class="price"><span>Rp. <?php echo number_format($data['harga_produk']); ?></span></p>
					<p><?php echo $data['deskripsi_produk']; ?></p>
					<?php if($data1['id_pelanggan']!==$data['id_pelanggan']): ?>
					<a href="index.php?bettaku=buy&id=<?php echo $data['id_produk']; ?>" class="btn btn-primary py-3 px-5">Buy now</a></p>
					<?php endif ?>
				</div>
			</div>
	</section>



</body>