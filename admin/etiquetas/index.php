<?php
require_once '../../app/config.php';
require_once '../../app/db.php';

if( isset($_GET['add']) ){
    $tag = htmlspecialchars($_POST['tag'], ENT_QUOTES, 'UTF-8');

    // Array de errores
    $errores = [];

    if( $tag == "" ){
        $errores['longitud'] = true;
    }

    // Verifico si hay errores e informo sobre ello
    if( empty($errores) ){
        try {
            $sql = "INSERT INTO tags (name) VALUES (:tag)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(':tag',$tag);
            $ps->execute();
        }catch(PDOException $e){
            die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
        }
    }else{
        require_once 'etiquetas.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

if( isset($_GET['update']) ){
    $tag = htmlspecialchars($_POST['tag'],ENT_QUOTES, 'UTF-8');
    $idtag = $_POST['idtag'];

    if( is_numeric($idtag) ) {
        try {
            $sql = "UPDATE tags SET name = :tag WHERE id = :idtag";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(':tag', $tag);
            $ps->bindValue(':idtag', $idtag);
            $ps->execute();
        } catch (PDOException $e) {
            die('No se pudo actualizar la tarea. Error: ' . $e->getMessage());
        }
    }
    header('Location: .');
    exit();
}

if( isset($_GET['delete']) && is_numeric($_GET['id']) ){
    $idtag = htmlspecialchars($_GET['id'],ENT_QUOTES,'UTF-8');

    try{
        $sql = 'DELETE FROM tags WHERE id = :idtag';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(':idtag', $idtag);
        $ps->execute();
    }catch(PDOException $e){
        die("No se ha podido extraer información de la base de datos:". $e->getMessage());
    }
    header("Location: .");
    exit();
}

if( isset($_GET['edit']) && is_numeric($_GET['id']) ){
    $idtag = $_GET['id'];

    try{
        $sql = 'SELECT * FROM tags WHERE id = :idtag';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(':idtag', $idtag);
        $ps->execute();
    }catch (PDOException $e) {
        die("No se ha podido extraer información de la base de datos:". $e->getMessage());
    }

    $tag = $ps->fetch(PDO::FETCH_ASSOC);

    if( !empty($tag) ){
        require_once 'editar_etiqueta.html.php';
        exit();
    }

    header("Location: .");
    exit();
}

try{
    $sql = "SELECT * FROM tags";
    $ps = $pdo->prepare($sql);
    $ps->execute();
}catch (PDOException $e){
    die("No se ha podido extraer información de la base de datos:". $e->getMessage());
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
    $tags[] = $row;
}

require_once 'etiquetas.html.php';