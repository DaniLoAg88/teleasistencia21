<?php
include_once "header.php";
include_once "../modelo/conexion.php";
?>
<div class="container">
    <h1 class="centrado">Formulario de Llamadas</h1>
    <form action="../controlador/controladorLlamadas.php" method="post">
        <div class="formulario unaColumna">
            <div>
                <!--MOTIVO DE LLAMADA-->
                <p>
                    <label for="idMotivo">Motivo de la llamada</label>
                    <select name="idMotivo" id="idMotivo">
                        <option value=""></option>
                        <?php
                        $link=conectar();
                        $consulta="SELECT * FROM motivo";
                        $resultado=mysqli_query($link,$consulta);
                        while ($fila=mysqli_fetch_assoc($resultado)){
                            echo "<option value='$fila[idMotivo]'>$fila[nombreMotivo]</option>";
                        }
                        ?>
                    </select>
                </p>
                <!--Tipo de llamada-->
                <p>
                    <label for="llamadas">Tipo de llamada</label>
                    <select name="llamadas" id="llamadas">
                        <option value=""></option>
                        <option value="1">Entrante</option>
                        <option value="0">Saliente</option>

                    </select>
                </p>
                <!--FECHA-->
                <p>
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha">
                </p>
                <!--Descripcion de la llamada-->
                <p>
                    <label for="descripcion">Descripción de la llamada</label>
                    <textarea cols="70" rows="10" name="descripcion" id="descripcion"></textarea>
                </p>
            </div>
        </div>
        <!--BOTON-->
        <div class="enviarBoton padding">
            <input type="submit" name="enviarFormulario" value="Siguiente →" class="boton">
            <p class="error">
                <?php if (!empty($_GET["errores"])) {
                    echo $_GET["errores"];
                } ?>
            </p>
        </div>
</form>
</div>
</div>
</body>
</html>
