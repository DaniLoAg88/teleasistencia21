<?php
//1. Crear nuestras contraseñas en hash
$cadena=password_hash("CEAT1234@",PASSWORD_DEFAULT);
//2. Guardamos la contraseña en la bbdd en el password
echo $cadena;
//echo "<br>";
//if (password_verify("CEAT1234@",$cadena)){
//    echo "entra";
//}else{
//    echo "no entra";
//}