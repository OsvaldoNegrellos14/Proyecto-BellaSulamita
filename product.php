<?php
include_once './backend/modelo/BD.php';
include_once './backend/controlador/CProducto.php';
include_once './backend/modelo/MProducto.php';
include_once './backend/controlador/CCategoria.php';
include_once './backend/modelo/MCategoria.php';
$producto = new CProducto();
$categoria = new CCategoria();
$ide = $_GET["id"];
$produ = $producto->mostrarProducto($ide);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $produ["nombre"]?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="style/css.css"/>
        <link rel="stylesheet" href="style/font-awesome.min.css">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Bella Sulamita</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php echo $categoria->mostrarTodasCategorias() ?>
                        </div>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="products.php">Nuestros Productos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ubicación.php">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>




        <div class="container">
            <h1 class="jumbotron-heading"><?php echo $produ["nombre"] ?></h1>
            <div class="row">
                <div class="col-6 mt-5">
                    <img src="<?php echo $produ["imagen"] ?>" class="d-block w-100">
                </div>
                <div class="col-6 mt-5">

                    <h3 class="text-justify">COLOR:</h3><p><?php echo $produ["color"] ?></p>
                    <br>
                    <h3 class="text-justify">TALLA:</h3><p><?php echo $produ["talla"] ?></p>
                    <br>
                    <h3 class="text-justify">MARCA:</h3><p><?php echo $produ["marca"] ?></p>
                    <br>
                    <h3 class="text-justify">MARCA:</h3><p>$<?php echo $produ["precio"] ?>.99</p>
                    <br>
                    <h3 class="text-justify">DESCRIPCIÓN:</h3>
                    <p class="text-justify"><?php echo $produ["description"] ?></p>
                </div>
            </div>
        </div>
        <br>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <h2>Follow us on</h2>
                        <a href="#"><i class="fa fa-facebook fa-3x"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-3x"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-3x"></i></a>
                        <a href="#"><i class="fa fa-snapchat-ghost fa-3x"></i></a>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
