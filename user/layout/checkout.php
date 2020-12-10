<?php 
    
    if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])){
        echo "<script>alert('Login Required')</script>";
        echo "<script>location='index.php?bettakuu=login-user'</script>";
        exit();
    }else{
        $db = mysqli_query($koneksi,"SELECT * FROM pelanggan where email_pelanggan='".$_SESSION['pelanggan']."'");
        $data = mysqli_fetch_assoc($db);
    }
?>

<body class="goto-here">

	<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span>
					</p>
					<h1 class="mb-0 bread">Checkout</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="cart-list">
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>No;</th>
									<th>Photo</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $totalbelanja = 0;
							$mulai = 0;
							$no =$mulai+1; ?>
								<?php foreach ($_SESSION['cart'] as $id_produk => $jumlah): ?>
								<?php $db = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk = '$id_produk'") ;
								$cart = mysqli_fetch_assoc($db);
								$subsharga = $cart["harga_produk"]*$jumlah;
							?>
								<tr class="text-center">
									<td>
										<?php echo $no++ ?>
									</td>
									<td><img width="100" class="img" src="ls/images/<?php echo $cart['foto_produk'];?>"></td>

									<td class="product-name">
										<h3><?php echo $cart['nama_produk'];?></h3>
									</td>

									<td class="price">Rp. <?php echo number_format($cart['harga_produk']);?></td>

									<td class="quantity">
										<div class="input-group mb-3">
											<input type="text" name="quantity"
												class="quantity form-control input-number" disabled
												value="<?php echo $jumlah ?>">
										</div>
									</td>

									<td class="total">Rp. <?php echo number_format($subsharga) ;?></td>
									<?php 
								$totalbelanja+=$subsharga; ?>
									<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-start">

			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 ftco-animate">
					<form method="POST" class="billing-form">
						<h3 class="mb-4 billing-heading">Billing Details</h3>
				
							<div class="col-md-12">
								<div class="form-group">
									<label for="streetaddress">Street Address</label>
									<textarea class="form-control" name="alamat" id="" cols="30"
										rows="10"><?php echo $data['alamat_pelanggan']; ?></textarea>
								</div>
							</div>

							<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
								<div class="cart-total mb-3">
									<h3>Cart Totals</h3>
									<hr>
									<p class="d-flex total-price">
										<span>Total</span>
										<span>Rp. <?php echo number_format($totalbelanja) ;?></span>
									</p>
								</div>
								<p class="text-center"><button name="checkout" class="btn btn-primary py-3 px-4">Proceed
										to Checkout</button></p>
							</div>

					</form><!-- END -->
				</div> <!-- .col-md-8 -->
			</div>
		</div>
	</section>

</body>

<?php 
	if(isset($_POST["checkout"])){
	$id_pelanggan = $data['id_pelanggan'];
	$total_pembelian = $totalbelanja;
	$alamat_pembelian = $_POST['alamat'];
	
	mysqli_query($koneksi,"INSERT INTO pembelian(id_pelanggan,total_pembelian,alamat_pembelian)
	VALUES ('$id_pelanggan','$total_pembelian','$alamat_pembelian')");

	$id_pembelian_barusan = $koneksi->insert_id;

	foreach($_SESSION["cart"] as $id_produk => $jumlah){
		$db_produk = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$id_produk'");
		$produk = mysqli_fetch_assoc($db_produk);

		$nama_produk = $produk['nama_produk'];
		$harga_produk = $produk['harga_produk'];
		$foto_produk = $produk['foto_produk'];
		mysqli_query($koneksi,"INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,nama_produk,foto_produk,harga_produk)
		VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama_produk','$foto_produk','$harga_produk')");

		mysqli_query($koneksi,"UPDATE produk SET stok_produk=stok_produk-$jumlah WHERE id_produk='$id_produk'");
	}

	unset($_SESSION["cart"]);

	echo "<script>alert('Succes')</script>";
	echo "<script>location='index.php?bettaku=detail&id=$id_pembelian_barusan';</script>";

	}
 ?>