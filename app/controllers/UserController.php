<?php
require_once __DIR__ . "/../config/Database.php";
require __DIR__ . "/../models/User.php";
class UserController{
    public function index(){
        $names = [];
        $database = new Database();
        $connection = $database->connect();
        if($_POST){
            $name = $_POST["name"];
            $user = new User($name);
            $user->save($database);
        }
        $sql = "SELECT * FROM users";
        $sqlResponse = $database->createQuery($connection,$sql);
        if($sqlResponse->num_rows>0){
            while($row = $sqlResponse->fetch_assoc()){
                array_push($names,$row["name"]);
            }
        }
        $database->disconnect($connection);
        require_once __DIR__ . "/../views/AddUserView.php";
    }
}
?>