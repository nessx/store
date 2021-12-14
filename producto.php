<?php 
    include('inc/conexion.php'); 
    if( isset($_GET["id"] )) {
        $id = $_GET["id"];
        /* READING DATA */
        $query = "SELECT * FROM productos WHERE id_producto=$id";

        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_array($result);
    }
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Producto | <?php echo $row["nombre"]; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap4.css">
    </head>
    <body>
        <?php include('inc/nav.php'); ?>
        <div class="container mt-5">
            <div class="col-md-14">
                <p class="h2 pt-4">Producto: <?php echo $row["nombre"]; ?></p>
                <hr>
                <div class="d-flex justify-content-center container mt-5">
                <div class="card p-3 bg-white col-sm-6"></i>
                    <div class="about-product text-center mt-2"><img src="https://st4.depositphotos.com/14953852/24787/v/600/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" width="400">
                        <div>
                            <h4><?php echo $row["nombre"]; ?></h4>
                            <h6 class="mt-0 text-black-50"><?php echo $row["descripcion"]; ?></h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between total font-weight-bold mt-4"><span>Precio </span><span><?php echo $row["precio"]; ?>€</span></div>
                    <div class="d-flex justify-content-between"><span>Vendedor: <?php echo $row["vendedor"]; ?></span></div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>