<?php
require_once '../model/categoria.model.php';

class CategoriaController
{
    /*Funcion que insertara la categoria*/

    public $categoria;
    public $color;

    public function insertarCategoriaController()
    {

        $datos = [
            "categoria" => $this->categoria,
            "color" => $this->color
        ];

        $respuesta = CategoriaModel::insertarCategoriaModel($datos);

        if ($respuesta) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    /*Funcion que lista las categorias*/

    static public function listarCategoriasController()
    {
        $respuesta = CategoriaModel::listarCategoriasModel();

        foreach ($respuesta as $dato) {
            echo '
             <tr>
                                                <td>' . $dato['cat_descripcion'] . '</td>
                                                
                                                <td>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar"
                                                             style="width: 100%;background-color: ' . $dato['cat_color'] . ';"></div>
                                                    </div>
                                                </td>
                                                <td>' . $dato['cat_color'] . '</td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-' . $dato['cat_id'] . '">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
            ';
        }

        /*Impresion de los Modales*/
        foreach ($respuesta as $dato) {
            echo '<div class="modal fade" id="modal-' . $dato['cat_id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
                          </div>
                          <div class="modal-body">
                                           <label>Editar Categoria: </label>
                            <input type="text" class="form-control" placeholder="Contraseña usuario"
                                           id="categoria-' . $dato['cat_id'] . '" value="' . $dato['cat_descripcion'] . '">
                                            <label>Editar Color: </label>
                         
                                           
                                           <div class="input-group my-colorpicker-all">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Selecciona el color de la categoria"
                                                                   id="color-' . $dato['cat_id'] . '" value="' . $dato['cat_color'] . '">

                                                            <div class="input-group-addon">
                                                                <i></i>
                                                            </div>
                                                        </div>
                                           
                                           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="editarCategoria(' . $dato['cat_id'] . ')">Guardar Cambios</button>
                          </div>
                          <div class="modal-footer">
                            
                          </div>
                        </div>
                      </div>
                    </div>';
        }

    }


    /*Funcion para actualizar las categorias*/
    public $id;

    public function ActualizarCategoriaController()
    {
        $datos = [
            "categoria" => $this->categoria,
            "color" => $this->color,
            "id" => $this->id,
        ];

        $respuesta = CategoriaModel::actualizarCategoriaModel($datos);

        if ($respuesta) {
            echo "ok";
        } else {
            echo "error";
        }
    }


    /*Funcion de mostrar el listbox de categorias*/
    static public function mostrarListadoCategoriasController()
    {
        $respuesta = CategoriaModel::listarCategoriasModel();


        foreach ($respuesta as $dato) {
            echo '
            <option value="' . $dato['cat_id'] . '">' . $dato['cat_descripcion'] . '</option>
            ';
        }
    }
}

/*===========================================*/
/*peticiones POST*/
/*===========================================*/

/*Insertar categoria*/
if (isset($_POST['color'])) {
    $a = NEW CategoriaController();
    $a->categoria = $_POST['categoria'];
    $a->color = $_POST['color'];
    $a->insertarCategoriaController();
}


/*Actualizar categoria*/
if (isset($_POST['id-up'])) {
    $b = NEW CategoriaController();
    $b->categoria = $_POST['categoria-up'];
    $b->color = $_POST['color-up'];
    $b->id = $_POST['id-up'];
    $b->ActualizarCategoriaController();
}

?>