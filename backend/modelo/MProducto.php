<?php

class MProducto extends BD {
    
    public function agregarProducto($categoria, $imagen, $nombre,$description,$precio,$marca,$color,$talla){
        try {
            $stmt = $this->conn->prepare("insert into productos(id_categoria,imagen,nombre,description,precio,marca,color,talla) values (:id_categoria, :imagen, :nombre, :description, :precio, :marca, :color, :talla)");
            $stmt->bindParam(':id_categoria', $categoria);
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
    
//    public function consultarTodosPaginador(){
//        try {
//            $stmt = $this->conn->prepare("SELECT productos.*, categoria FROM productos inner join categoria on productos.id_categoria=categoria.id order by productos.id");
//            $stmt->execute();
//            return $stmt->fetchAll();
//           
//        } catch (PDOException $e) {
//            echo "Error: " . $e->getMessage();
//        }
//    }
//    
//    public function consultarTodosPaginador2($startFrom, $showRecordPerPage){
//        try {
//            $stmt = $this->conn->prepare("SELECT productos.*, categoria FROM productos inner join categoria on productos.id_categoria=categoria.id order by productos.id limit :inicio, :final");
//            $stmt->bindParam(':inicio', $startFrom);
//            $stmt->bindParam(':final', $showRecordPerPage);
//            $stmt->execute();
//            return $stmt->fetchAll();
//           
//        } catch (PDOException $e) {
//            echo "Error: " . $e->getMessage();
//        }
//    }

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
            $stmt = $this->conn->prepare("SELECT productos.*, categoria FROM productos inner join categoria on productos.id_categoria=categoria.id order by productos.id");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    
    public function consultarProductosAdmin(){
        try {
            $stmt = $this->conn->prepare("SELECT productos.*, categoria FROM productos inner join categoria on productos.id_categoria=categoria.id order by productos.id desc");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function consultarFiltro($valor){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM productos inner join categoria on productos.id_categoria=categoria.id group by :valor");
            $stmt->bindParam(':valor', $valor);
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
            $stmt = $this->conn->prepare("UPDATE productos set id_categoria=:id_categoria, imagen=:imagen, nombre=:nombre, description=:description, precio=:precio, marca=:marca, color=:color, talla=:talla where id=:id");
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
    
    public function consultarResultadosBusqueda($busqueda){
        try {
            $search = "%".$busqueda."%";
            $stmt = $this->conn->prepare("SELECT productos.* FROM productos inner join categoria on productos.id_categoria=categoria.id"
                    . " where description LIKE :busqueda or nombre LIKE :busqueda or precio LIKE :busqueda or "
                    . "marca LIKE :busqueda or color LIKE :busqueda or talla LIKE :busqueda or categoria.categoria LIKE :busqueda");
            $stmt->bindParam(':busqueda', $search);
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function consultarFiltroValores($minimo, $maximo){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM productos where precio between :minimo and :maximo order by precio asc");
            $stmt->bindParam(':minimo', $minimo);
            $stmt->bindParam(':maximo', $maximo);
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }    
    
    public function consultarFiltroValores2($valor){
        try {
            $stmt = $this->conn->prepare("SELECT productos.* FROM categoria inner join productos on categoria.id = productos.id_categoria where categoria.categoria = :valor");
            $stmt->bindParam(':valor', $valor);
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } 
    
    public function consultarPorMarca($marca){
        try{
            $stmt=$this->conn->prepare("SELECT * from productos where marca=:marca");
            $stmt->bindParam(':marca',$marca);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }
    
    public function consultarFiltroMarcas(){
        try {
            $stmt = $this->conn->prepare("SELECT marca from productos group by marca");
            $stmt->execute();
            return $stmt->fetchAll();
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    
}
