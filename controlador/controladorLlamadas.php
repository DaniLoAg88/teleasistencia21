<?php
session_start();

include_once ("validaciones.php");
//include_once ("../modelo/conexion.php");

$errores = array();

validarFiltro($_REQUEST["filtro"]);
validarVacio($_REQUEST["busqueda"], "Busqueda");

if(count($errores) > 0){
    foreach ($errores as $error){
        $todosLosErrores .= $error;
    }

    header("Location: ../vista/formLlamada.php?errores=$todosLosErrores");

} else {
    if($_REQUEST["filtro"] == "nombre"){
        $_SESSION["busquedaLlamada"] = "select idAsistido, nombre, primerApellido, segundoApellido, idContacto from asistido where asistido.nombre like '%".$_REQUEST["busqueda"]."%'";
    }else if($_REQUEST["filtro"] == "apellido"){
        $_SESSION["busquedaLlamada"] = "select idAsistido, nombre, primerApellido, segundoApellido, idContacto from asistido where asistido.primerApellido like '%".$_REQUEST["busqueda"]."%' or segundoApellido like  '%".$_REQUEST["busqueda"]."%'";
    }


    header("Location: ../vista/dashboard.php");
}