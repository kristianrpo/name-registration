<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

class Database{

    private $server;
    private $user;
    private $password;
    private $database;

    public function __construct(){
        $this->server = $_ENV["DB_SERVER"];
        $this->user = $_ENV["DB_USERNAME"];
        $this->password = $_ENV["DB_PASSWORD"];
        $this->database = $_ENV["DB_DATABASE"];
    }

    public function connect(){
        $connection = new mysqli($this->server, $this->user, $this->password, $this->database);
        return $connection;
    }
    public function disconnect($connection){
        $connection->close();
    }
    public function createQuery($connection,$sql){
        $sqlResponse = $connection->query($sql);
        return $sqlResponse;
    }


}