<?php
include_once './backend/modelo/BD.php';
include_once './backend/modelo/MContacto.php';
include_once './backend/modelo/MCategoria.php';
include_once './backend/controlador/CContacto.php';
include_once './backend/controlador/CCategoria.php';
$contacto = new CContacto();
$categoria = new CCategoria();
if (isset($_POST["nombre"]) && isset($_POST["telefono"]) && isset($_POST["asunto"]) && isset($_POST["mensaje"])) {
    $contacto->subirComentarioNuevo($_POST["nombre"], $_POST["telefono"], $_POST["asunto"], $_POST["mensaje"]);
    header("Location: contacto.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contacto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="multimedia/BS.png" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="style/css.css"/>
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
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Nuestros Productos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="get" action="resultadoBusqueda.php">
                    <input style="width: 270px;" class="form-control mr-sm-2" type="search" placeholder="Elemento a buscar" name="busqueda">
                    <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Buscar">
                </form>
            </div>
        </nav>

        <div class="galeria contenido">
            <div class="container formulario mt-5">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <br>
                        <h2 class="section-heading">Contáctanos</h2>
                        <h3 class="section-subheading text-muted">Envianos un mensaje dando tu opinion</h3>
                        <form method="post" action="contacto.php">
                            <div class="row mt-4">
                                
                                <div id="input" class="col-md-4 col-sm-12"><input type="text" placeholder="Ingrese su nombre" name="nombre"></div>
                                <div id="input" class="col-md-4 col-sm-12"><input type="text" placeholder="Ingrese su teléfono" name="telefono"></div>
                                <div id="input" class="col-md-4 col-sm-12"><input type="text" placeholder="Asunto" name="asunto"></div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea placeholder="Mensaje" name="mensaje"></textarea>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <br>
                                        <input id="sendMessageButton" class="btn btn-md text-uppercase" type="submit" value="Enviar Mensaje">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 colmd-12" id="DatosContacto">
                        <br>
                        <h2 class="section-heading">Dirección</h2><br>
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <i style="font-size: 40px" class="fa fa-map-marker"></i>
                                </div>
                                <div class="col-10">
                                    <p> Calle 4 Ote. 119, Centro de la Ciudad, 75700 Tehuacán, Puebla, México.</p>
                                </div>
                                
                            </div>
                        </div>
                            
                        
                        <h2 class="section-heading">Ubicación</h2><br>
                        <div class="mapa">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d946.1071729002789!2d-97.39195657081308!3d18.464231171282076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5bcd71c978045%3A0x6cfc6dd841de4794!2sCalle+3+Nte.+113%2C+Centro+de+la+Ciudad%2C+75700+Tehuac%C3%A1n%2C+Pue.!5e0!3m2!1ses-419!2smx!4v1564366786608!5m2!1ses-419!2smx" width="1000" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        
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
