<?php

// 1ojNEpP0LgRFeef2

class Database {
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;

    public function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        return $result;
    }

    public function fetch($result) {
        return $result->fetch_assoc();
    }

    public function numRows($result) {
        return $result->num_rows;
    }

    public function escapeString($string) {
        return $this->conn->real_escape_string($string);
    }

    public function close() {
        $this->conn->close();
    }
}

?>