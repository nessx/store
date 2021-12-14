<?php session_start(); ?>
<?php include('inc/conexion.php'); ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Entrar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap4.css">
    </head>

    <body>
        <?php include('inc/nav.php'); ?>
        <div class="container mt-5">
            <div class="col-md-6">
                <p class="h2 pt-4">ENTRAR</p>
                <hr>
                <form action="#" method="post" role="form">
                    <form>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass" placeholder="Ingresa tu Password">
                        </div>
                        <a href="registro.php">No tienes cuenta?, Registrate!</a> <br>
                        <button name="login" type="submit" class="btn btn-primary">Ingresar</button>
                    </form>
                    <?php
                        if (isset($_POST['login'])){
                            $email = mysqli_real_escape_string($con, $_POST['email']);
                            $pass = md5(mysqli_real_escape_string($con, $_POST['pass']));
                            $query = mysqli_query($con, "SELECT * FROM usuarios WHERE password='$pass' and correo='$email'");
                            $row = mysqli_fetch_array($query);
                            $num_row = mysqli_num_rows($query);
                            if ($num_row > 0){
                                $_SESSION['correo']=$row['correo'];
                                header('location:area_privada.php');
                            }
                            else{
                                echo '<div class="alert alert-warning" role="alert">Datos incorrectos!</div>';
                            }
                        }
                    ?>
                <form>
            </div>
        </div>
    </body>
</html>