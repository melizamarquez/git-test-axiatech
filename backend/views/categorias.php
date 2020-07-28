<?php

require_once 'header-back.php';

require_once 'header-control.php';

require_once 'left-control.php';

require_once '../controller/categoria.controller.php';

?>


    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h1 class="box-title">Crear y listar categorias

                            </h1>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- centro -->
                        <div class="table-responsive" style="" id="listadoregistros">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <!-- /.box-header -->
                                            <!-- form start -->
                                            <form role="form">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="categoria">Nombre de Categoria</label>
                                                        <input type="text" class="form-control" id="categoria"
                                                               placeholder="Escribe la categoria">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="color">Color de la categoria:</label>

                                                        <div class="input-group my-colorpicker2">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Selecciona el color de la categoria"
                                                                   id="color">

                                                            <div class="input-group-addon">
                                                                <i></i>
                                                            </div>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->

                                                <div class="box-footer">
                                                    <button type="button" class="btn btn-primary" id="btn-categoria">
                                                        Guardar Categoria
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tr>

                                                <th>Categoria</th>
                                                <th>Color</th>
                                                <th>Numerico</th>
                                                <th style="width: 40px">Editar</th>
                                            </tr>

                                     <!--       --><?php

                                            $llamandoListadoCategorias = NEW CategoriaController();
                                            $llamandoListadoCategorias->listarCategoriasController();

                                            ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fin centro -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
    <!--Fin-Contenido-->


<?php

require_once 'footer-back.php';
?>