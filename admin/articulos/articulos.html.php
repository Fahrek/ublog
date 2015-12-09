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
                        <tr>
                            <td>añlksdjf añdjfñlads jfñalksdf</td>
                            <td>asdfa</td>
                            <td>sdfg, sdf, ssdfgsdfg</td>
                            <td>34</td>
                            <td><i class="fa fa-pencil-square-o"></i></td>
                            <td><i class="fa fa-times"></i></td>
                        </tr>
                        <tr>
                            <td>añlksdjf añdjfñlads jfñalksdf</td>
                            <td>sdfgsfdg</td>
                            <td>lasdfj, kasdfasdf, askdfasdf, asdfa</td>
                            <td>55</td>
                            <td><i class="fa fa-pencil-square-o"></i></td>
                            <td><i class="fa fa-times"></i></td>
                        </tr>
                        <tr>
                            <td>añlksdjf añdjfñlads jfñalksdf</td>
                            <td>asdfasdf</td>
                            <td>lasdfj, kasdfasdf, askdfasdf, asdfa</td>
                            <td>23</td>
                            <td><i class="fa fa-pencil-square-o"></i></td>
                            <td><i class="fa fa-times"></i></td>
                        </tr>
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