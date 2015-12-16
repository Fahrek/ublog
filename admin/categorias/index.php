<?php
require_once '../../app/config.php';
require_once '../../db/db.php';

session_start();

if( isset($_GET['edit']) ){
    $newCatName = htmlspecialchars($_POST['nombre'],ENT_QUOTES, 'UTF-8');
    $idcat = $_POST['idcat'];

    //exit();
    try{
        $sql = "UPDATE categories SET name = :nuevonombre, modified_at = NOW() WHERE id = :idcat";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(':nuevonombre', $newCatName);
        $ps->bindValue(':idcat', $idcat);
        $ps->execute();
    }catch(PDOException $e){
        die('No se pudo actualizar la tarea. Error: '.$e->getMessage() );
    }
    header( 'Location: .');
    exit();
}

if( isset($_GET['delete']) ){
    $idcat = $_POST['idcat'];
    print_r($_GET);
    //echo "Delete";
    //echo "Eliminar id: ".$idcat;
    if ( is_numeric($idcat) ) {
        try {
            $sql = "DELETE FROM categories WHERE id = :idcat";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(':idcat', $idcat);
            $ps->execute();
        } catch (PDOException $e) {
            echo "Error";
            exit();
        }
        header('Location: .');
        exit();
    }else{
        $mensaje = "No se ha podido borrar la categoría";
    }
    //exit();
}

if( isset($_GET['add']) ){
    $categoria = htmlspecialchars($_POST['nombre'],ENT_QUOTES, 'UTF-8');

    $errores = [];
    if ( $categoria == "" ) {
        $errores['texto'] = 'Debes indicar un texto para cada tarea.';
    }

    if ( empty($errores) ) {
        try{
            $sql = "INSERT INTO categories (name) VALUES (:nombre)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(':nombre',$categoria);
            $ps->execute();
        }catch (PDOException $e){
            die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
        }
        header("Location: .");
        exit();
    }
    $mensaje = "La nueva categoría es ".$categoria;
}

if( isset($_GET['edit']) ) {
    $idcat = $_POST['idcat'];
    $newCatName = htmlspecialchars($_POST['categoria'], ENT_QUOTES, 'UTF-8');

    //echo "Editar id: ".$idcat;
    //exit();
    if (is_numeric($idcat)) {
        try {
            $sql = "UPDATE categories SET name = :newCatName WHERE id = :idcat";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(':newCatName', $newCatName);
            $ps->bindValue(':idcat', $idcat);
            $ps->execute();
        } catch (PDOException $e) {
            die('No se pudo actualizar la tarea. Error: ' . $e->getMessage());
        }
        header('Location: .');
    }
}

$sql = "SELECT * from categories";

try{
    $ps = $pdo->prepare($sql);
    $ps->execute();
}catch(PDOException $e) {
    die("No se ha podido extraer información de la base de datos:". $e->getMessage());
}
while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
    $categorias[] = $row;
}

require_once 'categorias.html.php';