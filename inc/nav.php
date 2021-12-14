<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
        <a class="navbar-brand" href="index.php"><img src="https://imagenpng.com/wp-content/uploads/2017/05/Apple_Logo_Png_06.png"
                width="30" height="30" class="d-inline-block align-top" alt=""></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link disabled" href="index.php">TIENDA | NESSZ</a>
                </li>
            </ul>
            <?php if(isset($_SESSION['correo'])){ ?>
                <div class="navbar-right">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="area_privada.php"><?php echo $_SESSION['correo']; ?> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="salir.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            <?php }else { ?>
                <div class="navbar-right">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="entrar.php">Entrar/Registro</a>
                        </li>
                    </ul>
                </div>
            <?php }?>
        </div>
    </div>
</nav>
