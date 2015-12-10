<?php

/**
 * Devuelve las categorías que existen en la base de datos.
 *
 * @return array
 */
function categories(){
    global $pdo;

    try{
        $sql = 'SELECT * FROM categories';
        $ps = $pdo->prepare($sql);
        $ps->execute();
    }catch(PDOException $e){
        die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
    }

    while( $row = $ps->fetch(PDO::FETCH_ASSOC) ){
        $categories[] = $row;
    }

    return $categories;
}