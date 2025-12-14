<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "cafe_db";
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli(
            $this->host, 
            $this->username, 
            $this->password, 
            $this->database
        );

        if ($this->connection->connect_error) {
            die("Koneksi gagal: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function __destruct() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
?>