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
    
    public function consultarTodas(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM formulario");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function consultaFormulario($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM formulario where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            foreach ($stmt->fetchAll() as $registro) {
                return $registro;
            }
            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function borrarFormulario($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM formulario where id=:id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}
