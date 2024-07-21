<?php
class User{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function save($database){
        $sql = "INSERT INTO users (name) VALUES ('$this->name')";
        if($database->createQuery($database->connect(),$sql)!==TRUE){
            return "Existió algún problema al insertar el registro";
        };
    }

}