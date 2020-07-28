<?php

require_once 'conexion.php';

class LogoModelVista
{
    public function mostrarLogoInicio($id)
    {
        $connec = @ConexionDB::conexion();
        $sql = "SELECT * FROM logo WHERE id = :id";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':id', $id, PDO::PARAM_INT);
        $stament->execute();
        $respuesta = $stament->fetch();
        return $respuesta;

    }
}

?>