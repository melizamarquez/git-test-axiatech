<?php

require_once 'header-back.php';

require_once 'header-control.php';

require_once 'left-control.php';

require_once '../controller/proyectos.controller.php';
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
                            <h1 class="box-title">Proyectos/Investigaciones enviadas


                            </h1>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- centro -->
                        <div class="panel-body table-responsive" id="listadoregistros">
                            <div class="row col-xs-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Estado</th>
                                        <th>Titulo</th>
                                        <th>URL Documento</th>
                                        <th>Categoria</th>
                                        <th>Descripcion</th>
                                        <th>Fecha Envio</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    ProyectosController::listarProyectosEnviadosController();
                                    ?>
                                    <tfoot>
                                    </tfoot>
                                </table>
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