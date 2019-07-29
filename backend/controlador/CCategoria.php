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
            $acu .= '<a class="dropdown-item" href="categoria.php?id='. $catego["id"] .'">'. $catego["categoria"] .'</a>';
        }
        return $acu;
    }
    
    public function mostrarCategoriasPrincipal() {
        $categoria = $this->modelo->consultarCategorias();
        $acu = "";
        foreach ($categoria as $catego) {
            $acu .= '<div class="col-xl-4 col-lg-6">
                        <div class="card border-0 text-white text-center" id="zoom">
                            <img src="'.$catego["imagen"].'" class="card-img" style="filter: blur(1px)">
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="w-100">
                                    <h2 class="display-4 mb-4">'.$catego["categoria"].'</h2>
                                    <a href="categoria.php?id='. $catego["id"] .'" class="btn btn-link text-white">Ver Más</a>
                                    <i class="fa fa-arrow-right ml-2"></i>
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
