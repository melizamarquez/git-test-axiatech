<?php

$string = "Gustavos s";


function limpiarCaracteresEspeciales($string)
{
    $string = htmlentities($string);
    $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
    $string = preg_replace('([^A-Za-z])', '-', $string);
    $string = trim($string);
    $string = stripslashes($string);
    return strtolower($string);
}

echo limpiarCaracteresEspeciales($string);

?>