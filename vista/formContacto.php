<?php
include_once "header.php";
include_once "../modelo/conexion.php"
?>
<div class="container">
    <h1>Persona de Contacto</h1>
    <form action="../controlador/controladorContacto.php" method="post">
        <div class="formulario dosColumnas flex">

            <!--PRIMERA COLUMNA-->
            <div class="izquierda">
                <!--NOMBRE-->
                <p>
                    <label for="nombreContacto">Nombre</label>
                    <input type="text" name="nombreContacto" id="nombreContacto">
                </p>
                <!--Apellidos-->
                <p>
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellido" id="apellido">
                </p>
                <!--TELEFONO-->
                <p>
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono">
                </p>
                <!--DIRECCION-->
                <p>
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion">
                </p>

                <!--TIENE LLAVES-->
                <p>
                    <label for="tieneLlaves">¿Tiene llaves?</label>
                    <input type="radio" name="tieneLlaves" id="tieneLlaves" value="1">Sí
                    <input type="radio" name="tieneLlaves" id="tieneLlaves" value="0">No
                </p>

            </div>
            <!--SEGUNDA COLUMNA-->
            <div class="derecha">

                <!--CODIGO POSTAL-->
                <p>
                    <label for="cp">Código Postal</label>
                    <input type="text" name="cp" id="cp">
                </p>
                <!--LOCALIDAD-->
                <p>
                    <label for="localidad">Localidad</label>
                    <input type="text" name="localidad" id="localidad">
                </p>
                <!--DISTANCIA-->
                <p>
                    <label for="distancia">Distancia en KM al domicilio</label>
                    <input type="text" name="distancia" id="distancia">
                </p>
                <!--RELACION-->
                <p>
                    <label for="idRelacion">Relación</label>
                    <select name="idRelacion" id="idRelacion">
                        <option value=""></option>
                        <?php
                        $link = conectar();
                        $consulta = "SELECT * FROM relacion";
                        $resultado = mysqli_query($link, $consulta);
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='$fila[idRelacion]'>$fila[nombreRelacion]</option>";
                        }
                        ?>
                    </select>
                </p>

            </div>


        </div>


        <!--BOTON-->
        <div class="enviarBoton container">
            <input type="submit" name="enviarFormulario" value="Enviar" class="boton">
            <p class="error">
                <?php
                if (!empty($_GET["errores"])) {
                    echo $_GET["errores"];
                }
                ?>
            </p>
        </div>


</div>
</form>
</div>
</body>
</html>