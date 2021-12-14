<?php
    session_start();
    include('inc/sesion.php');
    include('inc/conexion.php');
    $result=mysqli_query($con, "select * from usuarios where correo='$correo'")or die('Error en la sesion');
    $row=mysqli_fetch_array($result);
    
    $resulta = $con->query("select COUNT(*) from productos where vendedor='$correo'");
    $row_cnt = $resulta->num_rows;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv=“X-UA-Compatible“ content="IE=edge">
        <title>Area Privada</title>
        <link rel="stylesheet" href="css/bootstrap4.css">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include('inc/nav.php'); ?>
        <section class="sections random-product">
            <div class="container-fluid">
                <div class="container">
                    <p class="h2 pt-4">Bienvenido <?php echo $row['nombre']; ?></p>
                    <hr>
        
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalLoginForm">Agregar Producto</button>
                    <hr>
                    <p class="h4 pt-4">Productos Añadidos: <?php echo $row_cnt; ?></p>
                    <!-- Modal HTML Markup -->
                    <div id="ModalLoginForm" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title">Agregar producto</h1>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="POST" action="">
                                        <div class="form-group">
                                            <label class="control-label">Nombre del Producto</label>
                                            <div>
                                                <input type="text" class="form-control input-lg" name="nombre_p" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Descipcion del producto</label>
                                            <div>
                                                <input type="text" class="form-control input-lg" name="desc_p" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Precio</label>
                                            <div>
                                                <input type="number" class="form-control input-lg" name="precio_p" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Imagen producto</label>
                                            <div>
                                                <input type="file" class="form-control" id="image" name="image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <input class="btn btn-success" type="submit" name="agregar">
                                            </div>
                                        </div>
                                    </form>
                                <div>
                            </div>
                        </div>
                    </div>
                <div>
            <div>
        <section>
    </body>
</html>
<?php
    if(isset($_POST['agregar'])){
        $nombre_p = $_POST['nombre_p'];
        $desc_p = $_POST['desc_p'];
        $precio_p = $_POST['precio_p'];
        $vendedor = $row['correo'];
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        $query = "INSERT INTO productos (`nombre`, `descripcion`, `imagen`, `precio`, `vendedor`) VALUES ('$nombre_p', '$desc_p', '$imgContent', '$precio_p', '$vendedor')";
        if ($con->query($query) === TRUE) {
            $_SERVER['PHP_SELF'];
        } else {
            echo "Error: " . $query . "<br>" . $con->error;
        }
        
    }
?>