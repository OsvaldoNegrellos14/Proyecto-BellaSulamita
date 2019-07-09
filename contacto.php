<?php 
include_once './backend/modelo/BD.php';
include_once './backend/modelo/MContacto.php';
include_once './backend/controlador/CContacto.php';
$contacto = new CContacto();
if(isset($_POST["nombre"]) && isset($_POST["telefono"]) && isset($_POST["asunto"]) && isset($_POST["mensaje"])){
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

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="style/css.css"/>
        <link rel="stylesheet" href="style/font-awesome.min.css">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="navbar-brand" href="index.php">Bella Sulamita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="products.php">Pantalones</a>
                            <a class="dropdown-item" href="products.php">Blusas</a>
                            <a class="dropdown-item" href="products.php">Vestidos</a>
                            <a class="dropdown-item" href="products.php">Camisas</a>
                        </div>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="products.php">Nuestros Productos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ubicación.php">Ubicación</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="galeria">
            <div class="container formulario mt-5">
                <div class="col-lg-12 text-center">
                    <br>
                    <h2 class="section-heading text-uppercase">Contáctanos</h2>
                    <h3 class="section-subheading text-muted">Envianos un mensaje dando tu opinion</h3>
                </div>

                <form method="post" action="contacto.php">
                    <div class="row mt-5">
                        <div class="col-4"><input type="text" placeholder="Nombre" name="nombre"></div>
                        <div class="col-4"><input type="text" placeholder="Telefono" name="telefono"></div>
                        <div class="col-4"><input type="text" placeholder="Asunto" name="asunto"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <textarea placeholder="Mensaje" name="mensaje"></textarea>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <br>
                                <input id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" value="Enviar Mensaje">
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h2>Síguenos en</h2>
                    <a href="#"><i class="fa fa-facebook fa-3x"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-3x"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-3x"></i></a>
                    <a href="#"><i class="fa fa-snapchat-ghost fa-3x"></i></a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
