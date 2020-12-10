<body class="goto-here">
	<!-- END nav -->

	<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php?bettaku=home">Home</a></span> <span>Shop</span></p>
					<h1 class="mb-0 bread">Shop</h1>
				</div>
			</div>
		</div>
    </div>
    


	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-2">
					<div class="sidebar">
						<div class="sidebar-box-2">
							<h2 class="heading">Categories</h2>
							<div class="fancy-collapse-panel">
								<ul class="navbar-nav ml-auto">
								<li class="nav-item"><a href="index.php?bettaku=shop" class="nav-link">All</a> </li>
								<?php $db2 = mysqli_query($koneksi,"SELECT * from kategori");?>
								<?php while($perproduk2 = mysqli_fetch_assoc($db2)){?>
									<li class="nav-item"><a href="index.php?bettaku=shop-sort&id=<?php echo $perproduk2['id_kategori'] ?>" class="nav-link"><?php echo $perproduk2['nama_kategori'] ?></a> </li>
								<?php ?>
								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
                </div>
                
                <?php $id_kategori = $_GET['id']; ?>
				<?php 
					if(isset($_SESSION['pelanggan'])){
						$db = mysqli_query($koneksi,"SELECT * FROM pelanggan where email_pelanggan='".$_SESSION['pelanggan']."'");
						$data = mysqli_fetch_assoc($db);
					}
				?>
				<div class="col-md-8 col-lg-10 order-md-last">
					<div class="row">
						<?php $db1 = mysqli_query($koneksi,"SELECT * from produk join kategori on produk.id_kategori=kategori.id_kategori where produk.id_kategori=$id_kategori order by produk.tanggal_produk desc");?>
						<?php while($perproduk = mysqli_fetch_assoc($db1)){?>

						<?php if($perproduk['stok_produk']=='1'):?>

						<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate ">
							<div class="product d-flex flex-column">
								<a href="index.php?bettaku=productdetail&id=<?php echo $perproduk['id_produk']; ?>" class="img-prod shop"><img class="img-fluid"
										src="ls/images/<?php echo $perproduk['foto_produk'];?>" alt="Colorlib Template">
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3">
									<div class="d-flex">
										<div class="cat">
											<span><?php echo $perproduk['nama_kategori'];?></span>
										</div>
									</div>
									<h3><a href="index.php?bettaku=productdetail&id=<?php echo $perproduk['id_produk']; ?>"><?php echo $perproduk['nama_produk'];?></a></h3>
									<div class="pricing">
										<p class="price"><span>Rp.
												<?php echo number_format($perproduk['harga_produk']);?></span></p>
									</div>
									<p class="bottom-area d-flex px-3">
										<?php if(isset($_SESSION["pelanggan"])): ?>
										<?php if($data['id_pelanggan']!==$perproduk['id_pelanggan']): ?>
										<a href="index.php?bettaku=addcart&id=<?php echo $perproduk['id_produk']; ?>"
											class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
													class="ion-ios-add ml-1"></i></span></a>
										<a href="index.php?bettaku=buy&id=<?php echo $perproduk['id_produk']; ?>"
											class="buy-now text-center py-2">Buy now<span><i
													class="ion-ios-cart ml-1"></i></span></a>
										<?php endif ?>
										<?php else: ?>
										<a href="index.php?bettaku=cartlogin"
											class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
													class="ion-ios-add ml-1"></i></span></a>
										<a href="index.php?bettaku=cartlogin" class="buy-now text-center py-2">Buy
											now<span><i class="ion-ios-cart ml-1"></i></span></a>
										<?php endif ?>


									</p>
								</div>
							</div>
						</div>
						<?php endif?>
						<?php ?>
						<?php } ?>
					</div>
					
				</div>


	</section>

</body>