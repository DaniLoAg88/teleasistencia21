<?php
session_start();
$errores = array();
include_once("validaciones.php");
validarVacio($_POST["idAsistente"], "Id");
validarVacio($_POST["contrasenia"], "Contraseña");
if (count($errores) > 0) {
    foreach ($errores as $error) {
        $todosLosErrores .= $error;
    }
    header("Location: ../vista/login.php?errores=$todosLosErrores");
} else {
    $_SESSION["idAsistente"] = $_POST["idAsistente"];
    header("Location: ../vista/dashboard.php");
}