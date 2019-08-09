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
        <title><?php echo $produ["nombre"] ?></title>
        <link rel="shortcut icon" href="multimedia/BS.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="style/css.css"/>
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="Style/cssZoom.css">
        <link rel="stylesheet" href="style/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="contenedor_carga">
            <div class="loader"></div> 
        </div>
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



        <div id="producto" class="contenido container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-12 mt-5">
                        <div class="img-magnifier-container img-fluid">
                            <img id="myimage" src="<?php echo $produ["imagen"] ?>" class="d-block w-100" alt="<?php echo $produ["nombre"] ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-12 mt-5">
                        <h1 class="jumbotron-heading"><?php echo $produ["nombre"] ?></h1>
                        <h2 class="text-justify">COLOR:</h2><p><?php echo $produ["color"] ?></p>
                        <h2 class="text-justify">CATEGORIA:</h2><p><?php echo $produ["categoria"] ?></p>
                        <h2 class="text-justify">TALLA:</h2><p><?php echo $produ["talla"] ?></p>
                        <h2 class="text-justify">MARCA:</h2><p><?php echo $produ["marca"] ?></p>
                        <h2 class="text-justify">PRECIO:</h2><p>$<?php echo $produ["precio"] ?>.99</p>
                        <h2 class="text-justify">DESCRIPCIÓN:</h2>
                        <p class="text-justify"><?php echo $produ["description"] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="album py-5">
            <div class="container">
                <h1>Relacionados</h1>
                <br>
                <div class="row">
                    <?php echo $producto->mostrarCategoriaProducto($produ["id_categoria"]) ?>
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
        <script>
            magnify("myimage", 3);
        </script>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
