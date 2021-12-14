<?php
    session_start();
    include('inc/conexion.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv=“X-UA-Compatible“ content="IE=edge">
        <title>Home </title>
        <link rel="stylesheet" href="css/bootstrap4.css">

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body>
        <?php include('inc/nav.php'); ?>
        <section class="sections random-product">
            <div class="container-fluid">
                <div class="container">
                    <p class="h2 pt-4">Productos</p>
                    <hr>
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM productos ORDER BY id_producto DESC";
                            $result = $con->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while($product_array = $result->fetch_assoc()) {
                        ?>
                            <div class="col-md-4 pb-4">
                                <div class="card">
                                    <img class="card-img-top" src="https://st4.depositphotos.com/14953852/24787/v/600/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" alt="Card image cap"  width="400">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="producto.php?id=<?php echo $product_array["id_producto"]; ?>" class="text-dark"><?php echo $product_array["nombre"]; ?></a>
                                        </h5>
                                    </div>
                                    <div class="card-footer">
                                        <div class="badge badge-success float-right"><?php echo $product_array["precio"]; ?>€</div>
                                        <div class="float-left">
                                            <a href="#" class="text-danger"><?php echo mb_substr($product_array["descripcion"], 0, 20);  echo "..."; ?></a>
                                            <br>
                                            <small class="text-muted"><?php echo $product_array["vendedor"]; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div><!--.col-->
                        <?php
                            }
                        }else{
                            echo "<H1>NO EXISTEN PRODUCTOS</H1>";
                        }
                        ?>
                    </div><!--.row-->
                </div><!--.container-->
            </div><!--.container-fluid-->
        </section>
    </body>
</html>