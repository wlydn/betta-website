

    <?php
        $id_pelanggan = $_GET['id'];

        $db = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
        $profile = mysqli_fetch_assoc($db);
    ?>

<body>
    
    <div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php?bettaku=home">Home</a></span> <span><a href="index.php?bettaku=profile">Profile</a></span></p>
            <h1 class="mb-0 bread">Edit Profile</h1>
          </div>
        </div>
      </div>
    </div>
    <br><br><br>
    <div class="container">
        <div class="">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Name</label>
                        <input class="form-control" type="text" name="nama" id="example-text-input"
                            value="<?php echo $profile['nama_pelanggan'];?>">
                    </div>
                    <div class="form-group">
                        <label for="example-search-input" class="col-form-label">Username</label>
                        <input class="form-control" type="text" readonly name="username" id="example-search-input"
                            value="<?php echo $profile['username_pelanggan'];?>">
                    </div>
                    <div class="form-group">
                        <label for="example-search-input" class="col-form-label">Email</label>
                        <input class="form-control" type="text" name="email" id="example-search-input"
                            value="<?php echo $profile['email_pelanggan'];?>">
                    </div>
                    <div class="form-group">
                        <label for="example-search-input" class="col-form-label">Phone</label>
                        <input class="form-control" type="number" name="phone" id="example-search-input"
                            value="<?php echo $profile['nohp_pelanggan'];?>">
                    </div>
                    <div class="form-group">
                        <img src="<?php echo $profile['foto_pelanggan'];?>" alt="" width="150">
                    </div>
                    <div class="form-group">
                        <label for="example-search-input" class="col-form-label">Edit Photo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-search-input" class="col-form-label">Address</label>
                        <textarea class="form-control" aria-label="With textarea" name="address" cols="30"
                            rows="10"><?php echo $profile['alamat_pelanggan'];?></textarea>
                    </div>
                    <button class="btn btn-primary" style="width:150px;height:50px"  name="save">Save</button>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>

</body>

<?php

  if(isset($_POST['save']))
  {
          $nama = $_POST['nama'];
          $email = $_POST['email'];
          $username = $_POST['username'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $img = $_FILES['foto'];
          $new_img = 'user/foto_profile/img_'.date('YmdHis').'.png';
          $lokasi = $img['tmp_name'];
          if(!empty($lokasi)){
              move_uploaded_file($lokasi,$new_img);
              mysqli_query($koneksi,"UPDATE pelanggan SET email_pelanggan='$email',username_pelanggan='$username',nama_pelanggan='$nama',
              nohp_pelanggan='$phone',alamat_pelanggan='$address',foto_pelanggan='$new_img' WHERE id_pelanggan='$id_pelanggan'");
          }
          else{
              mysqli_query($koneksi,"UPDATE pelanggan SET email_pelanggan='$email',username_pelanggan='$username',nama_pelanggan='$nama',
              nohp_pelanggan='$phone',alamat_pelanggan='$address' WHERE id_pelanggan='$id_pelanggan");
          }

      echo "<script>alert('Profile has been updated')</script>";
      echo "<script>location='index.php?bettaku=profile'</script>";
  }
  
?>