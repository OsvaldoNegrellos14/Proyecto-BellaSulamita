<?php
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MProducto.php';
include_once '../backend/controlador/CProducto.php';
$producto = new CProducto();
$ide = $_GET["id"];
session_start();
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
if (isset($_GET['aceptar']) == "Aceptar y continuar") {
    $produ = $producto->eliminarProducto($ide);
    header("Location: tablaProducto.php");
}
if (isset($_GET['cancel']) == "Cancelar") {
    header("Location: tablaProducto.php");
}
$produ = $producto->mostrarProducto($ide);
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Producto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="style/css.css" />
        <link rel="stylesheet" href="style/font-awesome.min.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
            <a class="navbar-brand" href="panel.php">Bella Sulamita</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="panel.php">Home <span class="sr-only">(current)</span></a>
                    </li>


                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="salir.php"><i class="fa fa-power-off"></i></a>
                </form>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
               <div class="col-2 collapse d-md-flex bg-dark pt-2 min-vh-100" id="sidebar">
                    <div id="panel">
                        <ul class="nav flex-column flex-nowrap">
                            <li class="nav-item">
                                <a href="panel.php"><i class="fa fa-dashboard" aria-hidden="true"></i> Inicio</a><br><br>
                                <a href="#submenu1"><i class="fa fa-plus" aria-hidden="true"></i> Agregar </a>
                                <div id="submenu1" aria-expanded="false">
                                    <ul class="flex-column pl-2 nav">
                                        <li class="nav-item">
                                            <a class="nav-link py-1" href="agregarProducto.php">Producto</a>
                                            <a class="nav-link py-1" href="agregarSlider.php">Slider</a>
                                            <a class="nav-link py-1" href="agregarCategoria.php">Categoria</a>
                                        </li>
                                    </ul>
                                </div><br>

                                <a href="#submenu2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</a>
                                <div id="submenu2" aria-expanded="false">
                                    <ul class="flex-column pl-2 nav">
                                        <li class="nav-item">
                                            <a class="nav-link py-1" href="tablaProducto.php"> Producto</a>
                                            <a class="nav-link py-1" href="tablaSlider.php"> Slider</a>
                                            <a class="nav-link py-1" href="tablaCategoria.php"> Categoria</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col pt-2">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Bienvenido <?php echo $_SESSION["autentificado"]["username"] ?></h1><hr>
                                <h2>¿Seguro que desea eliminar la foto?</h2>
                                <h5>Esta accion no se puede desahacer posteriormente</h5><br>
                                <h3>Imagen:</h3><br><img src="../<?php echo $produ["imagen"] ?> "width="200">
                            </div>
                            <div class="col-md-6">
                                <form method="GET" action="eliminarProducto.php?id=<?php echo $ide ?>" enctype="multipart/form-data">
                                    <h3>Nombre:</h3><h5><?php echo $produ["nombre"] ?></h5><hr>
                                    <h3>Descripción:</h3><p><?php echo $produ["description"] ?></p><hr>
                                    <h3>Precio:</h3><h5><?php echo $produ["precio"] ?></h5><hr>
                                    <h3>Marca:</h3><h5><?php echo $produ["marca"] ?></h5><hr>
                                    <h3>Color:</h3><h5><?php echo $produ["color"] ?></h5><hr>
                                    <h3>Talla:</h3><h5><?php echo $produ["talla"] ?></h5><hr>
                                    <input type="hidden" name="id" value="<?php echo $ide ?>"><br>
                                    <input type="submit" name="aceptar" value="Aceptar y continuar" class="btn btn-primary">
                                    <input type="submit" name="cancel" value="Cancelar" class="btn btn-secondary">
                                </form>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>


        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    </body>

</html>