<?php

$db = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk=$_GET[id]");
$produk = mysqli_fetch_assoc($db);

$query = "Select * from kategori";
$db1 = mysqli_query($koneksi, $query);

?>

<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span><a href="index.php?bettaku=listproduct">List Product</a></span>
                </p>
                <h1 class="mb-0 bread">Edit Product</h1>
            </div>
        </div>
    </div>
</div>
<br><br><br>

<div class="container">
    <div class="">
        <div class="card-body">
            <h4 class="header-title font-weight-bold">Edit Product</h4>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Name Product</label>
                    <input class="form-control" type="text" value="<?php echo $produk['nama_produk'];?>" name="nama"
                        id="example-text-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">Price</label>
                    <input class="form-control" type="number" value="<?php echo $produk['harga_produk'];?>" name="harga"
                        id="example-search-input">
                </div>
                <div class="form-group">
                    <img src="ls/images/<?php echo $produk['foto_produk'];?>" alt="" width="150">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">Edit Photo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-form-label">Category</label>
                    <select class="custom-select" name="kategori">
                        <?php while($kategori = mysqli_fetch_array($db1)): ?>
                        <option value="<?php echo $kategori['id_kategori']?>">
                            <?php echo $kategori['nama_kategori']?>
                        </option>
                        <?php endwhile;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">Desc</label>
                    <textarea class="form-control" aria-label="With textarea" name="deskripsi" cols="30"
                        rows="10"><?php echo $produk['deskripsi_produk'];?></textarea>
                </div>
                <br>
                <button class="btn btn-primary" style="width:150px;height:50px"  name="save">Save</button>
            </form>
        </div>
    </div>
</div>
<br><br><br>

<?php

    if(isset($_POST['save']))
    {
            $kategori = $_POST['kategori'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $img = $_FILES['foto'];
            $new_img = 'img_'.date('YmdHis').'.png';
            $lokasi = $img['tmp_name'];
            $deskripsi = $_POST['deskripsi'];
            if(!empty($lokasi)){
                move_uploaded_file($lokasi,"ls/images/".$new_img);
                mysqli_query($koneksi,"UPDATE produk SET id_kategori='$kategori',nama_produk='$nama',
                harga_produk='$harga',foto_produk='$new_img',deskripsi_produk='$deskripsi' WHERE id_produk=$_GET[id]");
            }
            else{
                mysqli_query($koneksi,"UPDATE produk SET id_kategori='$kategori',nama_produk='$nama',
                harga_produk='$harga',deskripsi_produk='$deskripsi' WHERE id_produk=$_GET[id]");
            }

        echo "<script>alert('Data has been changed')</script>";
        echo "<script>location='index.php?bettaku=listproduct'</script>";
        exit();
    }
?>