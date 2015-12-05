<?php
require_once '../../app/config.php';
require_once '../../db/db.php';
require_once '../../db/authors.php';

if( isset($_GET['add']) ){
    $mote = htmlspecialchars($_POST['mote'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password1 = htmlspecialchars($_POST['password1'], ENT_QUOTES, 'UTF-8');
    $password2 = htmlspecialchars($_POST['password2'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');

    // Array de errores
    $errores = [];

    // El campo mote no puede tener menos de 3 caracteres
    if( strlen($mote) < 3 ){
        $errores['mote']['longitud'] = true;
    }

    // El campo email no puede ser vacío
    if( $email == "" ){
        $errores['email']['vacio'] = true;
    }

    // El campo email debe ser una dirección de email correcta
    // LINK: http://www.w3schools.com/php/php_form_url_email.asp
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email']['format'] = true;
    }

    // El campo email debe ser de 5 caracteres como mínimo
    if( strlen($password1) < 5 ){
        $errores['password1']['longitud'] = true;
    }

    if( strlen($password2) < 5 ){
        $errores['password2']['longitud'] = true;
    }

    // Ambos campos password deben coincidir
    if( $password1 != $password2 ){
        $errores['password2']['diferentes'] = true;
    }

    if( empty($errores) ){
        // Guardamos el HASH de la contraseña
        $password1 = md5($password1.$salt);
        try{
            $sql = "INSERT INTO authors (nick, email, password, role) VALUES (:mote, :email, :password, :role)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(':mote', $mote);
            $ps->bindValue(':email', $email);
            $ps->bindValue(':password', $password1);
            $ps->bindValue(':role', $rol);
            $ps->execute();
        }catch (PDOException $e){
            die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
        }
        header("Location: .");
        exit();
    }else{
        $authors = authors();
        require_once 'autores.html.php';
        exit();
    }
    exit();
}


if( isset($_GET['edit']) && is_numeric($_GET['id']) ){
    $author = author($_GET['id']);

    $mote = htmlspecialchars($author['nick'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($author['email'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($author['role'], ENT_QUOTES, 'UTF-8');

    if( !empty($author) ){
        require_once 'edit_autores.html.php';
    }else{
        $authors = authors();
        require_once 'autores.html.php';
    }
    exit();
}

if( isset($_GET['update']) && is_numeric($_GET['id']) ){
    $id = $_GET['id'];
    $mote = htmlspecialchars($_POST['mote'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password1 = htmlspecialchars($_POST['password1'], ENT_QUOTES, 'UTF-8');
    $password2 = htmlspecialchars($_POST['password2'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');

    // Se comprueba si hay que actualizar la contraseña
    $cambiarPassword = false;
    if( $password1 != '' || $password2 != ''){
        $cambiarPassword = true;
    }

    // Array de errores
    $errores = [];

    // El campo mote no puede tener menos de 3 caracteres
    if( strlen($mote) < 3 ){
        $errores['mote']['longitud'] = true;
    }

    // El campo email no puede ser vacío
    if( $email == "" ){
        $errores['email']['vacio'] = true;
    }

    // El campo email debe ser una dirección de email correcta
    // LINK: http://www.w3schools.com/php/php_form_url_email.asp
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email']['format'] = true;
    }

    if($cambiarPassword) {
        // El campo email debe ser de 5 caracteres como mínimo
        if (strlen($password1) < 5) {
            $errores['password1']['longitud'] = true;
        }

        if (strlen($password2) < 5) {
            $errores['password2']['longitud'] = true;
        }

        // Ambos campos password deben coincidir
        if ($password1 != $password2) {
            $errores['password2']['diferentes'] = true;
        }
    }

    if( empty($errores) ){
        // Guardamos el HASH de la contraseña

        try{
            if($cambiarPassword){
                $password1 = md5($password1.$salt);
                $sql = "UPDATE authors
                        SET nick = :nick, email = :email, password = :password, role = :role
                        WHERE id = :id";
            }else{
                $sql = "UPDATE authors
                        SET nick = :nick, email = :email, role = :role WHERE id = :id";
            }

            $ps = $pdo->prepare($sql);
            $ps->bindValue(':nick', $mote);
            $ps->bindValue(':email', $email);
            if($cambiarPassword){ $ps->bindValue(':password', $password1); }
            $ps->bindValue(':role', $rol);
            $ps->bindValue(':id', $id);
            $ps->execute();
        }catch (PDOException $e){
            die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
        }
        header("Location: .");
        exit();
    }else{
        require_once 'edit_autores.html.php';
        exit();
    }
    exit();
}

if( isset($_GET['delete']) && is_numeric($_GET['id']) ){
    $id = $_GET['id'];

    try{
        $sql = 'DELETE FROM authors WHERE id = :id';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(':id', $id);
        $ps->execute();
    }catch (PDOException $e){
        die("No se ha podido eliminar la información de la base de datos:". $e->getMessage());
    }

    header('Location: .');
    exit();
}

$authors = authors();

require_once 'autores.html.php';