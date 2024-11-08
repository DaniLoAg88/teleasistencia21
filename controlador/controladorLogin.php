<?php
session_start();
$errores = array();
include_once("validaciones.php");
validarVacio($_POST["username"], "Nombre Usuario");
validarVacio($_POST["contrasenia"], "Contrasenia");
if (count($errores) > 0) {
    foreach ($errores as $error) {
        $todosLosErrores .= $error;
    }
    header("Location: ../vista/login.php?errores=$todosLosErrores");
} else {
    include_once "../modelo/conexion.php";
    $link=conectar();
    $consultaUser="select username,contrasenia,idAsistente from asistente where username='".$_POST['username']."'" ;
    $resultadoUser=mysqli_query($link,$consultaUser);
    $datosUsuario=mysqli_fetch_assoc($resultadoUser);
    if ($datosUsuario){
        // ahora si el usuario es correcto, comprobamos la contraseña

        if (password_verify($_POST['contrasenia'],$datosUsuario['contrasenia'])){
            $_SESSION['username']=$datosUsuario['username'];
            $_SESSION["idAsistente"] = $datosUsuario['idAsistente'];
            $_SESSION["username"] = $datosUsuario['username'];
            header("Location:../vista/dashboard.php");
        }else{
            header('Location:../vista/login.php?error=Error en el password');
        }
    }else{
        header('Location:../vista/login.php?error=El usuario no es valido');
    }
}