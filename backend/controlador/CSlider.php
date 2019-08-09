<?php

class CSlider {

    private $modelo;

    public function __construct() {
        $this->modelo = new MSlider();
    }

    public function subirNuevoSlider($imagen, $titulo, $informacion) {
        if (!empty($_FILES["imagen"]) && !empty($_POST["titulo"]) && !empty($_POST["informacion"])) {
            copy($imagen["tmp_name"], "../multimedia/" . $imagen["name"]);
            $this->modelo->agregarSlider("multimedia/" . $imagen["name"], $titulo, $informacion);
            return $correcto = "<script>
                                Swal.fire({
                                  type: 'success',
                                  title: 'El Slider se ha guardado! ',
                                  text: '¿Qué desea hacer?',
                                  showCancelButton: true,
                                  focusConfirm: false,
                                  confirmButtonText:" .
                                    "'<a href=".'"agregarSlider.php"'.">Agregar slider</a>',
                                  cancelButtonText:" .
                                    "'<a href=".'"tablaSlider.php"'.">Ver los sliders</a>'
                                });
                                </script>";
            header("Location: tablaSlider.php");
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
            header("Location: agregarSlider.php");
        }
        
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
                            <th scope="row"><img style="width: auto; height: 80px" src="../' . $slid["imagen"] . '"></th>
                            <th scope="row"><h5>' . $slid["titulo"] . '</h5></th>
                            <th scope="row"><h5>' . $slid["informacion"] . '</h5></th>
                            <td><button type="button" class="btn btn-primary"><a href="editarSlider.php?id=' . $slid["id"] . '"><i class="fa fa-edit"></i></a></button></td>
                            <td><button type="button" class="btn btn-danger"><a href="eliminarSlider.php?id=' . $slid["id"] . '"><i class="fa fa-trash"></i></a></button></td>
			</tr>
                    </tbody>';
        }
        return $acu;
    }

    public function editarSlider($id, $imagen, $titulo, $informacion) {
        $this->modelo->actualizarSlider($id, $imagen, $titulo, $informacion);
        return $correcto = "<script>
                                  Swal.fire({
                                  title: 'Cambios hechos exitosamente! ',
                                  type: 'success',
                                  showConfirmButton: true,
                                  confirmButtonText:" .
                                        "'<a href=".'"tablaSlider.php"'.">Continuar</a>'
                                });
                                </script>";
        header("Location: editarSlider.php");
    }

    public function eliminarSlider($id) {
        $this->modelo->borrarSlider($id);
        return $correcto = "<script>
                                  Swal.fire({
                                  title: 'Slider eliminado exitosamente! ',
                                  type: 'success',
                                  showConfirmButton: true,
                                  confirmButtonText:" .
                                        "'<a href=".'"tablaSlider.php"'.">Continuar</a>'
                                });
                                </script>";
    }
    
}
