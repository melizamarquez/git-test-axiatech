<?php

require_once 'model.conexion.php';

class ModelProyecto
{

    static public function informacionProyectoPorTituloGuiones($tituloGuiones)
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM  proyecto, categoria, autor WHERE 
                pro_titulo_guiones = :pro_titulo_guiones AND 
                pro_id_categoria = cat_id AND 
                pro_id_autor = au_id";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':pro_titulo_guiones', $tituloGuiones, PDO::PARAM_STR);
        $stament->execute();
        $respuesta = $stament->fetch();
        return $respuesta;
    }


    static public function informacionProyectoPorIdAutor($id)
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM  proyecto, categoria WHERE 
                pro_id_categoria = cat_id AND 
                pro_id_autor = :pro_id_autor AND pro_estado = 'true'";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':pro_id_autor', $id, PDO::PARAM_STR);
        $stament->execute();
        $respuesta = $stament->fetchAll();
        return $respuesta;
    }

}

?>