<?php
require_once '../app/config.php';

session_start();
if( isset($_GET['logout']) ){


    unset($_SESSION['user']);
    session_destroy();
    header('Location: http://localhost:8080/ublog/');
    exit();

}else{
    require_once $base_path.'admin/home/admin.html.php';
}


