<?php
include_once './backend/modelo/BD.php';
include_once './backend/controlador/CCategoria.php';
include_once './backend/modelo/MCategoria.php';
$categoria = new CCategoria();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ubicación</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="ubicación.php">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="mapa contenido">
            <h1>Ubicación</h1>
            <br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7568.872849607438!2d-97.39845162337299!3d18.463880526340407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5bcd7b0e91505%3A0xfc6af28e68465e2e!2sCentro+de+la+Ciudad%2C+75700+Tehuac%C3%A1n%2C+Pue.!5e0!3m2!1ses!2smx!4v1559482146026!5m2!1ses!2smx" width="1000" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>


        <div class="row">
            <div class="col-12 mt-5">

                <p>Parque Ecológico
                    Calle 4 Ote. 119, Centro de la Ciudad, 75700 Tehuacán, Pue.</p>
                <hr>
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
                        Tehuacán, Puebla, México.
                    </div>
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
