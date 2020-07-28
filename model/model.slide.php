<?php

require_once 'model.conexion.php';

class ModelSlide
{

    static public function listarProyectosActivos()
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM  proyecto, categoria WHERE pro_estado = 'true' AND cat_id = pro_id_categoria";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();
        return $respuesta;
    }
}

?>