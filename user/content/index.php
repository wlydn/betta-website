<?php
if (isset($_GET['bettakuu'])) {
    $page = $_GET['bettakuu'];

    switch ($page) {
        case 'login-user':
            include "user/layout/login.php";
            break;
        case 'login':
            include "user/proses/login.php";
            break;
        case 'signup-user':
            include "user/layout/signup.php";
            break;
        case 'signup':
            include "user/proses/signup.php";
            break;
        default:
            include "user/layout/404.php";
            break;
    }
} else {
    include "user/layout/index.php";
}
