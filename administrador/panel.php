<?php
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MAdmin.php';
include_once '../backend/controlador/CAdmin.php';
session_start();
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Panel</title>
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
                <h3><a href="panel_1.php">Bella Sulamita</a></h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="panel.php"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
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
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div style="padding: 15px;" id="content">

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

            <div class="row text-justify">
                <div class="col-xl-4 col-lg-6 col-sm-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Agregar un nuevo producto</h5>
                            <p class="card-text">Desde esta pestaña podras agregar un nuevo producto con sus caracteristicas.</p>
                            <a href="agregarProducto.php" class="btn option">Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-sm-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Agregar un nuevo Slider</h5>
                            <p class="card-text">Desde esta pestaña podras agregar un nuevo slider para mejorar su sitio web.</p>
                            <a href="agregarSlider.php" class="btn option">Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-sm-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Agregar una nueva categoria</h5>
                            <p class="card-text">Desde esta pestaña podras agregar una nueva categoria.</p>
                            <a href="agregarCategoria.php" class="btn option">Agregar</a>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row text-justify">
                <div class="col-xl-4 col-lg-6 col-sm-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Ver los productos existentes</h5>
                            <p class="card-text">En este apartado observarás los producto existentes, podras editarlos y eliminarlos.</p>
                            <a href="tablaProducto.php" class="btn option">Ver productos</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-sm-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Ver los sliders disponibles</h5>
                            <p class="card-text">Este apartado podras administrar tus slider existentes, editarlos y eliminarlos.</p>
                            <a href="tablaSlider.php" class="btn option">Ver sliders</a>
                        </div>
                    </div>
                </div> 
                <div class="col-xl-4 col-lg-6 col-sm-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Ver las categorias disponibles</h5>
                            <p class="card-text">Este apartado administrarás las categorias existentes, editarlos y eliminarlos.</p>
                            <a href="tablaCategoria.php" class="btn option">Ver categorias</a>
                        </div>
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