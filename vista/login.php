<?php include_once "header.php"; ?>
<div class="container">
    <h1 class="centrado">Iniciar Sesión</h1>
    <form action="../controlador/controladorLogin.php" method="post">
        <div class="formulario dosColumnas">
            <div class="centrado">
                <!--NOMBRE-->
                <p>
                    <label for="username">Nombre Usuario</label>
                    <input type="text" name="username" id="username">
                </p>
                <!--CONTRASEÑA-->
                <p>
                    <label for="contrasenia">Contraseña</label>
                    <input type="password" name="contrasenia" id="contrasenia">
                </p>
            </div>
            <!--BOTON-->
            <div>
                <input type="submit" name="enviarFormulario" value="Siguiente →" class="boton">
                <p class="error">
                    <?php if (!empty($_GET["errores"])) {
                        echo $_GET["errores"];
                    } ?>
                </p>
            </div>
        </div>
    </form>
</div>
</body>
</html>