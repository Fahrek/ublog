<?php
 require_once $base_path.'admin/templates/header.php';
?>
        <div class="row">

            <div class="col-lg-4">
                <h2>Añadir Nueva Categoría</h2>
                <form role="form" method="POST" action="?add">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" name="nombre">
                        <p class="help-block">Introduce el nombre de la categoría.</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Añadir Nueva Categoría</button>
                </form>
                <?php if(isset($mensaje)):?>
                <h3><?=$mensaje?></h3>
                <?php endif; ?>
            </div>

            <div class="col-lg-8">
                <h2>Lista de Categorías</h2>
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
                        <?php foreach($categorias as $categoria): ?>
                        <tr>
                            <td>
                                <form action="?edit" method="post">
                                  <input type="hidden" name="idcat" value="<?=$categoria['id']?>">
                                  <input type="text" id="categoria-<?=$categoria['id']?>" name="nombre" value="<?=$categoria['name']?>" disabled>
                                  <button type="submit" class="btn btn-link btn-sm listiconbutton">
                                      <i class="fa fa-check hidden" id="updateok-<?=$categoria['id']?>"></i>
                                  </button>
                                  <i class="fa fa-times hidden" id="updatenook-<?=$categoria['id']?>"></i>
                                </form>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <i class="fa fa-pencil-square-o" id="updatebutton-<?=$categoria['id']?>"></i>
                            </td>
                            <td>
                                <form action="?delete" method="post">
                                    <input type="hidden" name="idcat" value="<?=$categoria['id']?>">
                                    <button type="submit" class="btn btn-link btn-sm listiconbutton">
                                        <i class="fa fa-times" id="deletebutton-<?=$categoria['id']?>"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </div>
        </div> <!-- .row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
    require_once $base_path.'admin/templates/footer.php';
?>