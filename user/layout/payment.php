<?php 
    
    if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])){
        echo "<script>alert('Login Required')</script>";
        echo "<script>location='index.php?bettakuu=login-user'</script>";
        exit();
    }

    $id_pembelian = $_GET['id'];
    $db_pembelian = mysqli_query($koneksi,"SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
    $pembelian = mysqli_fetch_assoc($db_pembelian);
?>

<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php?bettaku=home">Home</a></span> <span><a href="index.php?bettaku=history">History</a></span></p>
                <h1 class="mb-0 bread">Payment Confirmation</h1>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<div class="container">
    <div class="alert alert-info">Total Rp. <?php echo number_format($pembelian['total_pembelian']); ?></div>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Name</label>
            <input class="form-control" type="text" name="nama" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="col-form-label">Bank</label>
            <input class="form-control" type="text" name="bank" id="example-search-input">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="col-form-label">Total</label>
            <input class="form-control" type="number" name="total" id="example-search-input">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="col-form-label">Photo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" style="width:150px;height:50px" name="send">Send</button>
    </form>
</div>

<br><br><br>

<?php

    if(isset($_POST['send']))
    {
        if($_FILES['foto']['error']==0){
            $nama = $_POST['nama'];
            $bank = $_POST['bank'];
            $total = $_POST['total'];
            $img = $_FILES['foto'];
            $new_img = 'ls/bukti_pembayaran/img_'.date('YmdHis').'.png';
            if(copy($img['tmp_name'], $new_img)){

                mysqli_query($koneksi,"INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah_pembayaran,bukti_pembayaran)
                VALUES('$id_pembelian','$nama','$bank','$total','$new_img')");

                mysqli_query($koneksi,"UPDATE pembelian SET status_pembelian='Verifikasi' WHERE id_pembelian='$id_pembelian'");

                echo "<script>alert('Succes')</script>";
                echo "<script>location='index.php?bettaku=history'</script>";
            }
        }
    }
?>