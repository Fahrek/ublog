<?php
require_once $base_path.'admin/templates/header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h2>Nuevo Artículo</h2>
    </div>
</div>
<div class="row">
    <form role="form" action="" method="POST">
    <div class="col-lg-9">
        <div class="form-group">
            <label class="control-label" for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo"
                   value=""
                   placeholder="Título del artículo">
        </div>
        <div class="form-group">
            <label class="control-label" for="extracto">Resumen</label>
            <textarea class="form-control" rows="3" id="comment" name="extracto"></textarea>
        </div>
        <div class="form-group">
            <label class="control-label" for="contenido">Contenido</label>
            <textarea class="form-control" rows="25" id="comment" name="contenido"></textarea>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <h3>Categoría</h3>
            <div class="radio">
              <label><input type="radio" name="optradio"> Viajes</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="optradio"> Deporte</label>
            </div>
            <div class="radio disabled">
              <label><input type="radio" name="optradio"> Tiempo Libre</label>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <h3>Etiquetas</h3>
            <div class="checkbox">
                <label><input type="checkbox" value=""> Running</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value=""> Tapas</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value=""> Senderismo</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value=""> Playa</label>
            </div>
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