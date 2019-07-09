<?php

class CCategoria {

    private $modelo;

    public function __construct() {
        $this->modelo = new MCategoria();
    }

    public function subirNuevaCategoria($categoria, $imagen) {
        copy($imagen["tmp_name"], "../multimedia/".$imagen["name"]);
        $this->modelo->agregarCategoria($categoria, "multimedia/".$imagen["name"]);
    }

    public function mostrarCategoria($ide) {
        $categoria = $this->modelo->consultaCategoria($ide);
        return $categoria;
    }

    public function mostrarTodasCategorias() {
        $categoria = $this->modelo->consultarCategorias();
        $acu = "";
        foreach ($categoria as $catego) {
            $acu .= '<a class="dropdown-item" href="categoria.php">'. $catego["categoria"] .'</a>
                     <input type="hidden" name="id" value="'. $catego["id"].'">';
        }
        return $acu;
    }
    
    public function mostrarCategoriasPrincipal() {
        $categoria = $this->modelo->consultarCategorias();
        $acu = "";
        foreach ($categoria as $catego) {
            $acu .= '<div class="col-md-6 mb-10px px-5px">
                        <div class="card border-0 text-white text-center">
                            <img src="'.$catego["imagen"].'" class="card-img">
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="w-100 py-3">
                                    <h2 class="display-3 font-weight-bold mb-4">'.$catego["categoria"].'</h2>
                                    <a href="products.php" class="btn btn-light">Ver Más</a>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
    

    public function mostrarCategoriaAdmin() {
        $categoria = $this->modelo->consultarCategorias();
        $acu = "";
        foreach ($categoria as $catego) {
            $acu .= '<tbody>
			<tr>
                            <th scope="row"><h5>' . $catego["id"] . '</h5></th>
                            <th scope="row"><h5>' . $catego["categoria"] . '</h5></th>
                            <td><button type="button" class="btn btn-primary"><a href="editarCategoria.php?id=' . $catego["id"] . '"><i class="fa fa-pencil-square-o"></i></a></button></td>
                            <td><button type="button" class="btn btn-primary"><a href="eliminarCategoria.php?id=' . $catego["id"] . '"><i class="fa fa-trash"></i></a></button></td>
			</tr>
                    </tbody>';
        }
        return $acu;
    }

    public function editarCategoria($id, $categoria, $imagen) {
        copy($imagen["tmp_name"], "../multimedia/".$imagen["name"]);
        $this->modelo->actualizarCategoria($id, $categoria, "multimedia/".$imagen["name"]);
    }

    public function eliminarCategoria($id) {
        $this->modelo->borrarCategoria($id);
    }

}
