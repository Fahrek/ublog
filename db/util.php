<?php
/**
* Genera una friendly string de un string cualquiera.
*
* @param null $url
* @return mixed|null|string
*/
function reemplazo($url = NULL)
{
    //Reemplazamos caracteres especiales latinos en Mayúscula por culpa de un bug con strtolower
    $table = [
    'Á'=>'A',
    'Ç'=>'c',
    'É'=>'e',
    'Í'=>'i',
    'Ñ'=>'n',
    'Ó'=>'o',
    'Ú'=>'u',
    'Ü'=>'u',
    'á'=>'a',
    'ç'=>'c',
    'é'=>'e',
    'í'=>'i',
    'ñ'=>'n',
    'ó'=>'o',
    'ú'=>'u',
    'ü'=>'u',
    ];
    $url = strtr($url, $table);
    //Añadimos los guiones
    $url = strtolower(trim($url));
    $url = preg_replace('/[^a-z0-9-]/', '-', $url);
    $url = preg_replace('/-+/', "-", $url);
    return $url;
    unset($url);
}

function generarLista($array){
    $elementos = count($array);
    $salida = '';

    if( $elementos == 1){
        $salida .= $array[0];
    }else if( $elementos > 1){
        for($i=0;$i<$elementos - 1; $i++){
            $salida .= $array[$i].', ';
        }
        $salida .= $array[$elementos-1];
    }

    echo $salida;
}