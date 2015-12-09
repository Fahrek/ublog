<?php
require_once '../../app/config.php';

if( isset($_GET['new']) ){
    require_once 'form_articulo.html.php';
}else{
    require_once 'articulos.html.php';
}
