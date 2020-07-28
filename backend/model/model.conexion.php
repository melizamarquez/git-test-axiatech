<?php

class ConexionDB
{

    static public function conexion()
    {
        try {
            $conexion = NEW PDO(
                'mysql:host=localhost;dbname=axiatech',
                'root',
                '',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );/* $conexion = NEW PDO(
                'mysql:host=localhost;dbname=corporedes365',
                'gustavomp',
                'Corporedes20172017'
            );*/

            if ($conexion) {
                return $conexion;
            } else {
                die("Error de Conexion con Bases de Datos");
            }


        } catch (PDOException $e) {
            die($e->getMessage());

        }


    }

}


?>