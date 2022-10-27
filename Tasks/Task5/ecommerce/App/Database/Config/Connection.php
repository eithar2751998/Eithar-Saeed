<?php
namespace App\Database\Config;

class Connection {
    private $hostName = "localhost";
    private $hostUserName = "root";
    private $hostPassword = "";
    private $database = "e-commerce";
    public \mysqli $conn;
    public function __construct() {
        $this->conn = new \mysqli($this->hostName,$this->hostUserName,$this->hostPassword,$this->database);
        // Check connection
        // if ($this->conn->connect_error) {
        //     die("Connection failed: " . $this->conn->connect_error);
        // }
        // echo "Connected successfully";
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}