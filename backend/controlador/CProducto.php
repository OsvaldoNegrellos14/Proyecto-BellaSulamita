<?php

class CProducto {
    private $modelo;
    public function __construct() {
        $this->modelo= new MProducto();
    }

    public function subirNuevoProducto($imagen, $nombre, $description, $precio, $marca, $color, $talla){
        copy($imagen["tmp_name"], "../multimedia/".$imagen["name"]);
        $this->modelo->agregarProducto("multimedia/".$imagen["name"], $nombre, $description, $precio, $marca, $color, $talla);
    }
    
    public function mostrarProducto($ide){
        $producto = $this->modelo->consultaProducto($ide);
            return $producto;
    }
    
    
    
    public function mostrarTodos(){
        $producto= $this->modelo->consultarProductos();
        $acu="";
        foreach ($producto as $produ){
            $acu .= '<div class="col-lg-4 col-md-6 col-sm-12">
                        <div id="productos" class="card mb-4 shadow-sm">
                            <img src="'.$produ["imagen"].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,18).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,30).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
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
                            <img src="'.$produ["imagen"].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,18).'...</h4>
                                <p class="card-text">'.substr($produ["description"],0,30).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
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
                            <img src="'.$produ["imagen"].'" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,25).'</h4>
                                <p class="card-text">'.substr($produ["description"],0,38).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
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
                            <img src="'.$produ["imagen"].'" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">'.substr($produ["nombre"],0,25).'</h4>
                                <p class="card-text">'.substr($produ["description"],0,38).'...</p>
                                <div >
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center"><h5>$'. $produ["precio"] .'.00</h5></div>
                                            <div class="col-6"><a href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
    

    public function mostrarProductoAdmin(){
        $producto= $this->modelo->consultarProductos();
        $acu="";
        foreach ($producto as $product){
            $acu.='<tbody>
						<tr>
                            <th scope="row"><h5>'.$product["id"].'</h5></th>
                            <th scope="row"><h5>'.$product["nombre"].'</h5></th>
                            <th scope="row"><h5>'.$product["talla"].'</h5></th>
                            <th scope="row"><h5>'.$product["precio"].'</h5></th>
                            <th scope="row"><h5>'.$product["marca"].'</h5></th>
                            <th scope="row"><h5>'.$product["color"].'</h5></th>
                            <th scope="row"><h5>'.$product["description"].'</h5></th>
						    <td><button type="button" class="btn btn-primary"><a href="editarProducto.php?id='.$product["id"].'"><i class="fa fa-pencil-square-o"></i></a></button></td>
						    <td><button type="button" class="btn btn-primary"><a href="eliminarProducto.php?id='.$product["id"].'"><i class="fa fa-trash"></i></a></button></td>
						</tr>
					</tbody>';
        }
        return $acu;
    }

    public function editarProducto($id, $id_categoria, $imagen, $nombre, $description, $precio, $marca, $color, $talla){
        copy($imagen["tmp_name"], "../multimedia/".$imagen["name"]);
        $this->modelo->actualizarProducto($id, $id_categoria, "multimedia/".$imagen["name"], $nombre, $description, $precio, $marca, $color, $talla);
    }

    public function eliminarProducto($id){
        $this->modelo->borrarProducto($id);
    }

}
