<?php
$db1 = mysqli_query($koneksi,"SELECT * FROM pelanggan where email_pelanggan='".$_SESSION['pelanggan']."'");
$pelanggan = mysqli_fetch_assoc($db1);
?>

<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>List Product</span>
                </p>
                <h1 class="mb-0 bread">List Product</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card-body">
                <a href="index.php?bettaku=addproduct&id=<?php echo $pelanggan['id_pelanggan']?>" class="btn btn-primary">Add
                  Product</a>
                  <br><br>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="dataTable3" class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Date Time</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Photo</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                $id_pelanggan = $pelanggan['id_pelanggan'];
                $db = mysqli_query($koneksi,"SELECT p.id_produk,p.nama_produk,p.tanggal_produk,p.harga_produk,p.foto_produk,k.id_kategori,k.nama_kategori from produk p join kategori k on p.id_kategori=k.id_kategori where id_pelanggan='$id_pelanggan' order by p.tanggal_produk desc");                                               
                $mulai = 0;
                $no =$mulai+1;
                                            
                while ($produk = mysqli_fetch_assoc($db)) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $produk['tanggal_produk'];?></td>
                                        <td><?php echo $produk['nama_produk'];?></td>
                                        <td>Rp. <?php echo number_format($produk['harga_produk']);?></td>
                                        <td>
                                            <img src="ls/images/<?php echo $produk['foto_produk'];?>" width="100">
                                        </td>
                                        <td><?php echo $produk['nama_kategori'];?></td>
                                        <td>
                                            <a href="index.php?bettaku=deleteproduk&id=<?php echo $produk['id_produk'];?>"
                                                class="btn-danger btn"
                                                onclick="javascript: return confirm('Anda yakin hapus produk <?php echo $produk['nama_produk'] ?>?')">Delete</a>
                                            <a href="index.php?bettaku=editproduct&id=<?php echo $produk['id_produk'];?>"
                                                class="btn btn-warning">Edit</a>
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
</div>
<br><br>
<br>