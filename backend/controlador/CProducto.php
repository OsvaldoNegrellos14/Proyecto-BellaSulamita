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
