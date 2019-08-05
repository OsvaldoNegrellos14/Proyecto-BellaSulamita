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
            return $error = "<div class='alert alert-danger'>
                                <strong>Error!</strong> Usuario o contraseña invalidos.
                            </div>";
            header("Location: index.php");

        }
        
    }
}