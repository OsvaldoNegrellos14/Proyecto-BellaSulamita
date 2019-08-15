<?php

class CProducto {
    private $modelo;
    public function __construct() {
        $this->modelo= new MProducto();
    }

    public function subirNuevoProducto($categoria, $imagen, $nombre, $description, $precio, $marca, $color, $talla){
        if(!empty($imagen) && !empty($categoria) && !empty($nombre) && !empty($description) && !empty($precio) && !empty($marca) && !empty($color) && !empty($talla) ){
            copy($imagen["tmp_name"], "../multimedia/".$imagen["name"]);
            $this->modelo->agregarProducto($categoria, "multimedia/".$imagen["name"], $nombre, $description, $precio, $marca, $color, $talla);
            return $correcto = "<script>
                                Swal.fire({
                                  type: 'success',
                                  title: 'El producto se ha guardado! ',
                                  text: '¿Qué desea hacer?',
                                  showCancelButton: true,
                                  focusConfirm: false,
                                  confirmButtonText:" .
                                    "'<a href=".'"agregarProducto.php"'.">Agregar producto</a>',
                                  cancelButtonText:" .
                                    "'<a href=".'"tablaProducto.php"'.">Ver los productos</a>'
                                });
                                </script>";
            header("Location: agregarProducto.php");
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
            header("Location: agregarProducto.php");
        }
        
    }
    
    public function mostrarProducto($ide){
        $producto = $this->modelo->consultaProducto($ide);
            return $producto;
    }
    
    public function mostrarResultadosBusqueda($busqueda){
        $producto= $this->modelo->consultarResultadosBusqueda($busqueda);
        $acu="";
        foreach ($producto as $produ){
            $acu .= '<div class="col-lg-4 col-md-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <a href="product.php?id='.$produ["id"].'"><img src="'.$produ["imagen"].'" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,18).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,30).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a class="bot" href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }    
    
    public function mostrarTodos(){
        $producto= $this->modelo->consultarProductos();
        $acu="";
        foreach ($producto as $produ){
            $acu .= '<div class="col-xl-4 col-lg-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <a href="product.php?id='.$produ["id"].'"><img src="'.$produ["imagen"].'" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,18).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,30).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a class="bot" href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
    public function mostrarPrincipal(){
        $producto= $this->modelo->consultarProductosPrincipal();
        $acu="";
        foreach ($producto as $produ){
            $acu .= '<div class="col-lg-4 col-md-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <a href="product.php?id='.$produ["id"].'"><img src="'.$produ["imagen"].'" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,18).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,30).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a class="bot" href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
    public function mostrarTodosCategoria($id){
        $producto= $this->modelo->consultarProductosCategoria($id);
        $acu="";
        foreach ($producto as $produ){
            $acu .= '<div class="col-lg-4 col-md-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <a href="product.php?id='.$produ["id"].'"><img src="'.$produ["imagen"].'" class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,23).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,33).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a class="bot" href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
     public function mostrarCategoriaProducto($id){
        $producto= $this->modelo->consultarCategoriaProducto($id);
        $acu="";
        foreach ($producto as $produ){
            $acu .= '<div class="col-lg-4 col-md-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <a href="product.php?id='.$produ["id"].'"><img src="'.$produ["imagen"].'" class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,25).'</h4>
                                <p class="card-text">'.substr($produ["description"],0,33).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a class="bot" href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
  
    public function mostrarProductoAdmin(){
        $producto= $this->modelo->consultarProductosAdmin();
        $acu="";
        foreach ($producto as $product){
            $acu.='<tbody>
						<tr>
                            <th scope="row"><h5>'.$product["id"].'</h5></th>
                            <th scope="row"><img style="width: auto; height: 80px" src="../' . $product["imagen"] . '"></th>
                            <th scope="row"><h5>'.$product["nombre"].'</h5></th>
                            <th scope="row"><h5>'.$product["categoria"].'</h5></th>
                            <th scope="row"><h5>'.$product["talla"].'</h5></th>
                            <th scope="row"><h5>$'.$product["precio"].'</h5></th>
                            <th scope="row"><h5>'.$product["marca"].'</h5></th>
                            <th scope="row"><h5>'.$product["color"].'</h5></th>
                            <th scope="row"><h5>'.$product["description"].'</h5></th>
						    <td><button type="button" class="btn btn-primary"><a href="editarProducto.php?id='.$product["id"].'"><i class="fa fa-edit"></i></a></button></td>
						    <td><button type="button" class="btn btn-danger"><a href="eliminarProducto.php?id='.$product["id"].'"><i class="fa fa-trash"></i></a></button></td>
						</tr>
					</tbody>';
        }
        return $acu;
    }

    public function editarProducto($id, $id_categoria, $imagen, $nombre, $description, $precio, $marca, $color, $talla){
        $this->modelo->actualizarProducto($id, $id_categoria, $imagen, $nombre, $description, $precio, $marca, $color, $talla);
        return $correcto = "<script>
                                  Swal.fire({
                                  title: 'Cambios hechos exitosamente!',
                                  type: 'success',
                                  showConfirmButton: true,
                                  confirmButtonText:" .
                                        "'<a href=".'"tablaProducto.php"'.">Continuar</a>'
                                });
                                </script>";
            header("Location: editarProducto.php");
    }

    public function eliminarProducto($id){
        $this->modelo->borrarProducto($id);
    }
    
    public function mostrarFiltro1($minimo, $maximo){
        $producto= $this->modelo->consultarFiltroValores($minimo, $maximo);
        $acu="";
        foreach ($producto as $produ){
            $acu .= '<div class="col-xl-4 col-lg-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <a href="product.php?id='.$produ["id"].'"><img src="'.$produ["imagen"].'" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,18).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,30).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a class="bot" href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
    public function mostrarFiltroTodos($valor){
        $producto= $this->modelo->consultarFiltroValores2($valor);
        $acu="";
        foreach ($producto as $produ){
            $acu .= '<div class="col-xl-4 col-lg-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <a href="product.php?id='.$produ["id"].'"><img src="'.$produ["imagen"].'" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,18).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,30).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a class="bot" href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
    public function mostrarFiltro3(){
        $producto= $this->modelo->consultarFiltroMarcas();
        $acu="";
        foreach ($producto as $produ){
            $acu .='<a class="dropdown-item" href="?marca='.$produ["marca"].'" value="'.$produ["marca"].'">'.$produ["marca"].'</a>';
        }
        return $acu;
    }

    public function mostrarPorMarca($marca){
        $producto=$this->modelo->consultarPorMarca($marca);
        $acu='';
        foreach ($producto as $produ){
            $acu .= '<div class="col-xl-4 col-lg-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <a href="product.php?id='.$produ["id"].'"><img src="'.$produ["imagen"].'" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,18).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,30).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a class="bot" href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }return $acu;
    }


}
