<?php

class conexion{
     #atributos que son propios del objeto
     private $servidor ="localhost";
     private $usuario ="id21022779_jeanfrancos";
     private $pass = 'Ormabo2023.';
     private $conexion;
    //  id21022779_proyectos
 
    
     public function __construct(){
         #condicional de errores, manejo de excepciones
         try{
             $this->conexion = new PDO("mysql:host=$this->servidor;dbname=id21022779_proyectos",$this->usuario,$this->pass);
             #ACTIVAMOS LOS ERRORES Y LAS EXCEPTIONs
             $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); #accedemos a un metodo de la clase pdo, que nos permite activar los errores y las excepciones(:: constante estatica)
 
         }catch(PDOException $e){
             return "Falla de Conexión".$e;
         }
     }

    public function ejecutar($sql){
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }
    public function consultar($sql){ # select 
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }


}

?>