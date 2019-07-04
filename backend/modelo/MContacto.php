<?php

class MContacto  extends BD{

    public function insertarComentario($nombre, $telefono, $asunto, $mensaje) {
        try {
            $stmt = $this->conn->prepare("insert into formulario(nombre,telefono,asunto,mensaje) values(:nombre, :telefono, :asunto, :mensaje)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':asunto', $asunto);
            $stmt->bindParam(':mensaje', $mensaje);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
