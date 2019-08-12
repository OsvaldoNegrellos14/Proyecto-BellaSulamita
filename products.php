<?php
include_once './backend/modelo/BD.php';
include_once './backend/controlador/CCategoria.php';
include_once './backend/modelo/MCategoria.php';
include_once './backend/controlador/CProducto.php';
include_once './backend/modelo/MProducto.php';
$categoria = new CCategoria();
$producto = new CProducto();
error_reporting(0);
$cat=$_GET['category'];
$marca=$_GET['marca'];
if(isset($_POST["filtro1"])){
    $produc = $producto->mostrarFiltro1($_POST["precio1"], $_POST["precio2"]);
} elseif (isset($_GET["category"])) {
    $produc = $producto->mostrarFiltroTodos($cat);
} elseif(isset($_GET['marca'])){
    $produc=$producto->mostrarPorMarca($marca);
} else {
    $produc = $producto->mostrarTodos();
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Productos</title>
        <link rel="shortcut icon" href="multimedia/BS.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/css.css"/>
        <link rel="stylesheet" href="style/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="Style/cssZoom.css">
    </head>
    <body>
        <div id="contenedor_carga">
            <div class="loader"></div> 
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top">&uarr; volver</button>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #E7B5E3" id="navbar">
            <a class="navbar-brand" href="index.php" id="principal"><img src="multimedia/BellaSulamita.png"></a>
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
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="get" action="resultadoBusqueda.php">
                    <input style="width: 270px;" class="form-control mr-sm-2" type="search" placeholder="Elemento a buscar" name="busqueda">
                    <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Buscar">
                </form>
            </div>
        </nav>

        <div class="contenido">
            <br><h1>Productos disponibles</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="mt-5 col-md-3">
                    <div class="container">
                        <b style="font-size: 25px;">Filtrar por:</b>
                        <table style="width:100%;">
                            <tr>
                                <td>
                                    <div class="container" style="padding: 20px">
                                        <br>
                                        <b>Precio:</b>
                                        <form method="post" action="products.php"><br>
                                            Precio mínimo:
                                            <input min="50" step="50" style="border-radius: 3px" type="number" name="precio1"><br>
                                            Precio maximo:
                                            <input min="50" step="50" style="border-radius: 3px" type="number" name="precio2"><br><br>
                                            <input class="btn boton" type="submit" value="Buscar" name="filtro1">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="container" style="padding: 20px">
                                        <b>Categorias:</b>
                                        <form method="post" action="products.php"><br>
                                            <div class="dropdown">
                                                <a style="color: #E7B5E3 !important" class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    --Selecciona una opción--
                                                </a>

                                                <div class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="products.php">Mostrar Todo</a>
                                                    <?php echo $categoria->mostrarCategoriasAdmin() ?>
                                                </div>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="container" style="padding: 20px">
                                        <b>Marcas:</b>
                                        <form method="post" action="products.php"><br>
                                            <div class="dropdown">
                                                <a style="color: #E7B5E3 !important" class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    --Selecciona una opción--
                                                </a>

                                                <div class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="products.php">Mostrar Todo</a>
                                                    <?php echo $producto->mostrarFiltro3() ?>
                                                </div>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
                <div class="album mt-5 col-md-9">
                    <div class="container">
                        <div class="row">

                            <?php 
                            if(!empty($produc)){
                                echo $produc; 
                            }
                             ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <br>
                        <h1>ENCUETRANOS EN</h1><br>
                        <div class="row flex align-items-center">
                            <a class="nav-link" href="https://www.facebook.com/Bella-Sulamita-247119685934411/?ref=search&__tn__=%2Cd%2CP-R&eid=ARCAs1xzJDxQprwBCAomq6iRiPfl3pcEfhqg-z06GWaKIyhRr89-dpNqvVaDoDGeYa6fA7nQUcmoEt_B"><i class="fa fa-facebook fa-3x"></i></a>
                            <p>Bella Sulamita</p>
                        </div>
                        <div class="row flex align-items-center">
                            <a class="nav-link" href="#"><i class="fa fa-whatsapp fa-3x"></i></a>
                            <p>044-238-145-16-49</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <br>
                        <h1>QUIENES SOMOS</h1><br>
                        <p>
                            La empresa está principalmente enfocada a la ropa femenina. La boutique fue creada en Junio de 2016, con el lema 
                            "todo el mundo tiene derecho a disfrutar de la belleza de la moda".
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <br>
                        <h1>NUESTRA MISIÓN</h1><br>
                        <P>
                            BELLA SULAMITA ofrece las últimas tendencias para mujeres, a unos precios más que atractivos. 
                            El objetivo es ofrecer productos de calidad con estilo, a precios atractivos para todos los usuarios del mundo.
                        </P>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <P>©2019 BELLA SULAMITA Todos los derechos reservados</P>
                    </div>
                </div>

            </div>
        </footer>

        <script>
            window.onload = function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'hidden';
                contenedor.style.opacity = '0';
            };
        </script>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
