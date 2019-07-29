<?php

class MProducto extends BD {
    
    public function agregarProducto($imagen,$nombre,$description,$precio,$marca,$color,$talla){
        try {
            $stmt = $this->conn->prepare("insert into productos(imagen,nombre,description,precio,marca,color,talla) values (:imagen, :nombre, :description, :precio, :marca, :color, :talla)");
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':talla', $talla);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function consultaProducto($id) {
        try {
            $stmt = $this->conn->prepare("SELECT productos.*, categoria FROM productos inner join categoria on productos.id_categoria=categoria.id where productos.id=:id");
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

    public function consultarProductos(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM productos");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function consultarProductosPrincipal(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM productos ORDER BY id desc LIMIT 6");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    public function consultarProductosCategoria($id){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM productos where id_categoria=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function consultarCategoriaProducto($id){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM productos where id_categoria=:id order by rand() limit 3");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function actualizarProducto($id, $id_categoria, $imagen, $nombre, $description, $precio, $marca, $color, $talla){
        try {
            $stmt = $this->conn->prepare("UPDATE productos set id_categoria=:id_categoria imagen=:imagen, nombre=:nombre, description=:description, precio=:precio, marca=:marca, color=:color, talla=:talla where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':talla', $talla);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function borrarProducto($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM productos where id=:id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}
