<?php
require_once 'app/config.php';
require_once $base_path.'templates/header.php';
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Cabecera de página
                <small>Texto Secundario</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="#">Título Artículo Blog</a>
            </h2>
            <p class="lead">
                por <a href="index.php">uBlog</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Publicado el 28 de Agostro de 2015 a las 10:00 PM</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
            <a class="btn btn-primary" href="#">Leer más <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <!-- Second Blog Post -->
            <h2>
                <a href="#">Título Artículo Blog</a>
            </h2>
            <p class="lead">
                por <a href="index.php">uBlog</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Publicado el 28 de Agostro de 2015 a las 10:00 PM</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
            <a class="btn btn-primary" href="#">Leer más <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <!-- Third Blog Post -->
            <h2>
                <a href="#">Título Artículo Blog</a>
            </h2>
            <p class="lead">
                por <a href="index.php">uBlog</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Publicado el 28 de Agostro de 2015 a las 10:00 PM</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
            <a class="btn btn-primary" href="#">Leer más <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Antiguos</a>
                </li>
                <li class="next">
                    <a href="#">Nuevos &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Buscar</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Categorías</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Nombre Categoría</a>
                            </li>
                            <li><a href="#">Nombre Categoría</a>
                            </li>
                            <li><a href="#">Nombre Categoría</a>
                            </li>
                            <li><a href="#">Nombre Categoría</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Nombre Categoría</a>
                            </li>
                            <li><a href="#">Nombre Categoría</a>
                            </li>
                            <li><a href="#">Nombre Categoría</a>
                            </li>
                            <li><a href="#">Nombre Categoría</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Widget Textual</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->
<?php
require_once $base_path.'templates/footer.php';
?>