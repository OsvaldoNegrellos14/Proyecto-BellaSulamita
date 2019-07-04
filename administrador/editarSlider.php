<?php
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MSlider.php';
include_once '../backend/controlador/CSlider.php';
$slider = new CSlider();
session_start();
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
if (isset($_POST["id"]) && isset($_FILES["imagen"]) && isset($_POST["titulo"]) && isset($_POST["informacion"])) {
    $slider->editarSlider($_POST["id"], $_FILES["imagen"], $_POST["titulo"], $_POST["informacion"]);
    header("Location: tablaSlider.php");
}
$ide = (int) $_GET["id"];
$slid = $slider->mostrarSlider($ide);
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Slider</title>
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
                    <ul class="nav flex-column flex-nowrap">
                        <li class="nav-item">

                            <a href="#submenu1"><i class="fa fa-plus" aria-hidden="true"></i>  Agregar </a>
                            <div id="submenu1" aria-expanded="false">
                                <ul class="flex-column pl-2 nav">
                                    <li class="nav-item">
                                        <a class="nav-link py-1" href="agregarProducto.php">Producto</a>
                                        <a class="nav-link py-1" href="agregarBanner.php">Banner</a>
                                        <a class="nav-link py-1" href="agregarSlider.php">Slider</a>
                                        <a class="nav-link py-1" href="agregarCategoria.php">Categoria</a>
                                    </li>
                                </ul>
                            </div><br>

                            <a href="#submenu2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modificar</a>
                            <div id="submenu2" aria-expanded="false">
                                <ul class="flex-column pl-2 nav">
                                    <li class="nav-item">
                                        <a class="nav-link py-1" href="tablaProducto.php">Producto</a>
                                        <a class="nav-link py-1" href="tablaBanner.php">Banner</a>
                                        <a class="nav-link py-1" href="tablaSlider.php">Slider</a>
                                        <a class="nav-link py-1" href="tablaCategoria.php">Categoria</a>
                                    </li>
                                </ul>
                            </div>


                        </li>
                    </ul>
                </div>
                <div class="col pt-2">

                    <div class="container">
                        <form action="editarSlider.php?id=<?php echo $ide ?>" method="POST" enctype="multipart/form-data">
                            <h2>Slider</h2>

                            <div class="input-group mb-3">
                                <input type="text" name="titulo" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="Título" value="<?php echo $slid['titulo']?>">
                            </div>

                            <div class="input-group mb-3">
                                <textarea style="height: 100px; width: 100%" class="form-control"
                                          aria-label="Sizing example input" name="informacion"
                                          aria-describedby="inputGroup-sizing-default" placeholder="Descripcion Del Slider"><?php echo $slid['informacion']?></textarea>
                            </div>
                            <input type="file" name="imagen" accept="image/*">
                            <img src="../<?php echo $slid["imagen"] ?>"  width="15%">
                            <input type="hidden" name="id" value="<?php echo $ide ?>">
                            <button type="submit" class="btn btn-outline-primary">Guardar</button><br>
                            
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