<?php
include_once "header.php";
include_once "../modelo/conexion.php";
?>
<div class="container">
    <h1 class="centrado">Formulario de Alta</h1>
    <form action="../controlador/controladorAlta.php" method="post">
        <div class="formulario dosColumnas">
            <div class="izquierda">
                <!--NOMBRE-->
                <p><label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </p>
                <!--PRIMER APELLIDO-->
                <p>
                    <label for="primerApellido">Primer Apellido</label>
                    <input type="text" name="primerApellido" id="primerApellido">
                </p>
                <!--SEGUNDO APELLIDO-->
                <p>
                    <label for="segundoApellido">Segundo Apellido</label>
                    <input type="text" name="segundoApellido" id="segundoApellido">
                </p>
                <!--FECHA DE NACIMIENTO-->
                <p>
                    <label for="fNacimiento">Fecha Nacimiento</label>
                    <input type="date" name="fNacimiento" id="fNacimiento">
                </p>
                <!--NSS-->
                <p>
                    <label for="NSS">Número de la Seguridad Social</label>
                    <input type="text" name="NSS" id="NSS">
                </p>
                <!--TELEFONO-->
                <p><label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono">
                </p>
                <!--ESTADO CIVIL-->
                <p>
                    <label for="idEstadoCivil">Estado Civil</label>
                    <select name="idEstadoCivil" id="idEstadoCivil">
                        <option value=""></option>
                        <?php
                        $link=conectar();
                        $consulta="SELECT * FROM ecivil";
                        $resultado=mysqli_query($link,$consulta);
                        while ($fila=mysqli_fetch_assoc($resultado)){
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
                        <option value=""></option>
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                        <option value="no-especificar">No especificar</option>
                    </select>
                </p>
                <!--RANGO DE EDAD-->
                <p>
                    <label for="rangoEdad">Rango Edad</label>
                    <select name="rangoEdad" id="rangoEdad">
                        <option value=""></option>
                        <option value="18-25">De 18 a 25 años</option>
                        <option value="25-50">De 25 a 50 años</option>
                        <option value="50">A partir de 50 años</option>
                    </select>
                </p>
                <!--DIRECCION-->
                <p>
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion">
                </p>
                <!--CÓDIGO POSTAL-->
                <p>
                    <label for="cp">Código Postal</label>
                    <input type="text" name="cp" id="cp">
                </p>
                <!--LOCALIDAD-->
                <p>
                    <label for="localidad">Localidad</label>
                    <input type="text" name="localidad" id="localidad">
                </p>
                <!--PROVINCIA-->
                <p>
                    <label for="idProvincia">Provincia</label>
                    <select name="idProvincia" id="idProvincia">
                        <option value=""></option>
                        <?php
                        $link=conectar();
                        $consulta="SELECT * FROM provincia";
                        $resultado=mysqli_query($link,$consulta);
                        while ($fila=mysqli_fetch_assoc($resultado)){
                            echo "<option value='$fila[idProvincia]'>$fila[nombreProvincia]</option>";
                        }
                        ?>
                    </select>
                </p>
                <!--TIPO DE BENEFICIARIO-->
                <p>
                    <label for="tipoBeneficiario">Tipo de Beneficiario</label>
                    <select name="tipoBeneficiario" id="tipoBeneficiario">
                        <option value=""></option>
                        <option value="discapacidad">Discapacidad</option>
                        <option value="enfermedad">Enfermedad</option>
                        <option value="soledad">Soledad</option>
                    </select>
                </p>
            </div>
            </div>
            <!--BOTON-->
            <div class="enviarBoton container">
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