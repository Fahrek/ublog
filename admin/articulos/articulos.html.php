<?php
 require_once $base_path.'admin/templates/header.php';
?>
    <div class="row">
        <div class="col-lg-offset-10 col-lg-2">
            <a href="?new" class="btn btn-success">Añadir Artículo</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <h2>Lista de Artículos</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Categoría</th>
                            <th>Etiquetas</th>
                            <th>Comentarios</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post): ?>
                        <tr>
                            <td><?=$post['title']?></td>
                            <td>
                                <?php generarLista($post['categorias']); ?>
                            </td>
                            <td>
                                <?php generarLista($post['tags']); ?>
                            </td>
                            <td>34</td>
                            <td><i class="fa fa-pencil-square-o"></i></td>
                            <td><i class="fa fa-times"></i></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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