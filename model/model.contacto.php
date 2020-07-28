<?php
require_once 'model.conexion.php';


class ModelContacto
{

    static public function buscarCedulaInvestigador($cedula)
    {

        $connec = ConexionDB::conexion();
        $sql = "SELECT * FROM  autor WHERE au_identificacion = :cedula";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':cedula', $cedula, PDO::PARAM_STR);
        $stament->execute();
        $respuesta = $stament->fetch();
        return $respuesta;
    }


    static public function registrarEnvioPropuestaInvestigacionAutor($datos)
    {
        $connec = ConexionDB::conexion();
        $sql = "INSERT INTO  autor_enviado 
                    (   aue_identificacion,
                        aue_nombre,
                        aue_nombre_guion,
                        aue_telefono,
                        aue_email,
                		aue_organizacion,
                		aue_ciudad,
                		aue_direccion,
                		aue_profesion,
                		aue_fecha_envio,
                		aue_id_envio,
                		aue_estado ) VALUES 
                		(
                		:aue_identificacion,
                        :aue_nombre,
                        :aue_nombre_guion,
                        :aue_telefono,
                        :aue_email,
                        :aue_organizacion,
                        :aue_ciudad,
                        :aue_direccion,
                        :aue_profesion,
                        now(),
                        :aue_id_envio,
                        'false'
                		)";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':aue_identificacion', $datos['identificacionInvestigador'], PDO::PARAM_INT);
        $stament->bindParam(':aue_nombre', $datos['nombreInvestigador'], PDO::PARAM_STR);
        $stament->bindParam(':aue_nombre_guion', $datos['nombreInvestigadorGuiones'], PDO::PARAM_STR);
        $stament->bindParam(':aue_telefono', $datos['telefonoInvestigador'], PDO::PARAM_STR);
        $stament->bindParam(':aue_email', $datos['emailInvestigador'], PDO::PARAM_STR);
        $stament->bindParam(':aue_organizacion', $datos['nombreOrganizacion'], PDO::PARAM_STR);
        $stament->bindParam(':aue_ciudad', $datos['ciudadInvestigador'], PDO::PARAM_STR);
        $stament->bindParam(':aue_direccion', $datos['direccionInvestigador'], PDO::PARAM_STR);
        $stament->bindParam(':aue_profesion', $datos['profesionInvestigador'], PDO::PARAM_STR);
        $stament->bindParam(':aue_id_envio', $datos['numeroRegistroAletorio'], PDO::PARAM_STR);

        if ($stament->execute()) {
            return true;
        } else {
            return false;
        }

    }

    static public function registrarEnvioPropuestaInvestigacionInvestigacion($datos)
    {

        $connec = ConexionDB::conexion();
        $sql = "INSERT INTO  proyecto_enviado 
                    ( 
                      proe_id_envio,
                      proe_titulo,
                      proe_titulo_guiones,
                      proe_url_documento,
                      proe_id_categoria,
                      proe_descripcion,
                      proe_fecha_enviado,
                      proe_estado
                    ) VALUES 
                		(
                	  :proe_id_envio,
                	  :proe_titulo,
                	  :proe_titulo_guiones,
                      :proe_url_documento,
                      :proe_id_categoria,
                      :proe_descripcion,
                      now(),
                      'false'
                		)";
        $stament = $connec->prepare($sql);
        $stament->bindParam(':proe_id_envio', $datos['numeroRegistroAletorio'], PDO::PARAM_INT);
        $stament->bindParam(':proe_url_documento', $datos['urlInvestigacion'], PDO::PARAM_STR);
        $stament->bindParam(':proe_titulo', $datos['nombreInvestigacion'], PDO::PARAM_STR);
        $stament->bindParam(':proe_titulo_guiones', $datos['nombreInvestigacionGuiones'], PDO::PARAM_STR);
        $stament->bindParam(':proe_id_categoria', $datos['categoriaInvestigacion'], PDO::PARAM_INT);
        $stament->bindParam(':proe_descripcion', $datos['descripcionInvestigacion'], PDO::PARAM_STR);

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

}


?>