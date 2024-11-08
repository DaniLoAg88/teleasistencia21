<?php
include_once "header.php";
include_once "../modelo/conexion.php";
$link = conectar();
$busquedaAsistidos = "select * from asistido";

$resultado = mysqli_query($link, $busquedaAsistidos);
?>
<div class="container">
    <h1>Listado de Asistidos</h1>
    <?php
    if (!empty($_SESSION["busquedaLlamada"])) {
        include_once("../modelo/conexion.php");
        $link = conectar();
        $resultado = mysqli_query($link, $_SESSION["busquedaLlamada"]);
        echo "<div class='tabla container'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Primer Apellido</th>";
        echo "<th>Segundo Apellido</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";

        while ($asistido = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $asistido["idAsistido"] . "</td>";
            echo "<td>" . $asistido["nombre"] . "</td>";
            echo "<td>" . $asistido["primerApellido"] . "</td>";
            echo "<td>" . $asistido["segundoApellido"] . "</td>";
            echo "<td>
                           <button class='btn ver'><img src='img/gestion-usuarios.svg'></button>
                           <button class='btn editar'><img src='img/editar-ususario.svg'></button>
                           <button class='btn eliminar'><img src='img/borrar-ususario.svg'></button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        unset($_SESSION["busquedaLlamada"]);
    } else {
        ?>
        <div class="listado">
            <form action="" method="post">
                <!--NOMBRE-->
                <div class="flex padding">
                    <label class="padding" for="filtro">Filtro</label>
                    <select name="filtro" id="filtro" class="selectDashboard">
                        <option value=""></option>
                        <option value="nombre">Nombre</option>
                        <option value="apellido">Apellido</option>
                    </select>
                    <!--BÚSQUEDA-->

                    <label class="padding " for="busqueda">Búsqueda</label>
                    <input type="text" name="busqueda" id="busqueda" style="width: 60%">
                    <!--PHP FILTRO-->


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
            <table class="centrado">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Acciones</th>
                </tr>
                <?php
                while ($asistido = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $asistido['idAsistido'] . "</td>";
                    echo "<td>" . $asistido['nombre'] . "</td>";
                    echo "<td>" . $asistido['primerApellido'] . "</td>";
                    echo "<td>" . $asistido['segundoApellido'] . "</td>";
                    echo "<td>
                           <a href='formLlamada.php'>
                           <button class='btn ver'><img src='img/llamada-entrante.svg'</button>
                           </a>
                           <a href='ficha.php?id=" . $asistido['idAsistido'] . "'>
                           <button class='btn editar'><img src='img/gestion-usuarios.svg'></button>
                           </a>
                           <button class='btn eliminar'><img src='img/borrar-ususario.svg'></button>";
                    echo "</td>";
                    echo "</tr>";
                }

                ?>
            </table>
        </div>
        <?php
    }
    ?>
</div>



