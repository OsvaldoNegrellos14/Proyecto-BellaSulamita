<?php

class CCategoria {

    private $modelo;

    public function __construct() {
        $this->modelo = new MCategoria();
    }

    public function subirNuevaCategoria($categoria, $imagen) {
        if (!empty($categoria) && !empty($imagen)) {
            copy($imagen["tmp_name"], "../multimedia/".$imagen["name"]);
            $this->modelo->agregarCategoria($categoria, "multimedia/".$imagen["name"]);
            return $correcto = "<script>
                                    Swal.fire({
                                      type: 'success',
                                      title: 'La categoria se ha guardado! ',
                                      text: '¿Qué desea hacer?',
                                      showCancelButton: true,
                                      focusConfirm: false,
                                      confirmButtonText:" .
                                        "'<a href=".'"agregarCategoria.php"'.">Agregar categoria</a>',
                                      cancelButtonText:" .
                                        "'<a href=".'"tablaCategoria.php"'.">Ver las categorias</a>'
                                    });
                                </script>";
            header("Location: agregarCategoria.php");
        } else {
            return $error = "<script>
                            Swal.fire({
                                type: 'error',
                                title: 'Error!',
                                text: 'Todos los campos deben de rellenarse',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            </script>";
            header("Location: agregarCategoria.php");
        }
        
    }

    public function mostrarCategoria($ide) {
        $categoria = $this->modelo->consultaCategoria($ide);
        return $categoria;
    }
    
    public function mostrarCategoriasAdmin(){
        $producto = $this->modelo->consultarCategoriasAdmin();
        $acu = "";
        foreach ($producto as $produ){
            $acu .= '<a class="dropdown-item" href="?category='.$produ["categoria"].'" value="'.$produ["categoria"].'">'.$produ["categoria"].'</a>';;
        }
        return $acu;
    }
        
    public function mostrarTodasCategorias() {
        $categoria = $this->modelo->consultarTodas();
        $acu = "";
        foreach ($categoria as $catego) {
            $acu .= '<a class="dropdown-item" href="categoria.php?id=' . $catego["id"] . '">' . $catego["categoria"] . '</a>';
        }
        return $acu;
    }

    public function mostrarCategoriasPrincipal() {
        $categoria = $this->modelo->consultarCategoriasPrincipal();
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
    
    public function mostrarTodas() {
        $categoria = $this->modelo->consultarTodas();
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
        $categoria = $this->modelo->consultarCategoriasAdmin();
        $acu = "";
        foreach ($categoria as $catego) {
            $acu .= '<tbody>
			<tr>
                            <th scope="row"><h5>' . $catego["id"] . '</h5></th>
                            <th scope="row"><img style="width: auto; height: 80px" src="../' . $catego["imagen"] . '"></th>
                            <th scope="row"><h5>' . $catego["categoria"] . '</h5></th>
                            <td><button type="button" class="btn btn-primary"><a href="editarCategoria.php?id=' . $catego["id"] . '"><i class="fa fa-edit"></i></a></button></td>
                            <td><button type="button" class="btn btn-danger"><a href="eliminarCategoria.php?id=' . $catego["id"] . '"><i class="fa fa-trash"></i></a></button></td>
			</tr>
                    </tbody>';
        }
        return $acu;
    }

    public function editarCategoria($id, $categoria, $imagen) {
        $this->modelo->actualizarCategoria($id, $categoria, $imagen);
        return $correcto = "<script>
                                  Swal.fire({
                                  title: 'Cambios hechos exitosamente! ',
                                  type: 'success',
                                  showConfirmButton: true,
                                  confirmButtonText:" .
                                        "'<a href=".'"tablaCategoria.php"'.">Continuar</a>'
                                });
                                </script>";
        header("Location: editarCategoria.php");
        
    }

    public function eliminarCategoria($id) {
        $this->modelo->borrarCategoria($id);
    }
    
    

}
