<?php
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MAdmin.php';
include_once '../backend/modelo/MContacto.php';
include_once '../backend/controlador/CAdmin.php';
include_once '../backend/controlador/CContacto.php';
$formulario = new CContacto();
session_start();
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
$ide = (int) $_GET["id"];
$formulario->eliminarFormulario($ide);
header("Location: tablaComentarios.php");
