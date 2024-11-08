<?php
include_once "header.php";
include_once "../modelo/conexion.php";
$link = conectar();
$consultaFicha = "select * from asistido where idAsistido=" . $_GET['id'];
$resultadoFicha = mysqli_query($link, $consultaFicha);
$asistidos[] = mysqli_fetch_assoc($resultadoFicha);
foreach ($asistidos as $asistido) {

    ?>
    <div class="container">
        <h1 class="centrado">Formulario de Alta</h1>
        <form action="" method="post">
            <div class="formulario dosColumnas">
                <div class="izquierda">
                    <!--NOMBRE-->
                    <p>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $asistido["nombre"]; ?>">
                    </p>
                    <!--PRIMER APELLIDO-->
                    <p>
                        <label for="primerApellido">Primer Apellido</label>
                        <input type="text" name="primerApellido" id="primerApellido"
                               value="<?php echo $asistido["primerApellido"]; ?>">
                    </p>
                    <!--SEGUNDO APELLIDO-->
                    <p>
                        <label for="segundoApellido">Segundo Apellido</label>
                        <input type="text" name="segundoApellido" id="segundoApellido"
                               value="<?php echo $asistido["segundoApellido"]; ?>">
                    </p>
                    <!--FECHA DE NACIMIENTO-->
                    <p>
                        <label for="fNacimiento">Fecha Nacimiento</label>
                        <input type="date" name="fNacimiento" id="fNacimiento"
                               value="<?php echo $asistido["fNacimiento"]; ?>">
                    </p>
                    <!--NSS-->
                    <p>
                        <label for="NSS">Número de la Seguridad Social</label>
                        <input type="text" name="NSS" id="NSS" value="<?php echo $asistido["NSS"]; ?>">
                    </p>
                    <!--TELEFONO-->
                    <p><label for="telefono">Telefono</label>
                        <input type="text" name="telefono" id="telefono" value="<?php echo $asistido["telefono"]; ?>">
                    </p>
                    <!--ESTADO CIVIL-->
                    <p>
                        <label for="idEstadoCivil">Estado Civil</label>
                        <select name="idEstadoCivil" id="idEstadoCivil" value="<?php echo $asistido[""]; ?>">
                            <option value=""></option>
                            <?php
                            $link = conectar();
                            $consulta = "SELECT * FROM ecivil";
                            $resultado = mysqli_query($link, $consulta);
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<option value='$fila[idEstadoCivil]'>$fila[nombreEstadoCivil]</option>";
                            }
                            ?>
                        </select>
                    </p>
                </div>
                <div class="derecha">
                    <!--SEXO-->
                    <p>
                        <label for="sexo">Sexo</label>
                        <select name="sexo" id="sexo">
                            <option value="<?php echo $asistido["sexo"]; ?>"> <?= $asistido["sexo"] ?></option>
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="no-especificar">No especificar</option>
                        </select>
                    </p>
                    <!--RANGO DE EDAD-->
                    <p>
                        <label for="rangoEdad">Rango Edad</label>
                        <select name="rangoEdad" id="rangoEdad">
                            <option value="<?= $asistido["rangoEdad"] ?>"> <?= $asistido["rangoEdad"] ?>  </option>
                            <script>
                                rangoEdad = document.querySelector("#rangoEdad").value;
                                select=document.querySelector("#rangoEdad");

                                let edades = ["18-25", "25-50", "50"];
                                edades.forEach(function (edad, indice) {
                                    opcion = document.createElement("option");
                                    if (edad != rangoEdad) {
                                        opcion.textContent = edad;
                                        opcion.value = edad;
                                        select.appendChild(opcion);
                                    }
                                })
                            </script>
                        </select>
                    </p>
                <!--DIRECCION-->
                <p>
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $asistido["direccion"]; ?>">
                </p>
                <!--CÓDIGO POSTAL-->
                <p>
                    <label for="cp">Código Postal</label>
                    <input type="text" name="cp" id="cp" value="<?php echo $asistido["cp"]; ?>">
                </p>
                <!--LOCALIDAD-->
                <p>
                    <label for="localidad">Localidad</label>
                    <input type="text" name="localidad" id="localidad" value="<?php echo $asistido["localidad"]; ?>">
                </p>
                <!--PROVINCIA-->
                <p>
                    <label for="idProvincia">Provincia</label>
                    <select name="idProvincia" id="idProvincia">
                        <option value=""></option>
                        <?php
                        $link = conectar();
                        $consulta = "SELECT * FROM provincia";
                        $resultado = mysqli_query($link, $consulta);
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='$fila[idProvincia]'>$fila[nombreProvincia]</option>";
                        }
                        ?>
                    </select>
                </p>
                <!--TIPO DE BENEFICIARIO-->
                <p>
                    <label for="tipoBeneficiario">Tipo de Beneficiario</label>
                    <select name="tipoBeneficiario" id="tipoBeneficiario">
                        <option value="<?php echo $asistido["tipoBeneficiario"]; ?>"><?= $asistido["tipoBeneficiario"] ?> </option>
                        <option value="discapacidad">Discapacidad</option>
                        <option value="enfermedad">Enfermedad</option>
                        <option value="soledad">Soledad</option>
                    </select>
                </p>
            </div>
    </div>

    </div>
    <?php
}
?>
</form>
<!--BOTON-->
<div class="enviarBoton container">
    <button class='btn editar'><img src='img/editar-ususario.svg'></button>
</div>
</div>
</body>
</html>