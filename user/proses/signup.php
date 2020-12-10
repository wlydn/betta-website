<?php
    
    require "config/koneksi.php";

    if(isset($_POST['signup']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = md5($_POST['pass']);
        $password = $_POST['pass'];
        $repassword = $_POST['repass'];
        if($password != $repassword){
            echo "<script>alert('Password no match')</script>";
            echo "<script>location='index.php?bettakuu=signup-user'</script>";
        }else{
            if(empty($password & $repassword & $username & $email & $phone)){
                echo "<script>alert('Harus di isi semua')</script>";
                echo "<script>location='index.php?bettakuu=signup-user'</script>";
            }else{
                mysqli_query($koneksi,"INSERT INTO pelanggan(email_pelanggan,password_pelanggan,username_pelanggan,nohp_pelanggan)
                VALUES('$email','$pass','$username','$phone')");
                echo "<script>alert('Registration Succes')</script>";
                echo "<script>location='index.php?bettakuu=login-user'</script>";
            }
            
        }
    }
?>