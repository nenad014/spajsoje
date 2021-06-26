<?php

class Connection {

    private $host = 'localhost';
    private $dbName = 'spajsoje';
    private $user = 'root';
    private $password = '';

    private $conn;

    public function getConnection() {
        $this->conn = NULL;

        try {
            $this->conn = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbName, $this->user, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }

        return $this->conn;
    }
}