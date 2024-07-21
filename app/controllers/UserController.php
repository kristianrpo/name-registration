<?php
require_once __DIR__ . '/../../config/database.php';
require __DIR__ . '/../models/User.php';
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
        $sql_response = $database->createQuery($connection,$sql);
        if($sql_response->num_rows>0){
            while($row = $sql_response->fetch_assoc()){
                array_push($names,$row["name"]);
            }
        }
        $database->disconnect($connection);
        require_once __DIR__ . '/../views/add_name.php';
    }
}
?>