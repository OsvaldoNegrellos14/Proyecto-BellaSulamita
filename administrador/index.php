<?php
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MAdmin.php';
include_once '../backend/controlador/CAdmin.php';
session_start();
error_reporting(0);
$admin = new CAdmin();
if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    $resultado = $admin->autentificar($_POST["usuario"], $_POST["password"]);
}

if (isset($_SESSION["autentificado"])) {
    header("Location: panel.php");
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Bella Sulamita</title>
        <link rel="shortcut icon" href="../multimedia/BS.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="../Style/css.css"/>
        <link rel="stylesheet" href="../Style/font-awesome.min.css">
        <link rel="stylesheet" href="../Style/cssLog.css"/>
        <link rel="stylesheet" href="../Style/css2.css"/>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.2/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.2/dist/sweetalert2.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #E7B5E3; display: flex; justify-content: center;">
            <a href="panel.php"><img height="60px" src="../multimedia/BellaSulamita.png"></a>

        </nav>


        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form id="formLogin" method="POST" class="login100-form validate-form">
                        <span class="login100-form-title p-b-26">

                            Bienvenido
                        </span>


                        <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                            <input class="input100" type="text" name="usuario" placeholder="Usuario" autocomplete="off">
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <span class="btn-show-pass">

                            </span>
                            <input class="input100" type="password" name="password" placeholder="Contraseña" autocomplete="off">
                        </div>
                        <?php 
                        if(!empty($resultado)){
                            echo $resultado;
                        }
                        ?>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button id="btnLogin" type="submit" class="login100-form-btn">
                                    Entrar
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
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



        <script>
            $("#btnLogin").click(function (event) {

                //Fetch form to apply custom Bootstrap validation
                var form = $("#formLogin")

                if (form[0].checkValidity() === false) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.addClass('was-validated');
            });
        </script>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
