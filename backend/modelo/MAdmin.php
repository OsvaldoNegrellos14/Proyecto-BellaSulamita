<?php

class MAdmin extends BD {
    
    public function autentificar($username,$password){
         try {
            $passw= md5($password);
            $stmt = $this->conn->prepare("SELECT * FROM administrador where username=:username and password=:password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $passw);
            $stmt->execute();
            foreach ($stmt->fetchAll() as $registro) {
                return $registro;
            }
            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}
