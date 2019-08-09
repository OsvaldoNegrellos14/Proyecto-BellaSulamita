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
        <title>Eliminar producto</title>
        <link rel="shortcut icon" href="../multimedia/BS.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/css_1.css" />
        <link rel="stylesheet" href="style/font-awesome.min.css">
    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar" class="">
                <div class="sidebar-header">
                    <a href="panel.php"><img src="../multimedia/BellaSulamita.png"></a>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="panel.php"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                        <br>
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

                        <a href="#submenu2"><i class="fa fa-edit" aria-hidden="true"></i> Modificar</a>
                        <div id="submenu2" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item">
                                    <a class="nav-link py-1" href="tablaProducto.php"> Producto</a>
                                    <a class="nav-link py-1" href="tablaSlider.php"> Slider</a>
                                    <a class="nav-link py-1" href="tablaCategoria.php"> Categoria</a>
                                </li>
                            </ul>
                        </div><br>
                        <a href="tablaComentarios.php"><i class="fa fa-eye" aria-hidden="true"></i> Ver comentarios </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content  -->
            <div style="padding: 15px; margin: 0px auto 0px auto; width: 100%" id="content">

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn option" style="color: white">
                            <svg class="svg-inline--fa fa-align-left fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="align-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M288 44v40c0 8.837-7.163 16-16 16H16c-8.837 0-16-7.163-16-16V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16zM0 172v40c0 8.837 7.163 16 16 16h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16zm16 312h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm256-200H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16z"></path></svg><!-- <i class="fas fa-align-left"></i> -->
                            <span></span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <svg class="svg-inline--fa fa-align-justify fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="align-justify" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 84V44c0-8.837 7.163-16 16-16h416c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H16c-8.837 0-16-7.163-16-16zm16 144h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 256h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0-128h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg><!-- <i class="fas fa-align-justify"></i> -->
                        </button>

                        <div class="navbar-collapse collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto text-center">
                                <li class="nav-item active">
                                    <a style="color: white" href="salir.php"><i class="fa fa-power-off"> </i> Salir </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <br><h2>¿Seguro que desea eliminar la foto?</h2>
                            <p>Esta accion no se puede desahacer posteriormente</0><br>
                            <h3>Imagen actual:</h3><br><img src="../<?php echo $produ["imagen"] ?> "width="75%">
                        </div>
                        <div class="col-md-6">
                            <form method="GET" action="eliminarProducto.php?id=<?php echo $ide ?>" enctype="multipart/form-data">
                                <br><h3>Nombre:</h3><p><?php echo $produ["nombre"] ?></p><hr>
                                <h3>Descripción:</h3><p><?php echo $produ["description"] ?></p><hr>
                                <h3>Precio:</h3><p><?php echo $produ["precio"] ?></p><hr>
                                <h3>Marca:</h3><p><?php echo $produ["marca"] ?></p><hr>
                                <h3>Color:</h3><p><?php echo $produ["color"] ?></p><hr>
                                <h3>Talla:</h3><p><?php echo $produ["talla"] ?></p><hr>
                                <input type="hidden" name="id" value="<?php echo $ide ?>"><br>
                                <input type="submit" name="aceptar" value="Aceptar y continuar" class="btn btn-outline-danger">
                                <input type="submit" name="cancel" value="Cancelar" class="btn btn-outline-secondary">
                            </form>
                        </div>
                    </div>
                </div><br>
            </div>
        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>


    </body>

</html>