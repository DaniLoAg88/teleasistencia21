<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teleasistencia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="menu">
        <div>
         <!--Aqui iria el logo-->
        </div>
        <!--Inicio de sesion-->
        <div>
            <?php
            session_start();
            if (isset($_SESSION["username"])){
                echo $_SESSION['username'].'<a href="../controlador/controladorLogout.php" class="icono"><img src="img/logout.svg" alt="Cerrar Sesion"></a>' ;
            }else{
                ?>
                <a href="login.php" class="icono"><img src="img/login.svg" alt="Iniciar Sesion"></a>
                <?php
            }
            ?>
        </div>
        <div>
            <?php
            if (isset($_SESSION["username"])){
                ?>
            <a href="formAlta.php">Alta</a>
            <a href="formCitas.php">Citas</a>
            <a href="dashboard.php">Listado</a>
            <?php
            }
            ?>
        </div>
    </div>

</body>
</html>