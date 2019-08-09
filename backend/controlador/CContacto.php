<?php

class CContacto {
    private $modelo;
    public function __construct() {
        $this->modelo= new MContacto();
    }
   
    public function subirComentarioNuevo($nombre, $telefono, $asunto, $mensaje){
        $this->modelo->insertarComentario($nombre, $telefono, $asunto, $mensaje);
    }
    
    public function mostrarFormulariosAdmin() {
        $formulario = $this->modelo->consultarTodas();
        $acu = "";
        foreach ($formulario as $form) {
            $acu .= '<tbody>
			<tr>
                            <th scope="row"><h5>' . $form["id"] . '</h5></th>
                            <th scope="row"><h5>' . $form["nombre"] . '</h5></th>
                            <th scope="row"><h5>' . $form["telefono"] . '</h5></th>
                            <th scope="row"><h5>' . $form["asunto"] . '</h5></th>
                            <th scope="row"><h5>' . substr($form["mensaje"],0,40) . '...</h5></th>
                            <td><button type="button" class="btn btn-primary"><a href="verComentario.php?id=' . $form["id"] . '"><i class="fa fa-eye"></i></a></button></td>
                            <td><button type="button" class="btn btn-danger"><a href="eliminarComentario.php?id=' . $form["id"] . '"><i class="fa fa-trash"></i></a></button></td>
			</tr>
                    </tbody>';
        }
        return $acu;
    }
    
    public function mostrarFormulario($ide) {
        $categoria = $this->modelo->consultaFormulario($ide);
        return $categoria;
    }
    
    public function eliminarFormulario($id) {
        $this->modelo->borrarFormulario($id);
    }
    
}
