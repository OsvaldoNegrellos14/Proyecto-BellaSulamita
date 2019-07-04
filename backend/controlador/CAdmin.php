<?php

class CAdmin {
    private $modelo;
    public function __construct() {
        $this->modelo= new MAdmin();
    }
    
    
    public function autentificar($usuario, $password){
        $user=$this->modelo->autentificar($usuario, $password);
        if(isset($user)){
            $_SESSION["autentificado"]=$user;
            header("Location: panel.php");
        }else{
            header("Location: index.php");

        }
        
    }
}