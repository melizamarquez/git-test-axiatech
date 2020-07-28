<?php
require_once 'controller.funciones.php';
require_once '../model/model.contacto.php';

class ControllerContacto
{
    /*Funcion que buscara coincidencias con la cedula*/
    public $cedulaInvestigador;

    public function buscarCedulaInvestigador()
    {

        $cedula = $this->cedulaInvestigador;


        $respuesta = ModelContacto::buscarCedulaInvestigador($cedula);
        if ($respuesta) { // si hay datos mandamos un json con la informacion para completar en el formulario
            echo json_encode($respuesta);
        } else {
            echo "ok";  // es porque no hay datos
        }
    }

    /*Funcion que insertara la propuesta de investigacion*/
    public $nombreOrganizacion;
    public $nombreInvestigador;
    public $identificacionInvestigador;
    public $telefonoInvestigador;
    public $emailInvestigador;
    public $ciudadInvestigador;
    public $direccionInvestigador;
    public $profesionInvestigador;
    public $nombreInvestigacion;
    public $urlInvestigacion;
    public $categoriaInvestigacion;
    public $descripcionInvestigacion;

    public function registrarEnvioPropuestaInvestigacion()
    {
        $datos = [
            "nombreOrganizacion" => $this->nombreOrganizacion,
            "nombreInvestigador" => $this->nombreInvestigador,
            "nombreInvestigadorGuiones" => Funciones::limpiarCaracteresEspeciales($this->nombreInvestigador) . "-" . $this->identificacionInvestigador,
            "identificacionInvestigador" => $this->identificacionInvestigador,
            "telefonoInvestigador" => $this->telefonoInvestigador,
            "emailInvestigador" => $this->emailInvestigador,
            "ciudadInvestigador" => $this->ciudadInvestigador,
            "direccionInvestigador" => $this->direccionInvestigador,
            "profesionInvestigador" => $this->profesionInvestigador,
            "nombreInvestigacion" => $this->nombreInvestigacion,
            "nombreInvestigacionGuiones" => Funciones::limpiarCaracteresEspeciales($this->nombreInvestigacion),
            "urlInvestigacion" => $this->urlInvestigacion,
            "categoriaInvestigacion" => $this->categoriaInvestigacion,
            "descripcionInvestigacion" => $this->descripcionInvestigacion,
            'numeroRegistroAletorio' => round(microtime(true))
        ];

        $respuesta1 = ModelContacto::registrarEnvioPropuestaInvestigacionAutor($datos);
        $respuesta2 = ModelContacto::registrarEnvioPropuestaInvestigacionInvestigacion($datos);


        /*var_dump($respuesta1);
        var_dump($respuesta2);*/

        if ($respuesta1 && $respuesta2) {
            echo "ok";
        } else {
            echo "error";
        }


    }


    /*Funcion de mostrar el listbox de categorias*/
    static public function mostrarListadoCategoriasController()
    {
        $respuesta = ModelContacto::listarCategoriasModel();

        foreach ($respuesta as $dato) {
            echo '
            <option value="' . $dato['cat_id'] . '">' . $dato['cat_descripcion'] . '</option>
            ';
        }
    }
}


/*Funcion de buscar la cedula del usuario*/
if (isset($_POST['cedulaAutor'])) {

    $a = new ControllerContacto();
    $a->cedulaInvestigador = trim($_POST['cedulaAutor']);
    $a->buscarCedulaInvestigador();
}


/*Funcion que insertara el envio de la porpuesta de investigacion*/
if (isset($_POST['identificacionInvestigador'])) {
    $b = NEW ControllerContacto();
    $b->nombreOrganizacion = trim($_POST['nombreOrganizacion']);
    $b->nombreInvestigador = $_POST['nombreInvestigador'];
    $b->identificacionInvestigador = trim($_POST['identificacionInvestigador']);
    $b->telefonoInvestigador = trim($_POST['telefonoInvestigador']);
    $b->emailInvestigador = trim($_POST['emailInvestigador']);
    $b->ciudadInvestigador = trim($_POST['ciudadInvestigador']);
    $b->direccionInvestigador = trim($_POST['direccionInvestigador']);
    $b->profesionInvestigador = trim($_POST['profesionInvestigador']);
    $b->nombreInvestigacion = trim($_POST['nombreInvestigacion']);
    $b->urlInvestigacion = trim($_POST['urlInvestigacion']);
    $b->categoriaInvestigacion = trim($_POST['categoriaInvestigacion']);
    $b->descripcionInvestigacion = trim($_POST['descripcionInvestigacion']);
    $b->registrarEnvioPropuestaInvestigacion();
}
?>