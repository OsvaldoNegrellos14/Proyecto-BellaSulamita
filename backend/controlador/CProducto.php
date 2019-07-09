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
            $acu .= '<div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="'.$produ["imagen"].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">'.$produ["nombre"].'</h4>
                                <p class="card-text">'.$produ["description"].'</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="product.php?id='.$produ["id"].'" class="btn btn-primary my-2">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
    public function mostrarProductoId(){
        $producto= $this->modelo->consultarProductosId($id);
        $acu="";
        foreach ($producto as $product){
            $acu.='<div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://picsum.photos/250/450?random=1" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <a href="product.php" class="btn btn-primary my-2">Ver Más</a>
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

    public function editarProducto($id, $imagen, $nombre, $description, $precio, $marca, $color, $talla){
        copy($imagen["tmp_name"], "../multimedia/".$imagen["name"]);
        $this->modelo->actualizarProducto($id, "multimedia/".$imagen["name"], $nombre, $description, $precio, $marca, $color, $talla);
    }

    public function eliminarProducto($id){
        $this->modelo->borrarProducto($id);
    }

}
