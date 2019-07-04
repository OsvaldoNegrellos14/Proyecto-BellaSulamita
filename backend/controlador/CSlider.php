<?php

class CSlider {

    private $modelo;

    public function __construct() {
        $this->modelo = new MSlider();
    }

    public function subirNuevoSlider($imagen, $titulo, $informacion) {
        copy($imagen["tmp_name"], "../multimedia/" . $imagen["name"]);
        $this->modelo->agregarSlider("multimedia/" . $imagen["name"], $titulo, $informacion);
    }

    public function mostrarSlider($ide) {
        $producto = $this->modelo->consultaSlider($ide);
        return $producto;
    }

    public function mostrarSliderAdmin() {
        $slider = $this->modelo->consultarSliders();
        $acu = "";
        foreach ($slider as $slid) {
            $acu .= '<tbody>
                        <tr>
                            <th scope="row"><h5>' . $slid["id"] . '</h5></th>
                            <th scope="row"><h5>' . $slid["titulo"] . '</h5></th>
                            <th scope="row"><h5>' . $slid["informacion"] . '</h5></th>
                            <td><button type="button" class="btn btn-primary"><a href="editarSlider.php?id=' . $slid["id"] . '"><i class="fa fa-pencil-square-o"></i></a></button></td>
                            <td><button type="button" class="btn btn-primary"><a href="eliminarSlider.php?id=' . $slid["id"] . '"><i class="fa fa-trash"></i></a></button></td>
			</tr>
                    </tbody>';
        }
        return $acu;
    }

    public function editarSlider($id, $imagen, $titulo, $informacion) {
        copy($imagen["tmp_name"], "../multimedia/" . $imagen["name"]);
        $this->modelo->actualizarSlider($id, "multimedia/".$imagen["name"], $titulo, $informacion);
    }

    public function eliminarSlider($id) {
        $this->modelo->borrarSlider($id);
    }
    
    public function mostrarSliderPrincipal() {
        $slider= $this->modelo->consultarSliders();
        $acu='<div class="carousel-item active">';
        foreach ($slider as $slid){
            $acu .= '   <img style="height:970px"src="'. $slid["imagen"].'" class="img-slider d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>'. $slid["titulo"] .'</h5>
                            <p>'. $slid["informacion"] .'</p>
                            <a href="products.php?id='. $slid["id"] .'" class="btn btn-light">Ver Más</a>
                        </div>
                    </div>
                    <div class="carousel-item">';
        }
        return $acu;
    }

}
