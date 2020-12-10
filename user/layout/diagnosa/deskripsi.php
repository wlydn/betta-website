<?php include "conn.php"; ?>


<?php include "conn.php"; ?>

<body class="goto-here">
	<!-- END nav -->

	<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
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
            <h2>Penjelasan Detail</h2>
            <?php     
              $id = $_GET['id'];
              $sql = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.*, rule.* 
                                            FROM pencegahan, penyakit, solusi, rule  
                                            WHERE penyakit.kode=rule.maka AND
                                            penyakit.kode=pencegahan.kode AND
                                            solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                            penyakit.kode='$id'");
                  if(mysqli_num_rows($sql) == 0){
                    header("Location: daftar.php");
                  }else{
                    $row = mysqli_fetch_array($sql);
                  }
            
            ?>  
            <table class="table table-bordered table-hover">
            <tr>
            <td>Penyakit</td>
            <td>:</td>
            <td><?php echo $row['nama_penyakit']; ?></td>
            
            </tr>
            <tr>
            <td>Penyebab</td>
            <td>:</td>
            <td colspan="2"><?php echo $row['penyebab']; ?></td>
            </tr>
            <tr>
            <td>Gejala</td>
            <td>:</td>
            <td colspan="2">
            
            <?php 
            $ab = $row['jika'];
            $a = explode("AND", $ab);
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
            $sql5 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[4]'");
				    $row5 = mysqli_fetch_array($sql5);
                echo "<li>$row5[gejala]</li>";
                } else {echo "";}
                 ?>
                 <?php
                if(isset($a[5])){
           $sql6 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[5]'");
           $row6 = mysqli_fetch_array($sql6);
               echo "<li>$row6[gejala]</li></ul>";
               } else {echo "";}
                ?>
                 </td>
            </tr>
            <tr>
            <td>Pencegahan</td>
            <td>:</td>
            <td colspan="2"><?php echo $row['deskripsi']; ?></td>
            </tr>
            <tr>
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
            <a class="btn btn-sm btn-danger" href="index.php?bettaku=daftar">Kembali</a>
						</div>
					</div>
					
				</div>


	</section>

</body>
