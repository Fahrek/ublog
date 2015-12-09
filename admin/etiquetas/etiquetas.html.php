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

$error = '';
 if( !empty($errores) ){
    $error = 'has-error';
 }
 require_once $base_path.'admin/templates/header.php';
?>
        <div class="row">

            <div class="col-lg-4">
                <h2>Nueva Etiqueta</h2>
                <form role="form" method="POST" action="?add">
                    <div class="form-group <?=$error?>">
                        <label class="control-label" for="tag">Nombre</label>
                        <input type="text" class="form-control" name="tag" placeholder="Nombre de etiqueta  ">
                        <?php if( $error != '' ): ?>
                        <p class="help-block">Introduce el nombre de la etiqueta.</p>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Añadir Etiqueta</button>
                </form>
                <?php if(isset($mensaje)):?>
                <h3><?=$mensaje?></h3>
                <?php endif; ?>
            </div>

            <div class="col-lg-8">
                <h2>Lista de Etiquetas</h2>
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Cantidad</th>
                            <th>Editar</th>
                            <th>Borra</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tags as $tag): ?>
                        <tr>
                            <th><?=$tag['name']?></th>
                            <th><?php echo reemplazo($tag['name']); ?></th>
                            <th></th>
                            <th>
                                <a href="?edit&id=<?=$tag['id']?>"><i class="fa fa-pencil-square-o"></i></a>
                            </th>
                            <th>
                                <a href="?delete&id=<?=$tag['id']?>"><i class="fa fa-times"></i></a>
                            </th>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
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