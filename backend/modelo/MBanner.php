<?php

class MBanner extends BD {
    
    public function agregarBanner($titulo,$descripcion,$imagen){
        try {
            $stmt = $this->conn->prepare("insert into banner(titulo,descripcion,imagen) values(:titulo, :descripcion, :imagen)");
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':imagen', $imagen);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function consultaBanner($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM banner where id=:id");
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

    public function consultarBanners(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM banner");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function editarBanner($id, $titulo, $descripcion, $imagen){
        try {
            $stmt = $this->conn->prepare("UPDATE banner set titulo=:titulo, descripcion=:descripcion, imagen=:imagen where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':imagen', $imagen);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function borrarBanner($id){
        try {
            $stmt= $this->conn->prepare("delete from banner where id=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}