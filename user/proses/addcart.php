<?php

    $id_produk = $_GET['id'];

    if(isset($_SESSION['cart'][$id_produk]))
    {
        $_SESSION['cart'][$id_produk]+=1; 
    }
    else
    {
        $_SESSION['cart'][$id_produk]=1;
    }

    echo "<script>alert('Add cart succes')</script>";
    echo "<script>location='index.php?bettaku=shop'</script>";
?>