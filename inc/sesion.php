<?php 
    $correo = $_SESSION['correo'];
    if(!isset($_SESSION['correo'])){ 
        header('location: entrar.php');
    }
?>