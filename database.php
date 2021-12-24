<?php

require_once 'config.php';

class database {
    private string $username;
    private string $password;
    private string $database;
    private string $host;

    public function __construct() {
        $this->username = USERNAME;
        $this->database = DATABASE;
        $this->host = HOST;
        $this->password = PASSWORD;
    }

    public function connect() {
        try {
            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode" => "prefer"]
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $e) {
            die("Connection failed: ".$e->getMessage());
        }
    }


}