<?php
require_once 'model.conexion.php';


class CategoriaModel
{

    static public function insertarCategoriaModel($datos)
    {
        $connec = ConexionDB::conexion();
        $sql = "INSERT INTO categoria
                (cat_descripcion, cat_color, cat_fecha_creacion, cat_fecha_update)
                VALUES
                (:cat_descripcion, :cat_color, now(), now())";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':cat_descripcion', $datos['categoria'], PDO::PARAM_STR);
        $stament->bindParam(':cat_color', $datos['color'], PDO::PARAM_STR);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static public function listarCategoriasModel()
    {
        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM categoria ORDER BY cat_fecha_update DESC";
        $stament = $connec->prepare($sql);
        $stament->execute();
        $respuesta = $stament->fetchAll();

        return $respuesta;
    }

    static public function actualizarCategoriaModel($datos)
    {

        $connec = ConexionDB::conexion();
        $sql = "
              UPDATE categoria SET 
              cat_descripcion = :cat_descripcion, cat_color = :cat_color, cat_fecha_update = now()
              WHERE cat_id = :cat_id
";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':cat_descripcion', $datos['categoria'], PDO::PARAM_STR);
        $stament->bindParam(':cat_color', $datos['color'], PDO::PARAM_STR);
        $stament->bindParam(':cat_id', $datos['id'], PDO::PARAM_INT);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>