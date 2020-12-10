

<body class="goto-here">
	<!-- END nav -->

	<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.php?bettaku=home">Home</a></span> <span>DIAGNOSA</span></p>
                    <h1 class="mb-0 bread">DIAGNOSA</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8 col-lg-10 order-md-last">
					<div class="row">
						
						<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate ">
            <table class="table table-bordered table-hover">
              <tr>
                      <th><center>NO</center></th>
                <th><center>KODE </center></th>
                <th><center>NAMA PENYAKIT</center></th>
                      <th><center>PENYEBAB</center></th>
                      <th><center>DESKRIPSI</center></th>
              </tr>
              <?php 
                  include "conn.php";
                    $query = mysqli_query($koneksi,"SELECT * FROM penyakit ORDER BY kode ASC");
                    $no=0;
                while ($data=mysqli_fetch_array($query)) {
                        $no++;
              ?>
              <tr>
                  <td><?php echo $no; ?></td>
                <td><?php echo $data['kode']; ?></td>
                <td><?php echo $data['nama_penyakit']; ?></td>
                      <td><?php echo $data['penyebab']; ?></td>
                      <td><a href="index.php?bettaku=deskripsi&id=<?php echo $data['kode']; ?>" class="btn btn-sm btn-primary">Detail</a></td>
              </tr>
            <?php } ?>
            </table>
						</div>
					</div>
					
				</div>


	</section>

</body>
