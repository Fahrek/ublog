<?php
if( isset($errores) ){
    if( !empty($errores['titulo']) ){
        $error_titulo = 'has-error';
    }else{
        $erro_titulo = '';
    }

    if( !empty($errores['extracto']) ){
        $error_extracto = 'has-error';
    }else{
        $erro_extracto = '';
    }

    if( !empty($errores['contenido']) ){
        $error_contenido = 'has-error';
    }else{
        $erro_contenido = '';
    }
}
require_once $base_path.'admin/templates/header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h2>Nuevo Artículo</h2>
    </div>
</div>
<div class="row">
    <form role="form" action="?add" method="POST">
    <div class="col-lg-9">
        <div class="form-group <?=$error_titulo?>">
            <label class="control-label" for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo"
                   value=""
                   placeholder="Título del artículo">
            <?php if( isset($errores['titulo']['vacio']) ): ?>
                <p class="help-block">El artículo debe tener un título.</p>
            <?php endif; ?>
        </div>
        <div class="form-group <?=$error_extracto?>">
            <label class="control-label" for="extracto">Resumen</label>
            <textarea class="form-control" rows="3" id="comment" name="extracto"></textarea>
            <?php if( isset($errores['extracto']['vacio']) ): ?>
                <p class="help-block">El artículo debe tener un resumen.</p>
            <?php endif; ?>
        </div>
        <div class="form-group <?=$error_contenido?>">
            <label class="control-label" for="contenido">Contenido</label>
            <textarea class="form-control" rows="10" id="comment" name="contenido"></textarea>
            <?php if( isset($errores['contenido']['vacio']) ): ?>
                <p class="help-block">El artículo debe tener un contenido.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <h3>Categoría</h3>
            <?php foreach($categories as $categoria): ?>
            <div class="checkbox">
              <label><input type="checkbox" name="categorias[]" value="<?=$categoria['id']?>"><?=$categoria['name']?></label>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="form-group">
            <h3>Etiquetas</h3>
            <?php foreach($tags as $tag): ?>
            <div class="checkbox">
                <label><input type="checkbox" value="<?=$tag['id']?>" name="tags[]"><?=$tag['name']?></label>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary">Añadir Nuevo Artículo</button>
        </form>
    </div>
</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
    require_once $base_path.'admin/templates/footer.php';
?>