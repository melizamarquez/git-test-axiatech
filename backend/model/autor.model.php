<?php
require_once 'model.conexion.php';

class AutorModel
{
    /*Funcin que mostrara todos los listados enviados, activos y los que no*/
    static public function listarProyectosEnviadosModel()
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM autor_enviado, proyecto_enviado WHERE aue_id_envio = proe_id_envio ORDER BY aue_estado DESC";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();

        return $respuesta;
    }


    /*Funcion que devolvera informacion del autor, si ya esta activo por la cedula*/
    static public function imprimirAutorCedula($cedulaGet)
    {
        $connec = ConexionDB::conexion();
        $sql = "select * from autor where au_identificacion = :cedula";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':cedula', $cedulaGet, PDO::PARAM_STR);
        $stament->execute();
        $respuesta = $stament->fetch();
        return $respuesta;
    }


    /*Funcion que devuelve la informacion de acutor enviado por ID*/
    static public function imprimirAutorEnviado($idAutor)
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM autor_enviado WHERE aue_id = :aue_id";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':aue_id', $idAutor, PDO::PARAM_STR);
        $stament->execute();
        $respuesta = $stament->fetch();
        return $respuesta;
    }


    /*Funcion que devuelve las ciudades*/
    static public function listaCiudades()
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM ciudades";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();
        return $respuesta;
    }


    /*Funcion que insertara el nuevo autor en la BD
    */
    static public function crearAutorModel($datos)
    {

        $connec = ConexionDB::conexion();
        $sql = "INSERT INTO autor
                (au_identificacion, 
                au_nombre, 
                au_nombre_guion, 
                au_telefono, 
                au_email, 
                au_organizacion, 
                au_ciudad, 
                au_direccion, 
                au_profesion, 
                au_descripcion, 
                au_redes_sociales, 
                au_foto,
                au_fecha_creacion, 
                au_fecha_update)
                VALUES
                  (:au_identificacion, 
                  :au_nombre, 
                  :au_nombre_guion, 
                  :au_telefono, 
                  :au_email, 
                  :au_organizacion, 
                  :au_ciudad, 
                  :au_direccion, 
                  :au_profesion, 
                  :au_drescripcion, 
                  '', 
                  :au_foto,
                  now(), 
                  now());
               ";
        $stament = $connec->prepare($sql);

        $stament->bindParam(":au_identificacion", $datos['identificacionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_nombre", $datos['nombreAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_nombre_guion", $datos['nombreAutorGuiones'], PDO::PARAM_STR);
        $stament->bindParam(":au_telefono", $datos['telefonoAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_email", $datos['emailAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_organizacion", $datos['organizacionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_ciudad", $datos['ciudadAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_direccion", $datos['direccionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_profesion", $datos['profesionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_drescripcion", $datos['descripcionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_foto", $datos['fotoAutor'], PDO::PARAM_STR);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /*Funcion que activara con un updte la informacion del id de envio*/
    static public function activarIdEnvioAutor($id, $estado)
    {
        $connec = ConexionDB::conexion();
        $sql = "UPDATE autor_enviado SET aue_estado = :aue_estado WHERE aue_id = :aue_id";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':aue_estado', $estado, PDO::PARAM_STR);
        $stament->bindParam(':aue_id', $id, PDO::PARAM_STR);
        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /*Funcion que realizara el update sobre autor*/
    static public function actializarAutorModel($datos)
    {
        $connec = ConexionDB::conexion();
        $sql = "
UPDATE autor
                SET au_nombre = :au_nombre, 
                au_nombre_guion = :au_nombre_guion, 
                au_telefono = :au_telefono, 
                au_email = :au_email, 
                au_organizacion = :au_organizacion, 
                au_ciudad = :au_ciudad, 
                au_direccion = :au_direccion, 
                au_profesion = :au_profesion, 
                au_descripcion = :au_descripcion,
                au_foto = :au_foto,
                au_fecha_update = now()
                WHERE au_identificacion = :au_identificacion;
 ";

        $stament = $connec->prepare($sql);

        $stament->bindParam(":au_nombre", $datos['nombreAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_nombre_guion", $datos['nombreAutorGuiones'], PDO::PARAM_STR);
        $stament->bindParam(":au_telefono", $datos['telefonoAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_email", $datos['emailAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_organizacion", $datos['organizacionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_ciudad", $datos['ciudadAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_direccion", $datos['direccionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_profesion", $datos['profesionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_descripcion", $datos['descripcionAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_foto", $datos['fotoAutor'], PDO::PARAM_STR);
        $stament->bindParam(":au_identificacion", $datos['identificacionAutor'], PDO::PARAM_STR);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }


    //Funcion que devuleve todos los autores activos
    static public function listaAutoresActivos()
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM autor";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();
        return $respuesta;
    }
}

?>