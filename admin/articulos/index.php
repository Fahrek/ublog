<?php
require_once '../../app/config.php';
require_once '../../db/db.php';
require_once '../../db/categorias.php';
require_once '../../db/tags.php';
require_once '../../db/util.php';

session_start();

if( isset($_GET['new']) ){
    //Extraigo las categorías
    $categories = categories();

    // Extraigo las etiquetas
    $tags = tags();

    require_once 'form_articulo.html.php';
}else if( isset($_GET['add']) ) {
    // Se captura la entrada por POST
    $titulo = htmlspecialchars($_POST['titulo'],ENT_QUOTES, 'UTF-8');
    $extracto = htmlspecialchars($_POST['extracto'],ENT_QUOTES, 'UTF-8');
    $contenido = htmlspecialchars($_POST['contenido'],ENT_QUOTES, 'UTF-8');
    if( isset($_POST['categorias']) ) $categorias = $_POST['categorias'];
    if( isset($_POST['tags']) ) $tags = $_POST['tags'];
    $id_autor = $_SESSION['user']['id'];
    
    $errores = [];

    if( $titulo == "" ){
        $errores['titulo']['vacio'] = true;
    }

    if( $extracto == "" ){
        $errores['extracto']['vacio'] = true;
    }

    if( $contenido == "" ){
        $errores['contenido']['vacio'] = true;
    }

    if( empty($errores) ){
        // Guardar artículo en la base de datos
        $slug = reemplazo($titulo);
        try{
            // Se construye la consulta
            $insertPostInfo =
                "INSERT INTO posts (id_author, title, slug, excerpt, content) VALUES (:id_author, :title, :slug, :excerpt, :content); ";

            if( !empty($categorias) ){
                foreach($categorias as $categoria){
                    $insertPostInfo .=
                        "INSERT INTO postscats (id_post, id_cat) VALUES (LAST_INSERT_ID(), $categoria); ";
                }
            }

            if( !empty($tags) ){
                foreach($tags as $tag){
                    $insertPostInfo .=
                        "INSERT INTO poststags (id_post, id_tag) VALUES (LAST_INSERT_ID(), $tag); ";
                }
            }

            $ps = $pdo->prepare($insertPostInfo);
            $ps->bindValue(':id_author', $id_autor);
            $ps->bindValue(':title', $titulo);
            $ps->bindValue(':slug', $slug);
            $ps->bindValue(':excerpt', $extracto);
            $ps->bindValue(':content', $contenido);
            $ps->execute();
        }catch (PDOException $e) {
            die("No se ha podido guardar la información en la base de datos:". $e->getMessage());
        }

        header("Location: .");
        exit();
    }else{
        //Extraigo las categorías
        $categories = categories();

        // Extraigo las etiquetas
        $tags = tags();
        require_once 'form_articulo.html.php';
        exit();
    }
}else{
    // Extraer artículos
    try{
        $sql = 'SELECT * FROM posts';
        $ps = $pdo->prepare($sql);
        $ps->execute();
    }catch(PDOException $e){
        die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
    }

    while( $row = $ps->fetch(PDO::FETCH_ASSOC) ){
        $posts[] = $row;
    }

    $categorias = [];
    foreach ($posts as $clave=>$post) {
        try{
            $sql = 'SELECT c.name categoria
                FROM `postscats` pc
                INNER JOIN `posts` p ON p.id = pc.id_post
                INNER JOIN `categories` c ON c.id = pc.id_cat
                WHERE p.id = :id_post';
            $ps = $pdo->prepare($sql);
            $ps->bindValue(':id_post', $post['id']);
            $ps->execute();
        }catch(PDOException $e){
            die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
        }

        while( $row = $ps->fetch(PDO::FETCH_ASSOC) ){
            array_push($categorias, $row['categoria']);
        }
        $posts[$clave]['categorias'] = $categorias;
        $categorias = [];
    }

    $tags = [];
    foreach($posts as $clave=>$post){
        try{
            $sql = 'SELECT t.name tag
                FROM `poststags` pt
                INNER JOIN `posts` p ON p.id = pt.id_post
                INNER JOIN `tags` t ON t.id = pt.id_tag
                WHERE p.id = :id_post';
            $ps = $pdo->prepare($sql);
            $ps->bindValue(':id_post', $post['id']);
            $ps->execute();
        }catch(PDOException $e){
            die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
        }

        while( $row = $ps->fetch(PDO::FETCH_ASSOC) ){
            array_push($tags, $row['tag']);
        }
        $posts[$clave]['tags'] = $tags;
        $tags = [];
    }

    require_once 'articulos.html.php';
}
