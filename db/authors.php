<?php

/**
 * Devuelve los autores que existen en la base de datos.
 *
 * @return array
 */
function authors(){
    global $pdo;

    try{
        $sql = 'SELECT * FROM authors';
        $ps = $pdo->prepare($sql);
        $ps->execute();
    }catch(PDOException $e){
        die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
    }

    while( $row = $ps->fetch(PDO::FETCH_ASSOC) ){
        $authors[] = $row;
    }

    return $authors;
}

/**
 * Devuelve la información del autor almacenada en la base de datos.
 *
 * @param $id id del autor
 * @return mixed Array con la información del autor.
 */
function author($id){
    global $pdo;

    try{
        $sql = 'SELECT * FROM authors WHERE id = :id';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(':id', $id);
        $ps->execute();
    }catch(PDOException $e){
        die("No se ha podido extraer información de la base de datos:". $e->getMessage());
    }

    $author = $ps->fetch(PDO::FETCH_ASSOC);

    return $author;
}

function authorLogin($email, $password){
    global $pdo;
    global $salt;
    $password = md5($password.$salt);

    try{
        $sql = 'SELECT * FROM authors WHERE email = :email AND password = :password';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(':email', $email);
        $ps->bindValue(':password', $password);
        $ps->execute();
    }catch(PDOException $e){
        die("No se ha podido extraer información de la base de datos:". $e->getMessage());
    }

    $author = $ps->fetch(PDO::FETCH_ASSOC);

    return $author;
}