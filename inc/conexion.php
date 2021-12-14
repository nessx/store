<?php
    $servidor = "localhost";
    $user = "root";
    $passwd = "";
    $bbdd = "tienda";

    $con = new mysqli($servidor, $user, $passwd, $bbdd);
    if ($con->connect_error){
        die("Error al conectarse con MYSQL: " . $con->connect_error());
    }
?>