

<body class="goto-here">

	<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php?bettaku=home">Home</a></span> <span>Cart</span></p>
					<h1 class="mb-0 bread">My Cart</h1>
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
									<th>&nbsp;</th>
									<th>No</th>
									<th>Photo</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
							<?php if(isset($_SESSION['cart'])) { ?>
								<?php $totalbelanja = 0;
							$mulai = 0;
							$no =$mulai+1; ?>
								<?php foreach ($_SESSION['cart'] as $id_produk => $jumlah): ?>
								<?php $db = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk = '$id_produk'") ;
								$cart = mysqli_fetch_assoc($db);
								$subsharga = $cart["harga_produk"]*$jumlah;
							?>
								<tr class="text-center">
									<td class="product-remove"><a
											href="index.php?bettaku=deletecart&id=<?php echo $id_produk ?>"><span
												class="ion-ios-close"></span></a></td>
									<td>
										<?php echo $no++?>
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
									<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-start">
				<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
					<div class="cart-total mb-3">
						<h3>Cart Totals</h3>
						<hr>
						<p class="d-flex total-price">
							<span>Total</span>
							<?php if(isset($_SESSION['cart'])) { ?>
							<span>Rp. <?php echo number_format($totalbelanja) ;?></span>
							<?php } ?>
						</p>
					</div>
					<p class="text-center"><a href="index.php?bettaku=checkout"
							class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
				</div>
			</div>
		</div>
	</section>


</body>