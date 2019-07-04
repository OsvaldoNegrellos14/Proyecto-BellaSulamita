<?php

class CCategoria {
    private $modelo;
    public function __construct() {
        $this->modelo= new MCategoria();
    }

    public function subirNuevaCategoria($categoria){
        $this->modelo->agregarCategoria($categoria);
    }
    
    public function mostrarCategoria($ide){
        $categoria = $this->modelo->consultaCategoria($ide);
            return $categoria;
    }

    public function mostrarCategoriaAdmin(){
        $categoria= $this->modelo->consultarCategorias();
        $acu="";
        foreach ($categoria as $catego){
            $acu.='<tbody>
			<tr>
                            <th scope="row"><h5>'.$catego["id"].'</h5></th>
                            <th scope="row"><h5>'.$catego["categoria"].'</h5></th>
                            <td><button type="button" class="btn btn-primary"><a href="editarCategoria.php?id='.$catego["id"].'"><i class="fa fa-pencil-square-o"></i></a></button></td>
                            <td><button type="button" class="btn btn-primary"><a href="eliminarCategoria.php?id='.$catego["id"].'"><i class="fa fa-trash"></i></a></button></td>
			</tr>
                    </tbody>';
        }
        return $acu;
    }

    public function editarCategoria($id, $categoria){
        $this->modelo->actualizarCategoria($id, $categoria);
    }

    public function eliminarCategoria($id){
        $this->modelo->borrarCategoria($id);
    }

}
