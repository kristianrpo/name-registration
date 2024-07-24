<?php
require __DIR__ . "/../config/Database.php";
require __DIR__ . "/../models/UserModel.php";
require __DIR__ . "/../repository/UserRepository.php";

class UserController{

    private $database;
    private $userRepository;

    public function __construct() {
        $this->database = new Database();
        $this->userRepository = new UserRepository($this->database);
    }

    public function index(){
        if($_POST){
            $name = $_POST["name"];
            $user = new User($name);
            $this->userRepository->saveUser($user);
        }

        $users = $this->userRepository->fetchAllUsers();
        require __DIR__ . "/../views/UserAddView.php";
    }
}
?>