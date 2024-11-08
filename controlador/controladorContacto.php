<?php
session_start();

$errores = array();

include_once ("validaciones.php");
include_once ("../modelo/conexion.php");

validarTexto($_REQUEST["nombreContacto"], "nombre");
validarTexto($_REQUEST["apellido"], "primer apellido");
validarTelefono($_REQUEST["telefono"]);
validarVacio($_REQUEST["direccion"], "La direccion");
//Comprobar que la distancia es numérico
//Comprobar que tiene llaves tenga algo marcado
validarCpostal($_REQUEST["cp"]);
validarVacio($_REQUEST["localidad"], "La localidad");

if(count($errores) > 0){
    foreach ($errores as $error){
        $todosLosErrores .= $error;
    }

    header("Location: ../vista/formAlta.php?errores=$todosLosErrores");

} else {
    $link = conectar();
    $insertarContacto = "insert into contacto (nombreContacto, apellido, telefono, direccion, distancia, tieneLlaves, 
                      idRelacion, cp, localidad) values 
                    ('".$_REQUEST["nombreContacto"]."',
                    '".$_REQUEST["apellido"]."',
                    '".$_REQUEST["telefono"]."',
                    '".$_REQUEST["direccion"]."',
                    ".$_REQUEST["distancia"].",
                    ".$_REQUEST["tieneLlaves"].",
                    ".$_REQUEST["idRelacion"].",
                    ".$_REQUEST["cp"].",
                    '".$_REQUEST["localidad"]."')";
    //echo $insertarContacto;

    $resultado = mysqli_query($link, $insertarContacto);
    $idContacto = mysqli_insert_id($link); //Con ésto recuperamos el ID de la última orden que hemos metido

    //echo $_SESSION["insertarAsistido"];
    $_SESSION["insertarAsistido"] .= $idContacto.")";
//    echo $_SESSION["insertarAsistido"];

    $resultado = mysqli_query($link, $_SESSION["insertarAsistido"]);

    header("Location: ../vista/dashboard.php");
}
