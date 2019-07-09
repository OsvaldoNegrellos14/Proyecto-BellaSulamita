<?php 
include_once './backend/modelo/BD.php';
include_once './backend/controlador/CSlider.php';
include_once './backend/modelo/MSlider.php';
include_once './backend/controlador/CCategoria.php';
include_once './backend/modelo/MCategoria.php';
$slider = new CSlider();
$categoria = new CCategoria();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bella Sulamita</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="style/css.css"/>
        <link rel="stylesheet" href="style/font-awesome.min.css">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Bella Sulamita</a>
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
                            <?php echo $categoria->mostrarTodasCategorias()?>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="products.php">Nuestros Productos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ubicación.php">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--
        ACTIVAR SI SE QUIERE CAMBIAR SLIDER
        
        <section class="home-full-slider-wrapper mb-10px">
            <div class="owl-carousel owl-theme owl-dots-modern home-full-slider owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="">
                        
                    </div>
                </div>
            </div>
        </section>
        -->

        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    
                    <?php echo $slider->mostrarSliderPrincipal()?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>




        <section>
            <div class="container">
                <div class="container-fluid px-5px py-5">
                    <div class="row mx-0">
                        <?php echo $categoria->mostrarCategoriasPrincipal() ?>
                    </div>
                </div>
            </div>
            
        </section>


        <!--
        ACTIVAR SI ES NECESARIO... XD
        <div class="album py-5">
            <h1>Tendencia</h1>
            <div class="container">
                <div class="row">
                    <svg class="bd-placeholder-img card-img-top" >
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=1" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="product.html" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=2" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=3" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=4" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=5" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=6" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=7" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=8" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=9" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        -->

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
