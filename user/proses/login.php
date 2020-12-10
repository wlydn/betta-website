<?php

    require "config/koneksi.php";

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['pass']);

        $db = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
        $data = mysqli_fetch_array($db);
        $check = mysqli_num_rows($db);

        if($check>0)
            {
                $_SESSION['pelanggan'] = $data['email_pelanggan'];
                echo "<script>alert('Login Sukses')</script>";
                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            }
        else
            {
                echo "<script>alert('Password atau Username salah')</script>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?bettakuu=login-user'>";
            }
    }
?>