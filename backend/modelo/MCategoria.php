<?php

class MCategoria extends BD {
    
    public function agregarCategoria($categoria){
        try {
            $stmt = $this->conn->prepare("insert into categoria(categoria) values (:categoria)");
            $stmt->bindParam(':categoria', $categoria);
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

    public function actualizarCategoria($id, $categoria){
        try {
            $stmt = $this->conn->prepare("UPDATE categoria set categoria=:categoria where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':categoria', $categoria);
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
