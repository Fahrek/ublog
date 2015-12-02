<?php
    // Información general de página
    $info['title'] = 'uBlog Admin ';

    $active = [
        'articulos' => '',
        'categorias' => '',
        'etiquetas' => '',
        'autores' => '',
        'comentarios' => ''
    ];


    if (strpos($_SERVER['REQUEST_URI'],'articulos') !== false) {
        $active['articulos'] = 'class="active"';
        $info['subtitle'] = 'Artículos';
        $info['icon'] = 'fa fa-pencil-square-o';
    } else if (strpos($_SERVER['REQUEST_URI'],'categorias') !== false) {
        $active['categorias']= 'class="active"';
        $info['subtitle'] = 'Categorías';
        $info['icon'] = 'fa fa-bookmark-o';
    } else if (strpos($_SERVER['REQUEST_URI'],'etiquetas') !== false) {
        $active['etiquetas'] = 'class="active"';
        $info['subtitle'] = 'Etiquetas';
        $info['icon'] = 'fa fa-tags';
    } else if (strpos($_SERVER['REQUEST_URI'],'autores') !== false) {
        $active['autores'] =  'class="active"';
        $info['subtitle'] = 'Autores';
        $info['icon'] = 'fa fa-users';
    } else if (strpos($_SERVER['REQUEST_URI'],'comentarios') !== false) {
        $active['comentarios'] = 'class="active"';
        $info['subtitle'] = 'Comentarios';
        $info['icon'] = 'fa fa-comments-o';
    }else{
        $info['subtitle'] = '';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - <?=$info['subtitle']?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=$admin_url?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=$admin_url?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=$admin_url?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=$admin_url?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=$admin_path?>"><?=$info['title']?><?=$info['subtitle']?></a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Usuario <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li <?=$active['articulos']?>>
                    <a href="<?=$admin_url?>articulos"><i class="fa fa-pencil-square-o"></i> Artículos</a>
                </li>
                <li <?=$active['categorias']?>>
                    <a href="<?=$admin_url?>categorias"><i class="fa fa-bookmark-o"></i> Categorías</a>
                </li>
                <li <?=$active['etiquetas']?>>
                    <a href="<?=$admin_url?>etiquetas"><i class="fa fa-tags""></i> Etiquetas</a>
                </li>
                <li <?=$active['autores']?>>
                    <a href="<?=$admin_url?>autores"><i class="fa fa-users""></i> Autores</a>
                </li>
                <li <?=$active['comentarios']?>>
                    <a href="<?=$admin_url?>comentarios"><i class="fa fa-comments-o""></i> Comentarios</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?=$info['title']?> <small><?=$info['subtitle']?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Admin
                        </li>
                        <?php if( isset($info['icon']) ): ?>
                        <li class="active">
                            <i class="<?=$info['icon']?>"></i> <?=$info['subtitle']?>
                        </li>
                        <?php endif; ?>
                    </ol>
                </div>
            </div>
            <!-- /.row -->