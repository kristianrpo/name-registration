<?php
class UserRepository {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function saveUser(User $user) {
        $connection = $this->database->connect();
        $name = $user->getName();
        $query = "INSERT INTO users (name) VALUES ('$name')";
        if ($this->database->createQuery($connection, $query) !== TRUE) {
            return "Existió algún problema al insertar el registro";
        }
        $this->database->disconnect($connection);
        return true;
    }

    public function fetchAllUsers() {
        $users = [];
        $connection = $this->database->connect();
        $query = "SELECT * FROM users";
        $sqlResponse = $this->database->createQuery($connection, $query);

        if ($sqlResponse && $sqlResponse->num_rows > 0) {
            while ($row = $sqlResponse->fetch_assoc()) {
                array_push($users, $row['name']);
            }
        }
        $this->database->disconnect($connection);
        return $users;
    }
}
?>