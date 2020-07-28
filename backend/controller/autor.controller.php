<?php
require_once '../model/autor.model.php';
require_once '../../controller/controller.funciones.php';

class AutorController
{
    /*Funcin que mostrara todos los listados enviados, activos y los que no*/
    static public function listarProyectosEnviados()
    {
        $respuesta = AutorModel::listarProyectosEnviadosModel();

        //var_dump($respuesta);
        foreach ($respuesta as $dato) {
            //fecha
            $fecha = strtotime($dato['aue_fecha_envio']);
            $fechaFormato = date('d-m-Y', $fecha);

            //Estado
            if ($dato['aue_estado'] == 'false') {
                $estado = '<a href="crear_autor.php?id=' . $dato['aue_id'] . '&cedula=' . $dato['aue_identificacion'] . '"><span class="label label-warning">Pendiente</span></a>';
            } else {

                $estado = '<span class="label label-success">Activo</span>';
            }

            echo '
            <tr>
                                        <td>' . $estado . '</td>
                                        <td>' . $dato['aue_nombre'] . '</td>
                                        <td>' . $dato['aue_identificacion'] . '</td>
                                        <td>' . $dato['aue_telefono'] . '</td>
                                        <td>' . $dato['aue_email'] . '</td>
                                        <td>' . $dato['aue_organizacion'] . '</td>
                                        <td>' . $dato['aue_ciudad'] . '</td>
                                        <td>' . $fechaFormato . '</td>
                                        <td><a href="crear_proyecto.php?id=' . $dato['aue_id_envio'] . '">' . $dato['proe_titulo'] . '</a></td>
                                        
                                    </tr>
        ';
        }

    }


    /*Funcion que imprimira el fomrulario diligenciado o vacion segun venga las variables GET*/
    static public function imprimirFormularioAutor()
    {

        /*Validacion de variables GET*/
        $idAutorEnvio = 0;
        $cedulaGet = "";

        if (@isset($_GET['id'])) {
            $idAutorEnvio = trim($_GET['id']);
        }

        if (@isset($_GET['cedula'])) {
            $cedulaGet = trim($_GET['cedula']);
        }


        //Validacion si existe la cedula
        if ($cedulaGet != "" || $idAutorEnvio != 0) {

            $respuesta1 = AutorModel::imprimirAutorCedula($cedulaGet);
            //si existe la cedula imprimimos el formulario con la informacion de la BD para actualizacion de datos
            if ($respuesta1) {
                $opcion = "cedula";
                $valor = $respuesta1;
                $id = $idAutorEnvio;

                AutorController::estructuraFormularioAutor($opcion, $valor, $id);
            } else {

                //consulta si hay datos de ese id
                $respuesta2 = AutorModel::imprimirAutorEnviado($idAutorEnvio);

                if ($respuesta2) {
                    $opcion = "id";
                    $valor = $respuesta2;
                    $id = $idAutorEnvio;

                    AutorController::estructuraFormularioAutor($opcion, $valor, $id);
                } else {
                    $opcion = "vacio";
                    $valor = "";
                    $id = "";

                    AutorController::estructuraFormularioAutor($opcion, $valor, $id);
                }


            }

        } else {
            $opcion = "vacio";
            $valor = "";
            $id = "";

            AutorController::estructuraFormularioAutor($opcion, $valor, $id);
        }


    }


    /*Funcion que imprmira la estructura del formulario de autor, segun los parametros pasados*/
    static public function estructuraFormularioAutor($opcion, $valor, $id)
    {

        switch ($opcion) {
            case "cedula":  // si llega una cedula es por que hay que actualizar, con la informacion de la BD

                //var_dump($valor);
                echo '
                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="identificacion">Identificacion</label>
                                        <input type="text" class="form-control" id="identificacion"
                                               placeholder="" disabled value="' . $valor['au_identificacion'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre"
                                               placeholder="Digite el Nombre del autor" value="' . $valor['au_nombre'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="number" class="form-control" id="telefono"
                                               placeholder="Digite el Telefono del autor" value="' . $valor['au_telefono'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                               placeholder="Digite el Email del autor" value="' . $valor['au_email'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="profesion">Profesion</label>
                                        <input type="text" class="form-control" id="profesion"
                                               placeholder="Digite la profesion del autor" value="' . $valor['au_profesion'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea name="" class="cajas-textos" id="descripcion"
                                                  style="width: 100%;height: 100px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="organizacion">Organizacion</label>
                                        <input type="text" class="form-control" id="organizacion"
                                               placeholder="Digite la Organizacion del autor" value="' . $valor['au_organizacion'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                                                              
                                         <div class="input-group" style="width: 100%">
                                            <select name="ciudad" id="ciudad" class="form-control"
                                                    placeholder="Seleccione ciudad" required>
                                                    
                                                    <option value=""> Seleccione una Ciudad</option>';

                //seleccion de ciudad
                $bdCiudades = AutorModel::listaCiudades();

                foreach ($bdCiudades as $dato) {
                    if ($dato['ciu_ciudad'] == $valor['au_ciudad']) {
                        echo '<option value="' . $dato['ciu_ciudad'] . '" selected>' . $dato['ciu_ciudad'] . '</option>';
                    } else {
                        echo '<option value="' . $dato['ciu_ciudad'] . '">' . $dato['ciu_ciudad'] . '</option>';
                    }
                }


                echo '</select>

                                        </div>
                                      
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Direccion</label>
                                        <input type="text" class="form-control" id="direccion"
                                               placeholder="Digite la Direccion del autor" value="' . $valor['au_direccion'] . '">
                                    </div>
                                     <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="text" class="form-control" id="foto"
                                               placeholder="URL de foto" value="' . $valor['au_foto'] . '">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Actualizar/Activar" class="btn btn-primary" idEnvio="' . $id . '" id="btnActivarAutor">
                                    </div>
                                </div>
                ';
                break;
            case "id": // si llega un id es por que hay que colocar los campos desde el envio desde el front


                echo '
                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="identificacion">Identificacion</label>
                                        <input type="text" class="form-control" id="identificacion"
                                               placeholder="" disabled value="' . $valor['aue_identificacion'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre"
                                               placeholder="Digite el Nombre del autor" value="' . $valor['aue_nombre'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="number" class="form-control" id="telefono"
                                               placeholder="Digite el Telefono del autor" value="' . $valor['aue_telefono'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                               placeholder="Digite el Email del autor" value="' . $valor['aue_email'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="profesion">Profesion</label>
                                        <input type="text" class="form-control" id="profesion"
                                               placeholder="Digite la profesion del autor" value="' . $valor['aue_profesion'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea name="" class="cajas-textos" id="descripcion"
                                                  style="width: 100%;height: 100px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="organizacion">Organizacion</label>
                                        <input type="text" class="form-control" id="organizacion"
                                               placeholder="Digite la Organizacion del autor" value="' . $valor['aue_organizacion'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                                                              
                                         <div class="input-group" style="width: 100%">
                                            <select name="ciudad" id="ciudad" class="form-control"
                                                    placeholder="Seleccione ciudad" required>
                                                    
                                                    <option value=""> Seleccione una Ciudad</option>';

                //seleccion de ciudad
                $bdCiudades = AutorModel::listaCiudades();

                foreach ($bdCiudades as $dato) {
                    if ($dato['ciu_ciudad'] == $valor['aue_ciudad']) {
                        echo '<option value="' . $dato['ciu_ciudad'] . '" selected>' . $dato['ciu_ciudad'] . '</option>';
                    } else {
                        echo '<option value="' . $dato['ciu_ciudad'] . '">' . $dato['ciu_ciudad'] . '</option>';
                    }
                }


                echo '</select>

                                        </div>
                                      
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Direccion</label>
                                        <input type="text" class="form-control" id="direccion"
                                               placeholder="Digite la Direccion del autor" value="' . $valor['aue_direccion'] . '">
                                    </div>
                                      <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="text" class="form-control" id="foto"
                                               placeholder="Digite la Direccion del autor" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Actualizar/Activar" class="btn btn-primary" idEnvio="' . $id . '" id="btnActivarAutor">
                                    </div>
                                </div>
                ';


                break;
            default:

                echo '
                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="identificacion">Identificacion</label>
                                        <input type="text" class="form-control" id="identificacion"
                                               placeholder="Digite la cedula del autor" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre"
                                               placeholder="Digite el Nombre del autor" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="number" class="form-control" id="telefono"
                                               placeholder="Digite el Telefono del autor" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                               placeholder="Digite el Email del autor" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="profesion">Profesion</label>
                                        <input type="text" class="form-control" id="profesion"
                                               placeholder="Digite la profesion del autor" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea name="" class="cajas-textos" id="descripcion"
                                                  style="width: 100%;height: 100px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="organizacion">Organizacion</label>
                                        <input type="text" class="form-control" id="organizacion"
                                               placeholder="Digite la Organizacion del autor" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <div class="input-group" style="width: 100%">
                                            <select name="ciudad" id="ciudad" class="form-control"
                                                    placeholder="Seleccione ciudad" required>
                                                    <option value="">Seleccione una Ciudad</option>';

                $bdCiudades = AutorModel::listaCiudades();
                foreach ($bdCiudades as $dato) {
                    echo '<option value="' . $dato['ciu_ciudad'] . '">' . $dato['ciu_ciudad'] . '</option>';
                }

                echo '</select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Direccion</label>
                                        <input type="text" class="form-control" id="direccion"
                                               placeholder="Digite la Direccion del autor" value="">
                                    </div>
                                      <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="text" class="form-control" id="foto"
                                               placeholder="Digite la Direccion del autor" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Crear" class="btn btn-primary" id="btnCrearAutor">
                                    </div>
                                </div>
                ';

        }
    }


    /*Funcion que creara el nuevo autor y validara si exise el autor*/
    public $identificacionAutor;
    public $nombreAutor;
    public $telefonoAutor;
    public $emailAutor;
    public $profesionAutor;
    public $descripcionAutor;
    public $ciudadAutor;
    public $direccionAutor;
    public $organizacionAutor;
    public $fotoAutor;

    public function crearAutorFomularioLimpio()
    {
        $datos = [
            "identificacionAutor" => $this->identificacionAutor,
            "nombreAutor" => $this->nombreAutor,
            "nombreAutorGuiones" => Funciones::limpiarCaracteresEspeciales($this->nombreAutor),
            "telefonoAutor" => $this->telefonoAutor,
            "emailAutor" => $this->emailAutor,
            "profesionAutor" => $this->profesionAutor,
            "descripcionAutor" => $this->descripcionAutor,
            "ciudadAutor" => $this->ciudadAutor,
            "direccionAutor" => $this->direccionAutor,
            "organizacionAutor" => $this->organizacionAutor,
            'fotoAutor' => $this->fotoAutor
        ];


        $respuesta1 = AutorModel::imprimirAutorCedula($datos['identificacionAutor']);
        if ($respuesta1) {
            echo "error1";
        } else {
            $respuesta2 = AutorModel::crearAutorModel($datos);
            if ($respuesta2) {
                echo "ok";
            } else {
                echo "error2";
            }
        }
    }


    /*Funcion que creara el autor y activara el usuario en la tabla de envio autor o actualizara si ya existe*/
    public $idEnvio;

    public function crearAutorFormularioEnvioPorId()
    {
        $datos = [
            "identificacionAutor" => $this->identificacionAutor,
            "nombreAutor" => $this->nombreAutor,
            "nombreAutorGuiones" => Funciones::limpiarCaracteresEspeciales($this->nombreAutor),
            "telefonoAutor" => $this->telefonoAutor,
            "emailAutor" => $this->emailAutor,
            "profesionAutor" => $this->profesionAutor,
            "descripcionAutor" => $this->descripcionAutor,
            "ciudadAutor" => $this->ciudadAutor,
            "direccionAutor" => $this->direccionAutor,
            "organizacionAutor" => $this->organizacionAutor,
            'idEnvioActivar' => $this->idEnvio,
            'fotoAutor' => $this->fotoAutor
        ];


        $respuesta1 = AutorModel::imprimirAutorCedula($datos['identificacionAutor']);
        if ($respuesta1) { // si existe realizara update sobre el autor

            $respuesta4 = AutorModel::actializarAutorModel($datos);

            if ($respuesta4) {

                //realizamos el update sobre el id de envio de autor
                $estado = "true";
                $respuesta5 = AutorModel::activarIdEnvioAutor($datos['idEnvioActivar'], $estado);

                if ($respuesta5) {
                    echo "ok";
                } else {
                    echo "error5";
                }


            } else {
                echo "error4";
            }

        } else {
            $respuesta2 = AutorModel::crearAutorModel($datos);
            if ($respuesta2) {

                //realizamos el update sobre el id de envio de autor
                $estado = "true";
                $respuesta3 = AutorModel::activarIdEnvioAutor($datos['idEnvioActivar'], $estado);

                if ($respuesta3) {

                    echo "ok";
                } else {
                    echo "error3";
                }

            } else {
                echo "error2";
            }
        }
    }


    /*Ver los autores Activos*/
    static public function mostrarListaAutoresActivosController()
    {
        $respuesta = AutorModel::listaAutoresActivos();


        foreach ($respuesta as $dato) {

            $fecha = strtotime($dato['au_fecha_creacion']);
            $fechaFormato = date('d-m-Y', $fecha);

            echo '
            <tr>
            <td>' . $dato['au_nombre'] . '</td>
            <td>' . $dato['au_identificacion'] . '</td>
            <td>' . $dato['au_telefono'] . '</td>
            <td>' . $dato['au_email'] . '</td>
            <td>' . $dato['au_organizacion'] . '</td>
            <td>' . $dato['au_ciudad'] . '</td>
            <td>' . $fechaFormato . '</td>
            <td>
            <a class="btn btn-primary btn-xs" href="crear_autor.php?cedula=' . $dato['au_identificacion'] . '"><i class="fa fa-edit"></i></a>
            <a class="btn btn-warning btn-xs" href="../../views/autor.php?autor=' . $dato['au_nombre_guion'] . '"><i class="fa fa-eye"></i></a>
            </td>
</tr>
            ';
        }


    }
}


/*============================================
RECEPCION DE PETICIONES POST
============================================*/

//Creacion de un formulario en limpio
if (isset($_POST['identificacionAutorLimpio'])) {
    $a = NEW AutorController();

    $a->identificacionAutor = Funciones::limpiarCadena($_POST['identificacionAutorLimpio']);
    $a->nombreAutor = Funciones::limpiarCadena($_POST['nombreAutor']);
    $a->telefonoAutor = Funciones::limpiarCadena($_POST['telefonoAutor']);
    $a->emailAutor = Funciones::limpiarCadena($_POST['emailAutor']);
    $a->profesionAutor = Funciones::limpiarCadena($_POST['profesionAutor']);
    $a->descripcionAutor = Funciones::limpiarCadena($_POST['descripcionAutor']);
    $a->ciudadAutor = Funciones::limpiarCadena($_POST['ciudadAutor']);
    $a->direccionAutor = Funciones::limpiarCadena($_POST['direccionAutor']);
    $a->organizacionAutor = Funciones::limpiarCadena($_POST['organizacionAutor']);
    $a->fotoAutor = $_POST['fotoAutor'];
    $a->crearAutorFomularioLimpio();
}


//Activacion o creacion a partir de UN ID
if (isset($_POST['identificacionAutorActivar'])) {
    $b = NEW AutorController();
    $b->identificacionAutor = Funciones::limpiarCadena($_POST['identificacionAutorActivar']);
    $b->nombreAutor = Funciones::limpiarCadena($_POST['nombreAutor']);
    $b->telefonoAutor = Funciones::limpiarCadena($_POST['telefonoAutor']);
    $b->emailAutor = Funciones::limpiarCadena($_POST['emailAutor']);
    $b->profesionAutor = Funciones::limpiarCadena($_POST['profesionAutor']);
    $b->descripcionAutor = Funciones::limpiarCadena($_POST['descripcionAutor']);
    $b->ciudadAutor = Funciones::limpiarCadena($_POST['ciudadAutor']);
    $b->direccionAutor = Funciones::limpiarCadena($_POST['direccionAutor']);
    $b->organizacionAutor = Funciones::limpiarCadena($_POST['organizacionAutor']);
    $b->fotoAutor = $_POST['fotoAutor'];
    $b->idEnvio = $_POST['idEnvioActivar'];
    $b->crearAutorFormularioEnvioPorId();
}

?>