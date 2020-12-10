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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php?bettaku=home">Home</a></span> <span>Shopping
                            history</span></p>
                    <h1 class="mb-0 bread">Shopping history</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="main-content-inner">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="card-body">
                        <h2 class="header-title font-weight-bold"><?php echo $data['nama_pelanggan'] ?></h2>
                        <br><br>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $mulai = 0;
							                $no = $mulai+1; ?>
                                        <?php 
                                            $id_pelanggan = $data['id_pelanggan'];
                                            $db = mysqli_query($koneksi,"SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");                                               
                                            
                                            while ($history = mysqli_fetch_array($db)) { ?>
                                        <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $history['tanggal_pembelian']; ?></td>
                                            <td>RP. <?php echo number_format($history['total_pembelian']);?></td>
                                            <td><?php echo $history['status_pembelian']; ?></td>
                                            <td>
                                                <?php if($history['status_pembelian']=="Verifikasi" OR $history['status_pembelian']== "Sudah dibayar"): ?>
                                                <a href="index.php?bettaku=detail&id=<?php echo $history['id_pembelian']; ?>"
                                                    class="btn btn-primary">Detail</a>
                                                <?php else: ?>
                                                <a href="index.php?bettaku=detail&id=<?php echo $history['id_pembelian']; ?>"
                                                    class="btn btn-primary">Detail</a>
                                                <a href="index.php?bettaku=payment&id=<?php echo $history['id_pembelian']; ?>"
                                                    style="background: #212529" class="btn btn-primary">Pembayaran</a>
                                                <?php endif ?>

                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<br><br><br>