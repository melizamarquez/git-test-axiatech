<?php

require_once 'model.conexion.php';

class ModelAutor
{


    static public function devuelveInformacionAutorPorNombreGuionesModel($nombreGuiones)
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM  autor WHERE au_nombre_guion = :au_nombre_guion";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':au_nombre_guion', $nombreGuiones, PDO::PARAM_STR);
        $stament->execute();
        $respuesta = $stament->fetch();
        return $respuesta;
    }

}


?>