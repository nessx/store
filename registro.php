<?php session_start(); ?>
<?php include('inc/conexion.php'); ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap4.css">
    </head>

    <body>
        <?php include('inc/nav.php'); ?>
        <div class="container mt-5">
            <div class="col-md-6">
                <p class="h2 pt-4">REGISTRO</p>
                <hr>
                <form action="#" method="post" role="form">
                    <form>
                        <div class="form-group">
                            <label>Nombre y Apellidos</label>
                            <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre y tus apellidos" required>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass" placeholder="Ingresa tu Password" required>
                        </div>
                        <button name="registro" type="submit" class="btn btn-primary">Registrarse</button>
                    </form>
                    <?php
                        if (isset($_POST['registro'])){
                            $name = mysqli_real_escape_string($con, $_POST['name']);
                            $email = mysqli_real_escape_string($con, $_POST['email']);
                            $pass = md5(mysqli_real_escape_string($con, $_POST['pass']));
                            $query = mysqli_query($con, "INSERT INTO `tienda`.`usuarios` (`nombre`, `correo`, `password`) VALUES ('$name', '$email', '$pass')");
                            $_SESSION['correo']=$email;
                            header('location:area_privada.php');
                        }
                    ?>
                <form>
            </div>
        </div>
    </body>
</html>