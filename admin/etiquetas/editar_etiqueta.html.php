<?php
function reemplazo($url = NULL)
	{
		//Reemplazamos caracteres especiales latinos en Mayúscula por culpa de un bug con strtolower
		$table = array(
		    'Á'=>'A',
			'Ç'=>'c',
			'É'=>'e',
			'Í'=>'i',
			'Ñ'=>'n',
			'Ó'=>'o',
			'Ú'=>'u',
			'á'=>'a',
			'ç'=>'c',
			'é'=>'e',
		        'í'=>'i',
			'ñ'=>'n',
			'ó'=>'o',
			'ú'=>'u',
		);
		$url = strtr($url, $table);
		//Añadimos los guiones
		$url = strtolower(trim($url));
		$url = preg_replace('/[^a-z0-9-]/', '-', $url);
		$url = preg_replace('/-+/', "-", $url);
		return $url;
		unset($url);
	}

$error = '';
 if( !empty($errores) ){
    $error = 'has-error';
 }
 require_once $base_path.'admin/templates/header.php';
?>
        <div class="row">

            <div class="col-lg-4">
                <h2>Actualizar Etiqueta</h2>
                <form role="form" method="POST" action="?update">
                    <div class="form-group <?=$error?>">
                        <label class="control-label" for="tag">Nombre</label>
                        <input type="hidden" name="idtag" value="<?=$tag['id']?>">
                        <input type="text" class="form-control" name="tag" value="<?=$tag['name']?>">
                        <?php if( $error != '' ): ?>
                        <p class="help-block">Introduce el nombre de la etiqueta.</p>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar Etiqueta</button>
                </form>
                <?php if(isset($mensaje)):?>
                <h3><?=$mensaje?></h3>
                <?php endif; ?>
            </div>
        </div> <!-- .row -->
    </div><!-- /.container-fluid -->


</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
    require_once $base_path.'admin/templates/footer.php';
?>