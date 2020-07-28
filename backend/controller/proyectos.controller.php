<?php
require_once '../../controller/controller.funciones.php';
require_once '../model/proyectos.model.php';
require_once '../model/categoria.model.php';
require_once '../model/autor.model.php';

class ProyectosController
{

    // funcion para listar los proyectos enviados desde el fronted
    static public function listarProyectosEnviadosController()
    {
        $respuesta = ProyectosModel::listarProyectosEnviadosModel();

        foreach ($respuesta as $dato) {

            //fecha
            $fecha = strtotime($dato['proe_fecha_enviado']);
            $fechaFormato = date('d-m-Y', $fecha);

            //Estado
            if ($dato['proe_estado'] == 'false') {
                $estado = '<a href="crear_proyecto.php?id=' . $dato['proe_id_envio'] . '"><span class="label label-warning">Pendiente</span></a>';
            } else {

                $estado = '<span class="label label-success">Activo</span>';
            }

            echo '
                   <tr>
                                        <td>' . $estado . '</td>
                                        <td>' . $dato['proe_titulo'] . '</td>
                                        <td><a href="' . $dato['proe_url_documento'] . '" target="_blank">' . $dato['proe_url_documento'] . '</a></td>
                                        <td>' . $dato['cat_descripcion'] . '</td>
                                        <td>' . $dato['proe_descripcion'] . '</td>
                                        <td>' . $fechaFormato . '</td>
                                      
                                        
                                    </tr>
            ';
        }
    }


    //Funcion que recibira el parametro de id, para identificar si viene la propuesta desde formjulario front, o es creacion en limpio

    static public function mostrarFormularioProyecto()
    {

        //validacion si viene por get informacion de proyecto
        if (isset($_GET['id'])) {
            $informacion = ProyectosModel::informacionProyectoEnviadoPorId($_GET['id']);

            //validacion si existe la informacio el ID, rellenara los campos con el respectivo ID, de lo contrario mostrara el formulario en limpio
            if ($informacion) {
                $opcion = 'id';
                ProyectosController::estructuraFormularioCrearProyecto($opcion, $informacion);

            } else {
                $opcion = 'limpio';
                ProyectosController::estructuraFormularioCrearProyecto($opcion, $informacion);
            }


        } else if (isset($_GET['idProyecto'])) {

            //si existe el proyecto con el id pasado por get
            $informacion = ProyectosModel::informacionProyectoPorId($_GET['idProyecto']);

            if ($informacion) {

                $opcion = 'idProyecto';
                ProyectosController::estructuraFormularioCrearProyecto($opcion, $informacion);
            } else {
                $opcion = 'limpio';
                $informacion = '';
                ProyectosController::estructuraFormularioCrearProyecto($opcion, $informacion);
            }


        } else {
            $opcion = 'limpio';
            $informacion = '';
            ProyectosController::estructuraFormularioCrearProyecto($opcion, $informacion);
        }

    }


    //funcion que propircionara la estructura con los campos
    static public function estructuraFormularioCrearProyecto($opcion, $informacion)
    {

        if ($opcion == 'id') {
            //si es id , viene desde formulario fronted la informacion
            //solo se valida si ya esta activo no puede volverlo a activar

            if ($informacion['proe_estado'] == 'true') {
                echo '<div class="col-xs-12">
                    <ol class="breadcrumb">
  <li><a href="#">Esta propuesta de proyecto/investigacion ya esta activa</a></li>
</ol>
                </div>';
            }

            echo '
                <div class="panel-body table-responsive" id="listadoregistros">
                            <div class="row">

                                <div class="col-sm-6">

                                    <input type="hidden" id="idEnvioProyecto">
                                    <div class="form-group">
                                        <label for="titulo">Titulo (*)</label>
                                        <input type="text" class="form-control" id="titulo"
                                               placeholder="Ingrese el titulo de la investigacion/proyecto" value="' . $informacion['proe_titulo'] . '">
                                    </div>


                                    <div class="form-group">
                                        <label for="url-video">URL Video</label>
                                        <input type="text" class="form-control" id="url-video"
                                               placeholder="" value="">
                                    </div>


                                    <div class="form-group">
                                        <label for="url-imagen">URL Imagen Principal (*)</label>
                                        <input type="text" class="form-control" id="url-imagen"
                                               placeholder="" value="">
                                    </div>


                                    <div class="form-group">
                                        <label for="url-documento">URL Documento </label>
                                        <input type="text" class="form-control" id="url-documento"
                                               placeholder="" value="' . $informacion['proe_url_documento'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha-alta">Fecha Alta (*)</label>
                                        <input type="date" class="form-control" id="fecha-alta"
                                               placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado (*)</label>
                                        <select name="" id="estado" class="form-control">
                                            <option value="">Seleccione Estado</option>
                                            <option value="true">Activo</option>
                                            <option value="false">Inactivo</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoria del proyecto (*)</label>
                                        <select name="" id="categoria" class="form-control">
                                            <option value="">Seleccione Categoria</option>';


            $categorias = CategoriaModel::listarCategoriasModel();

            foreach ($categorias as $dato1) {
                if ($informacion['proe_id_categoria'] == $dato1['cat_id']) {
                    echo '<option value="' . $dato1['cat_id'] . '" selected>' . $dato1['cat_descripcion'] . '</option>';
                } else {
                    echo '<option value="' . $dato1['cat_id'] . '">' . $dato1['cat_descripcion'] . '</option>';
                }
            }


            echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="autor">Autor (*)</label>
                                        <select name="" id="autor" class="form-control">
                                            <option value="">Seleccione Autor</option>';
            $autores = AutorModel::listaAutoresActivos();
            foreach ($autores as $dato2) {
                echo '<option value="' . $dato2['au_id'] . '">' . $dato2['au_nombre'] . '</option>';

            }


            echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion (*)</label>
                                        <textarea name="" class="cajas-textos" id="descripcion"
                                                  placeholder="Digite la descripcion del proyecto"
                                                  style="width: 100%;height: 200px;">' . $informacion['proe_descripcion'] . '</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-12" style="margin-bottom: 1em;">
                                <div id="editor1">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="editor2">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="editor3">

                                </div>
                            </div>
                            <div class="col-xs-12" style="margin-top: 1em;">
                                <div class="form-group">';
            if ($informacion['proe_estado'] == 'true') {
                echo '
                <button class="btn btn-primary" id="" idEnvio="' . $informacion['proe_id_envio'] . '" disabled>Guardar/Activar/Actualizar
                                    </button>
                  
                ';
            } else {
                echo '
                <button class="btn btn-primary" id="guardarProyecto" idEnvio="' . $informacion['proe_id_envio'] . '">Guardar/Activar/Actualizar
                                    </button>
                  
                ';
            }

            echo '</div>
                            </div>
                        </div>
            ';
        } else if ($opcion == 'idProyecto') {  // esta opcion cargara la informacion si existe el proyecto


            echo '
                <div class="panel-body table-responsive" id="listadoregistros">
                            <div class="row">

                                <div class="col-sm-6">

                                    <input type="hidden" id="idEnvioProyecto">
                                    <div class="form-group">
                                        <label for="titulo">Titulo (*)</label>
                                        <input type="text" class="form-control" id="titulo"
                                               placeholder="Ingrese el titulo de la investigacion/proyecto" value="' . $informacion['pro_titulo'] . '">
                                    </div>


                                    <div class="form-group">
                                        <label for="url-video">URL Video</label>
                                        <input type="text" class="form-control" id="url-video"
                                               placeholder="" value="' . $informacion['pro_url_video'] . '">
                                    </div>


                                    <div class="form-group">
                                        <label for="url-imagen">URL Imagen Principal (*)</label>
                                        <input type="text" class="form-control" id="url-imagen"
                                               placeholder="" value="' . $informacion['pro_url_img'] . '">
                                    </div>


                                    <div class="form-group">
                                        <label for="url-documento">URL Documento </label>
                                        <input type="text" class="form-control" id="url-documento"
                                               placeholder="" value="' . $informacion['pro_url_documento'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha-alta">Fecha Alta (*)</label>
                                        <input type="date" class="form-control" id="fecha-alta"
                                               placeholder="" value="' . $informacion['pro_fecha_alta'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado (*)</label>
                                        <select name="" id="estado" class="form-control">
                                            <option value="">Seleccione Estado</option>';

            if ($informacion['pro_estado'] == 'true') {
                echo '
                                                <option value="true" selected>Activo</option>
                                            <option value="false">Inactivo</option>
                                           ';
            } else {
                echo '
                                                <option value="true" >Activo</option>
                                            <option value="false" selected>Inactivo</option>
                                           ';
            }

            echo '</select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoria del proyecto (*)</label>
                                        <select name="" id="categoria" class="form-control">
                                            <option value="">Seleccione Categoria</option>';


            $categorias = CategoriaModel::listarCategoriasModel();

            foreach ($categorias as $dato1) {
                if ($informacion['pro_id_categoria'] == $dato1['cat_id']) {
                    echo '<option value="' . $dato1['cat_id'] . '" selected>' . $dato1['cat_descripcion'] . '</option>';
                } else {
                    echo '<option value="' . $dato1['cat_id'] . '">' . $dato1['cat_descripcion'] . '</option>';
                }
            }


            echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="autor">Autor (*)</label>
                                        <select name="" id="autor" class="form-control">
                                            <option value="">Seleccione Autor</option>';
            $autores = AutorModel::listaAutoresActivos();
            foreach ($autores as $dato2) {
                if ($informacion['pro_id_autor'] == $dato2['au_id']) {
                    echo '<option value="' . $dato2['au_id'] . '" selected>' . $dato2['au_nombre'] . '</option>';
                } else {
                    echo '<option value="' . $dato2['au_id'] . '">' . $dato2['au_nombre'] . '</option>';
                }
            }


            echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion (*)</label>
                                        <textarea name="" class="cajas-textos" id="descripcion"
                                                  placeholder="Digite la descripcion del proyecto"
                                                  style="width: 100%;height: 200px;">' . $informacion['pro_descripcion'] . '</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-12" style="margin-bottom: 1em;">
                                <div id="editor1">
' . $informacion['pro_parrafo_12'] . '
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="editor2">
' . $informacion['pro_parrafo_6a'] . '
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="editor3">
' . $informacion['pro_parrafo_6b'] . '
                                </div>
                            </div>
                            <div class="col-xs-12" style="margin-top: 1em;">
                                <div class="form-group">
                                
                <button class="btn btn-primary" id="actualizarProyecto" idProyecto="' . $informacion['pro_id'] . '">Actualizar Proyecto
                                    </button>
                  
                </div>
                            </div>
                        </div>
            ';


        } else {
            echo '
                <div class="panel-body table-responsive" id="listadoregistros">
                            <div class="row">

                                <div class="col-sm-6">

                                    <input type="hidden" id="idEnvioProyecto">
                                    <div class="form-group">
                                        <label for="titulo">Titulo (*)</label>
                                        <input type="text" class="form-control" id="titulo"
                                               placeholder="Ingrese el titulo de la investigacion/proyecto" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="url-video">URL Video</label>
                                        <input type="text" class="form-control" id="url-video"
                                               placeholder="" value="">
                                    </div>


                                    <div class="form-group">
                                        <label for="url-imagen">URL Imagen Principal (*)</label>
                                        <input type="text" class="form-control" id="url-imagen"
                                               placeholder="" value="">
                                    </div>


                                    <div class="form-group">
                                        <label for="url-documento">URL Documento </label>
                                        <input type="text" class="form-control" id="url-documento"
                                               placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha-alta">Fecha Alta (*)</label>
                                        <input type="date" class="form-control" id="fecha-alta"
                                               placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado (*)</label>
                                        <select name="" id="estado" class="form-control">
                                            <option value="">Seleccione Estado</option>
                                            <option value="true">Activo</option>
                                            <option value="false">Inactivo</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoria del proyecto (*)</label>
                                        <select name="" id="categoria" class="form-control">
                                            <option value="">Seleccione Categoria</option>';


            $categorias = CategoriaModel::listarCategoriasModel();

            foreach ($categorias as $dato1) {
                echo '<option value="' . $dato1['cat_id'] . '">' . $dato1['cat_descripcion'] . '</option>';

            }

            echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="autor">Autor (*)</label>
                                        <select name="" id="autor" class="form-control">
                                            <option value="">Seleccione Autor</option>';
            $autores = AutorModel::listaAutoresActivos();
            foreach ($autores as $dato2) {
                echo '<option value="' . $dato2['au_id'] . '">' . $dato2['au_nombre'] . '</option>';

            }


            echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion (*)</label>
                                        <textarea name="" class="cajas-textos" id="descripcion"
                                                  placeholder="Digite la descripcion del proyecto"
                                                  style="width: 100%;height: 200px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-12" style="margin-bottom: 1em;">
                                <div id="editor1">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="editor2">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="editor3">

                                </div>
                            </div>
                            <div class="col-xs-12" style="margin-top: 1em;">
                                <div class="form-group">
                        <button class="btn btn-primary" id="guardarProyecto" idEnvio="">Guardar/Activar/Actualizar
                                    </button>
                    </div>
                            </div>
                        </div>
            ';
        }

    }


    /*CREACION DE PROYECTO POR FORMULARIO LIMPIO Y POR ID DE ENVIO DE FRONTED*/
    public $tituloProyecto;
    public $urlvideoProyecto;
    public $urlimagenProyecto;
    public $urldocumentoProyecto;
    public $fechaaltaProyecto;
    public $estadoProyecto;
    public $categoriaProyecto;
    public $autorProyecto;
    public $descripcionProyecto;
    public $editor12Proyecto;
    public $editor6AProyecto;
    public $editor6Broyecto;
    public $idEnvioPendiente;

    public function insertarProyectoController()
    {
        $datos = [
            "tituloProyecto" => $this->tituloProyecto,
            "tituloGuiones" => Funciones::limpiarCaracteresEspeciales($this->tituloProyecto),
            "urlvideoProyecto" => $this->urlvideoProyecto,
            "urlimagenProyecto" => $this->urlimagenProyecto,
            "urldocumentoProyecto" => $this->urldocumentoProyecto,
            "fechaaltaProyecto" => $this->fechaaltaProyecto,
            "estadoProyecto" => $this->estadoProyecto,
            "categoriaProyecto" => $this->categoriaProyecto,
            "autorProyecto" => $this->autorProyecto,
            "descripcionProyecto" => $this->descripcionProyecto,
            "editor12Proyecto" => $this->editor12Proyecto,
            "editor6AProyecto" => $this->editor6AProyecto,
            "editor6Broyecto" => $this->editor6Broyecto,
            "idEnvioPendiente" => $this->idEnvioPendiente
        ];

        //insercion del proyecto
        $respuesta1 = ProyectosModel::insertarProyectoModel($datos);

        if ($respuesta1) {
            //si es efectivo el insert, realizamos el update para activar el id de envio
            $estado = 'true';
            $respuesta2 = ProyectosModel::actualizarEstadoPorIdProyectoEnviado($datos['idEnvioPendiente'], $estado);

            if ($respuesta2) {
                echo 'ok';
            } else {
                echo 'error2';
            }
        } else {
            echo 'error1';
        }

    }


    //actualizar proyecto controller
    public function actualizarProyectoController()
    {
        $datos = [
            "tituloProyecto" => $this->tituloProyecto,
            "tituloGuiones" => Funciones::limpiarCaracteresEspeciales($this->tituloProyecto),
            "urlvideoProyecto" => $this->urlvideoProyecto,
            "urlimagenProyecto" => $this->urlimagenProyecto,
            "urldocumentoProyecto" => $this->urldocumentoProyecto,
            "fechaaltaProyecto" => $this->fechaaltaProyecto,
            "estadoProyecto" => $this->estadoProyecto,
            "categoriaProyecto" => $this->categoriaProyecto,
            "autorProyecto" => $this->autorProyecto,
            "descripcionProyecto" => $this->descripcionProyecto,
            "editor12Proyecto" => $this->editor12Proyecto,
            "editor6AProyecto" => $this->editor6AProyecto,
            "editor6Broyecto" => $this->editor6Broyecto,
            "idProyectoUpdate" => $this->idEnvioPendiente
        ];



        $respuesta = ProyectosModel::actualizarInformacionProyectoModel($datos);

        if ($respuesta) {
            echo 'ok';
        } else {
            echo 'errro1';
        }

    }


    //Funcion que lista la tabla de todos los proyectos
    static public function listadoProyectosController()
    {

        $respuesta = ProyectosModel::listadoProyectosModel();
        foreach ($respuesta as $dato) {


            if ($dato['pro_estado'] == 'true') {
                $estado = '<span class="label label-success">Publicada</span>';
            } else {
                $estado = '<span class="label label-danger">Pendiente</span>';
            }


            echo '
            <tr>
            <td>' . $estado . '</td>
            <td>' . $dato['pro_titulo'] . '</td>
            <td>' . $dato['pro_fecha_alta'] . '</td>
            <td><a href="' . $dato['pro_url_documento'] . '" target="_blank">' . $dato['pro_url_documento'] . '</a></td>
            <td>' . $dato['au_nombre'] . '</td>
            <td>' . $dato['pro_contador_visitas'] . '</td>
            <td>
            <a class="btn btn-primary btn-xs" href="crear_proyecto.php?idProyecto=' . $dato['pro_id'] . '"><i class="fa fa-edit"></i></a>
            <a class="btn btn-warning btn-xs" href="../../views/proyecto.php?investigacion=' . $dato['pro_titulo_guiones'] . '"><i class="fa fa-eye"></i></a>
            </td>
</tr>
            ';
        }


    }
}


/*=================================================*/
/*RECEPCION DE VARIABLES POST*/
/*=================================================*/
//creacion de proyecto en limpio y por id de envio fronted
if (isset($_POST['idEnvioPendiente'])) {
    $a = NEW ProyectosController();
    $a->tituloProyecto = $_POST['tituloProyecto'];
    $a->urlvideoProyecto = $_POST['urlvideoProyecto'];
    $a->urlimagenProyecto = $_POST['urlimagenProyecto'];
    $a->urldocumentoProyecto = $_POST['urldocumentoProyecto'];
    $a->fechaaltaProyecto = $_POST['fechaaltaProyecto'];
    $a->estadoProyecto = $_POST['estadoProyecto'];
    $a->categoriaProyecto = $_POST['categoriaProyecto'];
    $a->autorProyecto = $_POST['autorProyecto'];
    $a->descripcionProyecto = $_POST['descripcionProyecto'];
    $a->editor12Proyecto = $_POST['editor12Proyecto'];
    $a->editor6AProyecto = $_POST['editor6AProyecto'];
    $a->editor6Broyecto = $_POST['editor6Broyecto'];
    $a->idEnvioPendiente = $_POST['idEnvioPendiente'];
    $a->insertarProyectoController();
}


//update de informacion de proyecto
if (isset($_POST['idProyectoUpdate'])) {
    $b = NEW ProyectosController();
    $b->tituloProyecto = $_POST['tituloProyecto'];
    $b->urlvideoProyecto = $_POST['urlvideoProyecto'];
    $b->urlimagenProyecto = $_POST['urlimagenProyecto'];
    $b->urldocumentoProyecto = $_POST['urldocumentoProyecto'];
    $b->fechaaltaProyecto = $_POST['fechaaltaProyecto'];
    $b->estadoProyecto = $_POST['estadoProyecto'];
    $b->categoriaProyecto = $_POST['categoriaProyecto'];
    $b->autorProyecto = $_POST['autorProyecto'];
    $b->descripcionProyecto = $_POST['descripcionProyecto'];
    $b->editor12Proyecto = $_POST['editor12Proyecto'];
    $b->editor6AProyecto = $_POST['editor6AProyecto'];
    $b->editor6Broyecto = $_POST['editor6Broyecto'];
    $b->idEnvioPendiente = $_POST['idProyectoUpdate'];
    $b->actualizarProyectoController();
}

?>