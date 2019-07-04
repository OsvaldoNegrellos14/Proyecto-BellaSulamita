<?php

class CContacto {
    private $modelo;
    public function __construct() {
        $this->modelo= new MContacto();
    }
   
    public function subirComentarioNuevo($nombre, $telefono, $asunto, $mensaje){
        $this->modelo->insertarComentario($nombre, $telefono, $asunto, $mensaje);
    }
}
