<?php
require_once '../app/config.php';
require_once '../db/db.php';
require_once '../db/authors.php';

if( isset($_GET['login']) ){
    $email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

    $errores = [];

    $author = authorLogin($email, $password);

    if( $author ){
        //echo $admin_url; exit();
        session_start();
        $_SESSION['user'] = [
            'id'    => $author['id'],
            'nick'  => $author['nick'],
            'email' => $author['email'],
            'role' => $author['role']
        ];
        //print_r($_SESSION['user']);
        header('Location: '.$admin_url);
    }else{
        echo 'Usuario NO encontrado.';
    }
    exit();
}else{
    require_once 'login_form.html.php';
}
