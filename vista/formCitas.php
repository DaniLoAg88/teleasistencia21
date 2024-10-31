<?php
include_once "header.php";
?>

<form action="" method="post">
    <div>
        <h1>Citas</h1>
<!--Especialista-->
        <p>
            <label for="especialista">Especialista</label>
            <input type="text" name="especialista" id="especialista">
        </p>
<!--CENTRO-->
        <p>
            <label for="Centro">Centro</label>
            <input type="text" name="centro" id="centro">
        </p>
<!--HORA-->
        <p>
            <label for="hora">Hora</label>
            <select name="horas" id="horas">
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>

            </select>
        </p>
<!--FECHA-->
        <p>
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha">
        </p>

    </div>
<!--BOTON-->
    <div>
        <input type="button" name="enviarFormulario" value="Consultar">
        <p>
            <?php
            if(!empty($_GET["errores"])){
                echo $_GET["errores"];
            }
            ?>
        </p>
    </div>
    
    
    
</form>
