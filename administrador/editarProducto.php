<?php
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MProducto.php';
include_once '../backend/controlador/CProducto.php';
$producto = new CProducto();
session_start();
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
if (isset($_POST["id"]) && isset($_FILES["imagen"]) && isset($_POST["nombre"]) && isset($_POST["description"]) && isset($_POST["precio"]) && isset($_POST["marca"]) && isset($_POST["color"]) && isset($_POST["talla"])) {
    $producto->editarProducto($_POST["id"], $_FILES["imagen"], $_POST["nombre"], $_POST["description"], $_POST["precio"], $_POST["marca"], $_POST["color"], $_POST["talla"]);
    header("Location: tablaProducto.php");
}
$ide = (int) $_GET["id"];
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
                        <form action="editarProducto.php?id=<?php echo $ide ?>" method="POST" enctype="multipart/form-data">
                            <h2>Productos</h2>

                            <div class="input-group mb-3">
                                <input type="text" require name="nombre" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="Nombre del producto" value="<?php echo $produ["nombre"] ?>">
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" require name="talla" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="Tallas" value="<?php echo $produ["talla"] ?>">
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" require name="precio" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="Precio" value="<?php echo $produ["precio"] ?>">
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" require name="marca" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="Marca" value="<?php echo $produ["marca"] ?>">
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" require name="color" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="Color" value="<?php echo $produ["color"] ?>">
                            </div>

                            <div class="input-group mb-3">
                                <textarea style="height: 100px" class="form-control"
                                          aria-label="Sizing example input" require name="description"
                                          aria-describedby="inputGroup-sizing-default" placeholder="Descripcion Completa del producto"><?php echo $produ["description"] ?></textarea>
                            </div>

                            <input type="file" name="imagen" accept="image/*">
                            <img src="../<?php echo $produ["imagen"] ?>"  width="15%"><br>
                            <input type="hidden" name="id" value="<?php echo $ide ?>">
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        </form>
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