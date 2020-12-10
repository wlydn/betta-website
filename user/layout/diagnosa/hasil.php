

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
				
				<div class="col-md-12 col-lg-12 order-md-last">
					<div class="row">
						
						<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate ">
            <h2 class="mb-4 font-weight-bold">Result</h2>
              <?php  
                if(isset($_POST['proses']))  
                {    
                  $a = $_POST['cek'];
                  $aa = implode('AND',$a);
                  //echo $aa;
                  $sql = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.*, rule.* 
                                                FROM pencegahan, penyakit, solusi, rule  
                                                WHERE rule.maka=penyakit.kode AND
                                                pencegahan.kode=penyakit.kode AND
                                                solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                                rule.jika='$aa'");
                      if(mysqli_num_rows($sql) == 0){
                        header('location:index.php?bettaku=diagnosa&error=Tidak ditemukan penyakit ikan cupang dengan gejala tersebut, silahkan cek <a href="index.php?bettaku=daftar">daftar penyakit ikan cupang</a>');		
                            }else{
                        $row = mysqli_fetch_array($sql);
                      }
                }  
              ?>  
              <table class="table table-bordered table-hover">
              <tr>
              <td>Gejala</td>
              <td>:</td>
              <td>
              
              <?php 
              if(isset($a[0])){
              $sql1 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[0]'");
              $row1 = mysqli_fetch_array($sql1);
                  echo "<ul><li>$row1[gejala]</li>";
                  } else {echo "";}
                  ?>
                  <?php
                  if(isset($a[1])){
              $sql2 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[1]'");
              $row2 = mysqli_fetch_array($sql2);
                  echo "<li>$row2[gejala]</li>";
                  } else {echo "";}
                  ?>
                    <?php
                  if(isset($a[2])){
              $sql3 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[2]'");
              $row3 = mysqli_fetch_array($sql3);
                  echo "<li>$row3[gejala]</li>";
                  } else {echo "";}
                  ?>
                    <?php
                  if(isset($a[3])){
              $sql4 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[3]'");
              $row4 = mysqli_fetch_array($sql4);
                  echo "<li>$row4[gejala]</li>";
                  } else {echo "";}
                  ?>
                  <?php
                  if(isset($a[4])){
              $sql4 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[4]'");
              $row4 = mysqli_fetch_array($sql4);
                  echo "<li>$row4[gejala]</li>";
                  } else {echo "";}
                  ?>
                  <?php
                  if(isset($a[5])){
              $sql4 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[5]'");
              $row4 = mysqli_fetch_array($sql4);
                  echo "<li>$row4[gejala]</li></ul>";
                  } else {echo "";}
                  ?>
                  </td>
              </tr>
              <tr>
              <td>Penyakit</td>
              <td>:</td>
              <td colspan="2"><?php echo $row['nama_penyakit']; ?></td>
              </tr>
              <tr>
              <td>Penyebab</td>
              <td>:</td>
              <td colspan="2"><?php echo $row['penyebab']; ?></td>
              </tr>
              <tr>
              <td>Pencegahan</td>
              <td>:</td>
              <td colspan="2"><?php echo $row['deskripsi']; ?></td>
              </tr>
              <tr>
              <td>Solusi</td>
              <td>:</td>
              <td colspan="2">
              
              <?php
                $nomor = $row['kd_pencegahan'];
                $query = mysqli_query($koneksi,"SELECT * FROM solusi WHERE kd_pencegahan='$nomor'");
                $no=0;
                while ($data=mysqli_fetch_array($query)) {
                ?>
                
              <?php echo $data['solusi']; ?>
              
              <?php }
              ?>
              </td>
              
              </tr>
              </table>
              <a class="btn btn-sm btn-danger" href="index.php?bettaku=diagnosa">Kembali</a>
						</div>
					</div>
          
					<div class="col-md-2 col-lg-2">
					&nbsp;
				  </div>
				</div>
    </div>
	</section>

</body>
