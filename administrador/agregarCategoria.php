<?php
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MCategoria.php';
include_once '../backend/controlador/CCategoria.php';
$categoria = new CCategoria();
session_start();
error_reporting(0);
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
if (isset($_POST["categoria"]) && isset($_FILES["imagen"])) {
    $resultado = $categoria->subirNuevaCategoria($_POST["categoria"], $_FILES["imagen"]);
    
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Agregar Categoria</title>
        <link rel="shortcut icon" href="../multimedia/BS.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Sweet Alert-->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/css_1.css" />
        <link rel="stylesheet" href="style/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.2/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.2/dist/sweetalert2.css">
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
                    <form action="agregarCategoria.php" method="POST" enctype="multipart/form-data">
                        <br><h2>Nueva categoria</h2>
                        <div class="input-group mb-3">
                            <input type="text" require name="categoria" class="form-control" aria-label="Sizing example input"
                                   aria-describedby="inputGroup-sizing-default" placeholder="Nombre de la categoría">
                        </div>
                        <p style="margin-bottom: 5px;">Subir archivo:</p>
                        <input style="font-size: 12px" type="file" name="imagen" accept="image/*"><br><br>
                        <?php 
                        if(!empty($resultado)){
                            echo $resultado;
                        }
                        ?>
                        <button style="width: 100px" type="submit" class="btn btn-outline-success">Guardar</button><br><br>
                        <button style="width: 100px" type="button" class="btn btn-outline-secondary"><a href="panel.php" style="text-decoration: none">Regresar</a></button>
                    </form>
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