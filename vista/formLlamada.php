<?php include_once "header.php";?>
<div class="container">
    <h1 class="centrado">Formulario de Llamadas</h1>
    <form action="SELF" method="post">
        <div class="formulario dosColumnas">
            <div class="centrado">
                <!--NOMBRE-->
                <p>
                    <label for="filtro">Filtro</label>
                    <select name="filtro" id="filtro">
                        <option value=""></option>
                        <option value="nombre">Nombre</option>
                        <option value="apellido">Apellido</option>
                        <option value="contacto">Contacto</option>
                    </select>
                </p>
                <!--BÚSQUEDA-->
                <p>
                    <label for="busqueda">Búsqueda</label>
                    <input type="text" name="busqueda" id="busqueda">
                <!--PHP FILTRO-->
                </p>
            </div>
            <!--BOTON-->
            <div class="enviarBoton">
                <input type="submit" name="enviarFormulario" value="Siguiente →" class="boton">
                <p class="error">
                    <?php if (!empty($_GET["errores"])) {
                        echo $_GET["errores"];
                    } ?>
                </p>
            </div>
        </div>
    </form>
    <div>
        <!--PHP CON LA BÚSQUEDA-->
    </div>
</div>
</body>
</html>
