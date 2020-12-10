<?php 
                if(isset($_GET['admin'])){
                    $page = $_GET['admin'];
            
                    switch ($page) {
                    case 'login-admin':
                        include "ls/layout/login.php";
                        break;
                    case 'login':
                        include "ls/proses/login.php";
                        break;			
                    default:
                        include "ls/layout/404.php";
                        break;
                    }
                }else{
                    include "layout/index.php";
                }
