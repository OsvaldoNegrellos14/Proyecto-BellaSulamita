<?php

class MSlider extends BD {
    
    public function agregarSlider($imagen,$titulo,$informacion){
        try {
            $stmt = $this->conn->prepare("insert into slider(imagen,titulo,informacion) values (:imagen, :titulo, :informacion)");
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':informacion', $informacion);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function consultaSlider($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM slider where id=:id");
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

    public function consultarSliders(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM slider");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function actualizarSlider($id, $imagen, $titulo, $informacion){
        try {
            $stmt = $this->conn->prepare("UPDATE slider set imagen=:imagen, titulo=:titulo, informacion=:informacion where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':informacion', $informacion);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function borrarSlider($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM slider where id=:id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    
}
