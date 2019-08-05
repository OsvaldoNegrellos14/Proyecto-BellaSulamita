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
        
        <link rel="stylesheet" href="style/css.css" />
        <link rel="stylesheet" href="style/font-awesome.min.css">
    </head>

    <body>
        <nav id="panel" class="navbar navbar-expand-lg navbar-primary bg-primary">
            <a class="navbar-brand" href="panel.php">Bella Sulamita</a>
            <button class="navbar-toggler pull-right hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span style="color: white">&#9776</span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="salir.php"><i class="fa fa-power-off"> </i> </a>
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
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Agregar un nuevo producto</h5>
                                    <p class="card-text">Desde esta pestaña podras agregar un nuevo producto con sus caracteristicas.</p>
                                    <a href="agregarProducto.php" class="btn btn-info">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Agregar un nuevo Slider</h5>
                                    <p class="card-text">Desde esta pestaña podras agregar un nuevo slider para darle un mejor aspecto a su sitio web.</p>
                                    <a href="agregarSlider.php" class="btn btn-info">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Agregar una nueva categoria</h5>
                                    <p class="card-text">Desde esta pestaña podras agregar una nueva categoria.</p>
                                    <a href="agregarCategoria.php" class="btn btn-info">Agregar</a>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Ver los productos existentes</h5>
                                    <p class="card-text">En este apartado observarás los producto existentes, podras editarlos y tambien eliminarlos.</p>
                                    <a href="tablaProducto.php" class="btn btn-info">Ver productos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Ver los sliders disponibles</h5>
                                    <p class="card-text">Este apartado podras administrar tus slider existentes, editarlos y eliminarlos.</p>
                                    <a href="tablaSlider.php" class="btn btn-info">Ver sliders</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Ver las categorias disponibles</h5>
                                    <p class="card-text">Este apartado podras administrar tus categorias existentes, editarlos y eliminarlos.</p>
                                    <a href="tablaCategoria.php" class="btn btn-info">Ver categorias</a>
                                </div>
                            </div>
                        </div> 
                    </div><br>
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