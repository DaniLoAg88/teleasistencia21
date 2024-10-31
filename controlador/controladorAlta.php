<? phpsession_start();
include_once("validaciones.php");
$errores = array();
validarTexto($_REQUEST["nombre"], "nombre");
validarTexto($_REQUEST["primerApellido"], "primer apellido");
validarEdad($_REQUEST["fNacimiento"]);
validarTelefono($_REQUEST["telefono"]);
validarVacio($_REQUEST["direccion"], "La direccion");
validarCpostal($_REQUEST["cp"]);
validarVacio($_REQUEST["localidad"], "La localidad");
//VALIDAMOS EL NUMERO SEGURIDAD SOCIAL???????????????????????????????
if (count($errores) > 0) {
    foreach ($errores as $error) {
        $todosLosErrores .= $error;
    }
    header("Location: ../vista/formAlta.php?errores=$todosLosErrores");
} else {
    $_SESSION["insertarAsistido"] = "insert into asistido (nombre, primerApellido, segundoApellido, fNacimiento, NSS, telefono, sexo, rangoEdad, tipoBenificiario, direccion, cp, localidad, idEstadoCivil, idProvincia, idContacto) values
                                                                                                                                                                                                                        ('" . $_REQUEST["nombre"] . "',
                                                                                                                                                                                                                          '" . $_REQUEST["primerApellido"] . "',                    '" . $_REQUEST["segundoApellido"] . "',                    '" . $_REQUEST["fNacimiento"] . "',                    " . $_REQUEST["NSS"] . ",                    " . $_REQUEST["telefono"] . ",                    '" . $_REQUEST["sexo"] . "',                    '" . $_REQUEST["rangoEdad"] . "',                    '" . $_REQUEST["tipoBeneficiario"] . "',                    '" . $_REQUEST["direccion"] . "',                    " . $_REQUEST["cp"] . ",                    '" . $_REQUEST["localidad"] . "',                    " . $_REQUEST["idEstadoCivil"] . ",                    " . $_REQUEST["idProvincia"] . ",";
    echo $_SESSION["insertarAsistido"];
    //            ".$_REQUEST["idContacto"].")"; Lo meteremos en el siguiente controlador//
//    header("Location: ../vista/formContacto.php");
}
