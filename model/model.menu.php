<?php

require_once 'model.conexion.php';

class ModelMenu
{

    static public function listarCategorias()
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM  categoria ORDER BY cat_fecha_update";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();
        return $respuesta;
    }

    static public function listarProyectosPorCategoria($idCategoria)
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM  proyecto WHERE pro_id_categoria = $idCategoria
                AND pro_estado = 'true'";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();
        return $respuesta;
    }
}

?>