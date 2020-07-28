<?php
require_once 'model.conexion.php';

class ProyectosModel
{

    static public function listarProyectosEnviadosModel()
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM proyecto_enviado, categoria WHERE cat_id = proe_id_categoria";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();
        return $respuesta;
    }

    //funcion que devolvera por ID de proyecto envado, la informacion respectiva
    static public function informacionProyectoEnviadoPorId($id)
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM proyecto_enviado WHERE proe_id_envio = :proe_id_envio";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':proe_id_envio', $id, PDO::PARAM_STR);
        $stament->execute();
        $respuesta = $stament->fetch();
        return $respuesta;
    }

    //insertar la informacion de proyecto a la BD
    static public function insertarProyectoModel($datos)
    {

        $connec = ConexionDB::conexion();
        $sql = "INSERT INTO proyecto
                (pro_fecha_creacion,
                pro_fecha_alta,
                pro_titulo,
                pro_titulo_guiones,
                pro_url_video,
                pro_url_img,
                pro_url_documento,
                pro_descripcion,
                pro_parrafo_12,
                pro_parrafo_6a,
                pro_parrafo_6b,
                pro_id_autor,
                pro_id_categoria,
                pro_contador_visitas,
                pro_estado
                		)
                		VALUES 
                		(
                now(),
                :pro_fecha_alta,
                :pro_titulo,
                :pro_titulo_guiones,
                :pro_url_video,
                :pro_url_img,
                :pro_url_documento,
                :pro_descripcion,
                :pro_parrafo_12,
                :pro_parrafo_6a,
                :pro_parrafo_6b,
                :pro_id_autor,
                :pro_id_categoria,
                0,
                :pro_estado		
                		)";
        $stament = $connec->prepare($sql);
        $stament->bindParam(":pro_fecha_alta", $datos['fechaaltaProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_titulo", $datos['tituloProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_titulo_guiones", $datos['tituloGuiones'], PDO::PARAM_STR);
        $stament->bindParam(":pro_url_video", $datos['urlvideoProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_url_img", $datos['urlimagenProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_url_documento", $datos['urldocumentoProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_descripcion", $datos['descripcionProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_parrafo_12", $datos['editor12Proyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_parrafo_6a", $datos['editor6AProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_parrafo_6b", $datos['editor6Broyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_id_autor", $datos['autorProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_id_categoria", $datos['categoriaProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_estado", $datos['estadoProyecto'], PDO::PARAM_STR);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }

    }


    //actualizara el id de envio de proyecto
    static public function actualizarEstadoPorIdProyectoEnviado($id, $estado)
    {
        $connec = ConexionDB::conexion();
        $sql = "UPDATE proyecto_enviado SET proe_estado = :aue_estado WHERE proe_id_envio = :aue_id_envio";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':aue_estado', $estado, PDO::PARAM_STR);
        $stament->bindParam(':aue_id_envio', $id, PDO::PARAM_STR);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }


    //devuelve informacion de proyecto por id
    static public function informacionProyectoPorId($id)
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM proyecto WHERE pro_id = :pro_id";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':pro_id', $id, PDO::PARAM_STR);
        $stament->execute();
        $respuesta = $stament->fetch();
        return $respuesta;
    }

    //devuelve todos los proyectos
    static public function listadoProyectosModel()
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM proyecto, autor WHERE au_id = pro_id_autor";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();
        return $respuesta;
    }


    static public function actualizarInformacionProyectoModel($datos)
    {
        $connec = ConexionDB::conexion();
        $sql = "UPDATE proyecto
                SET 
                pro_fecha_alta = :pro_fecha_alta,
                pro_titulo = :pro_titulo,
                pro_titulo_guiones = :pro_titulo_guiones,
                pro_url_video = :pro_url_video,
                pro_url_img = :pro_url_img,
                pro_url_documento = :pro_url_documento,
                pro_descripcion = :pro_descripcion,
                pro_parrafo_12 = :pro_parrafo_12,
                pro_parrafo_6a = :pro_parrafo_6a,
                pro_parrafo_6b = :pro_parrafo_6b,
                pro_id_autor = :pro_id_autor,
                pro_id_categoria = :pro_id_categoria,
                pro_estado = :pro_estado
                WHERE pro_id = :pro_id";

        $stament = $connec->prepare($sql);
        $stament->bindParam(":pro_fecha_alta", $datos['fechaaltaProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_titulo", $datos['tituloProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_titulo_guiones", $datos['tituloGuiones'], PDO::PARAM_STR);
        $stament->bindParam(":pro_url_video", $datos['urlvideoProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_url_img", $datos['urlimagenProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_url_documento", $datos['urldocumentoProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_descripcion", $datos['descripcionProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_parrafo_12", $datos['editor12Proyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_parrafo_6a", $datos['editor6AProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_parrafo_6b", $datos['editor6Broyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_id_autor", $datos['autorProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_id_categoria", $datos['categoriaProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_estado", $datos['estadoProyecto'], PDO::PARAM_STR);
        $stament->bindParam(":pro_id", $datos['idProyectoUpdate'], PDO::PARAM_STR);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>