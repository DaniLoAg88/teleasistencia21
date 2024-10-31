<?php
include_once "header.php";
include_once "../modelo/conexion.php"
?>
<form action="../controlador/controladorContacto.php" method="post">
    <div>
        <h1>Persona de Contacto</h1>
<!--PRIMERA COLUMNA-->
        <div>
        <!--NOMBRE-->
        <p>
            <label for="nombre">Nombre</label>
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
        <!--TIENE LLAVES-->
        <p>
            <label for="tieneLlaves">¿Tiene llaves?</label>
            <input type="radio" name="tieneLlaves" id="tieneLlaves">Sí
            <input type="radio" name="tieneLlaves" id="tieneLlaves">No

        </p>
        </div>
<!--SEGUNDA COLUMNA-->
        <div>
            <!--DIRECCION-->
            <p>
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion">
            </p>
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
                <label for="relacion">Relación</label>
                <select name="relacion" id="relacion">
                    <option value=""></option>
                    <?php
                    $link=conectar();
                    $consulta="SELECT * FROM relacion";
                    $resultado=mysqli_query($link,$consulta);
                    while ($fila=mysqli_fetch_assoc($resultado)){
                        echo "<option value='$fila[idRelacion]'>$fila[nombreRelacion]</option>";
                    }
                    ?>
                </select>
            </p>
        </div>

        <!--BOTON-->
        <div>
            <input type="button" name="enviarFormulario" value="Enviar">
            <p>
                <?php
                if(!empty($_GET["errores"])){
                    echo $_GET["errores"];
                }
                ?>
            </p>
        </div>
    </div>







</form>
