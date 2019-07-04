<?php

class CBanner {

    private $modelo;

    public function __construct() {
        $this->modelo = new MBanner();
    }

    public function mostrarBanner($ide) {
        $banner = $this->modelo->consultaBanner($ide);
        return $banner;
    }

    public function mostrarBannerAdmin() {
        $banner = $this->modelo->consultarBanners();
        $acu = "";
        foreach ($banner as $bann) {
            $acu .= '<tbody>
			<tr>
                            <th scope="row"><h5>' . $bann["id"] . '</h5></th>
                            <th scope="row"><h5>' . $bann["titulo"] . '</h5></th>
                            <th scope="row"><h5>' . $bann["descripcion"] . '</h5></th>
                            <td><button type="button" class="btn btn-primary"><a href="editarBanner.php?id='.$bann["id"].'"><i class="fa fa-pencil-square-o"></i></a></button></td>
                            <td><button type="button" class="btn btn-primary"><a href="eliminarBanner.php?id='.$bann["id"].'"><i class="fa fa-trash"></i></a></button></td>
			</tr>
                    </tbody>';
        }
        return $acu;
    }

    public function subirNuevoBanner($titulo, $descripcion, $imagen) {
        copy($imagen["tmp_name"], "../multimedia/" . $imagen["name"]);
        $this->modelo->agregarBanner($titulo, $descripcion, "multimedia/" . $imagen["name"]);
    }

    public function actualizarBanner($id, $titulo, $descripcion, $imagen) {
        copy($imagen["tmp_name"], "../multimedia/".$imagen["name"]);
        $this->modelo->editarBanner($id, $titulo, $descripcion, "multimedia/".$imagen["name"]);
    }

    public function eliminarBanner($id) {
        $banner = $this->modelo->borrarBanner($id);
    }

}
