<?php

class Funciones
{

    /*====================================*/
    /*funcion que limpuia de caracteres especiales y devuelve el string con guiones*/
    /*====================================*/
    static public function limpiarCaracteresEspeciales($string)
    {
        $string = htmlentities($string);
        $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        $string = preg_replace('([^A-Za-z])', '-', $string);//quitando los signos raros
        $string = trim($string);
        $string = stripslashes($string);
        return strtolower($string);
    }


    //funcion de limpieza
    static public function limpiarCadena($string)
    {
        $string = trim($string);
        $string = stripslashes($string);
        return $string;

    }

}

?>