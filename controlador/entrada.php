<?php
session_start();
if(!empty($_POST['username']) && !empty($_POST['contrasenia'])){
    // verificamos username y password
    include_once "../modelo/conexion.php";
    $link=conectar();
    $consultaUser="select username,contrasenia from usuarios where username='".$_POST['username']."'" ;
    $resultadoUser=mysqli_query($link,$consultaUser);
    $datosUsuario=mysqli_fetch_assoc($resultadoUser);
    if ($datosUsuario){
        // ahora si el usuario es correcto, comprobamos la contraseña
        if (password_verify($_POST['contrasenia'],$datosUsuario['contrasenia'])){
            $_SESSION['username']=$datosUsuario['username'];
            header("Location:../vista/dashboard.php");
        }else{
            header('Location:../vista/login2.php?error=Error en el password');

        }
    }else{
        header('Location:../vista/login2.php?error=El usuario no es valido');
    }

}else{
    header('Location:../vista/login2.php?error=Los campos son obligatorios');
}