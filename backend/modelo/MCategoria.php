<?php

class MCategoria extends BD {
    
    public function agregarCategoria($categoria, $imagen){
        try {
            $stmt = $this->conn->prepare("insert into categoria(categoria, imagen) values (:categoria, :imagen)");
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':imagen', $imagen);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function consultaCategoria($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM categoria where id=:id");
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

    public function consultarCategorias(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM categoria");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function consultarCategoriaUnico(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM categoria");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function actualizarCategoria($id, $categoria, $imagen){
        try {
            $stmt = $this->conn->prepare("UPDATE categoria set categoria=:categoria, imagen=:imagen where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':imagen', $imagen);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function borrarCategoria($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM categoria where id=:id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}
