<?php
/** * @param $valor
 * * @param $variable
 * * @return void
 * * Función que recibe un valor y el campo al que hace referencia. Insertará un error en la variable global en caso de estar vacío. */
function validarVacio($valor, $variable)
{
    global $errores;
    if (empty($valor)) {
        $errores[] = "<p class='error'>$variable no puede estar vacio</p>";
    }
}

/** * @param $texto
 * * @param $variable
 * * @return void
 * * Función que valida cualquier texto, insertará un error en la variable global en caso de estar vacío o tener algún número */
function validarTexto($texto, $variable)
{
    global $errores;
    if (empty($texto) || !is_string($texto) || preg_match("/[0-9]/", $texto)) { // Si no es un String o contiene números
        $errores[] = "<p class='error'>El $variable no puede estar vacio ni contener numeros</p>";
    }
}

/** * @param $fecha
 * * @return void
 * * @throws Exception
 * * Función que recibe una fecha de nacimiento y calcula si la edad actual es de al menos 18 años. En caso contrario insertará un error * en la variable global.*/
function validarEdad($fecha)
{
    global $errores;
    $fechaN = new DateTime($fecha);
    //La variable leida de fecha de nacimiento la creamos como tipo dateTime
    $fechaActual = new DateTime(); //Leemos la fecha actual
    $diferencia = $fechaActual->diff($fechaN);
    //Calculamos la diferencia entre las 2 fechas    //Obtener la edad en años
    $edad = $diferencia->y;
    if ($edad < 18) {
        $errores[] = "<p class='error'>Tienes $edad anios. La edad minima para matricularse son 18 anios</p>";
    }
}

function validarTelefono($telefono)
{
    global $errores;
    if (empty($telefono) || !is_numeric($telefono) || !preg_match("/^[6789]\d{8}$/", $telefono)) {
        $errores[] = "<p class='error'>El formato del telefono es incorrecto, debe comenzar por 6/7/8/9 y tener 9 digitos</p>";
    }
}

/** * @param $cp
 * * @return void
 * * Función que recibe un código postal para validarlo. Insertará un error en la variable global en caso de estar vacío o no tener 5 números. */
function validarCpostal($cp)
{
    global $errores;
    if (empty($cp) || !preg_match("/^[0-9]{5}$/", $cp)) {
        $errores[] = "<p class='error'>El codigo postal no puede estar vacio y debe contener 5 numeros</p>";
    }
}

/** * @param $filtro
 * * @return void
 * * Función que recibe la opcion de filtro seleccionada. Insertará un error en la variable global en caso de estar vacío. */
function validarFiltro($filtro)
{
    global $errores;
    if (empty($filtro)) {
        $errores[] = "<p class='error'>Debe seleccionar un filtro de busqueda</p>";
    }
}