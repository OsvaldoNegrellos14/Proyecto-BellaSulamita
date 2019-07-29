<?php
include_once './backend/modelo/BD.php';
include_once './backend/controlador/CSlider.php';
include_once './backend/modelo/MSlider.php';
include_once './backend/controlador/CProducto.php';
include_once './backend/modelo/MProducto.php';
include_once './backend/controlador/CCategoria.php';
include_once './backend/modelo/MCategoria.php';
$imagenes = new MSlider();
$images = $imagenes->consultarSliders();
$categoria = new CCategoria();
$producto = new CProducto();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bella Sulamita</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="style/css.css"/>
        <link rel="stylesheet" href="style/font-awesome.min.css">
    </head>
    <body>
        <div id="contenedor_carga">
           <div class="loader"></div> 
        </div>
        

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
            <a class="navbar-brand" href="index.php" id="principal">Bella Sulamita</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Nuestros Productos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="bd-example contenido">
            <?php if(count($images)>0):?>
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $cnt=0; foreach($images as $img):?>
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="<?php if($cnt==0){ echo 'active'; }?>"></li>
                    <?php $cnt++; endforeach; ?>
                </ol>
                
                <div class="carousel-inner">

                    <?php $cnt = 0;foreach ($images as $img): ?>
                        <div class="carousel-item <?php if($cnt==0){ echo 'active'; }?>">
                            <img style="width: 100%" src="<?php echo $img["imagen"] ?>" class="img-slider d-block w-100">
                            <div class="carousel-caption d-none d-md-block" style="background-color: black; opacity: 0.3">
                                <h5><?php echo $img["titulo"] ?></h5>
                                <p><?php echo $img["informacion"] ?></p>
                            </div>
                        </div>
                    <?php $cnt++; endforeach; ?>
                </div>
                
                
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <div id="indicador">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <div id="indicador" class="">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
                
                <?php else:?>
                <h4 class="alert alert-warning">No hay imagenes</h4>
                <?php endif; ?>
            </div>
        </div>

        <section>
            <div class="mt-5 container" style="padding-bottom: 10px;">
                <h1>Categorias</h1>
                <hr id="linea">
            </div>
            <div class="container-fluid">
                <div class="row mx-0">
                    <?php echo $categoria->mostrarCategoriasPrincipal() ?>
                </div>
            </div>

        </section>
        
        
        <div class="album mt-5">
            <div class="container">
                <h1>LO MÁS NUEVO</h1>
                <hr id="linea">
                <br>
                <div class="row">
                    <?php echo $producto->mostrarPrincipal() ?>
                </div>
                <div class="row flex justify-content-center align-items-center" id="produPrincipal">
                    <a href="products.php" class="btn btn-primary my-2">Ver Más</a>
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
                            La empresa está principalmente enfocada a la ropa femenina. La boutique fue creada en Octubre de 2008, con el lema 
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
                        <P>©2019 BELLA SULAMITA Todos los derechos reservados</P
                    </div>
                </div>

            </div>
        </footer>

        <script>
        window.onload = function() {
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
