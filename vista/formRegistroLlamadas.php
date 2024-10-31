<?php include_once "header.php";?>
<div class="container">
    <h1 class="centrado">Ficha Asistido</h1>
    <div>
        <!--PHP CON LA BÚSQUEDA-->
    </div>
    <form action="SELF" method="post">
        <div class="formulario dosColumnas">
            <h2 class="centrado">Registro de Llamada</h2>
            <div class="centrado">
                <!--TIPO DE LLAMADA-->
                <p>
                    <label for="tipo">Tipo de Llamada</label>
                    <select name="tipo" id="tipo">
                        <option value=""></option>
                        <option value="entrante">Entrante</option>
                        <option value="saliente">Saliente</option>
                    </select>
                </p>
                <!--MOTIVO-->
                <p>
                    <label for="motivo">Motivo</label>
                    <select name="motivo" id="motivo">
                        <option value=""></option>
                        <option value="informativa">Informativa</option>
                        <option value="emergencia">Emergencia</option>
                        <option value="sugerencia">Sugerencia</option>
                        <option value="reclamacion">Reclamacion</option>
                        <option value="agenda">Agenda</option>
                        <option value="seguimiento">Seguimiento</option>
                    </select>
                </p>
                <!--FECHA-->
                <p><label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha">
                </p>
                <!--HORA-->
                <p>
                    <label for="hora">Hora</label>
                    <input type="text" name="hora" id="hora">
                </p>
                <!--DESCRIPCIÓN-->
                <p>
                    <textarea id="descripcion" cols="52px" rows="7" placeholder="Descripción" name="descripcion"></textarea>

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
</div>
</body>
</html>