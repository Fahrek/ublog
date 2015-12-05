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

    }

    $author = $ps->fetch(PDO::FETCH_ASSOC);

    return $author;
}