<?php

class Database {
    private $host = DB_HOST;
    private $port = DB_PORT;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;
    private $conn;

    // Chuyển __construct thành public
    public function __construct() {
        // Khởi tạo kết nối ở đây
    }

    public function getConnection() {
        if ($this->conn === null) {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }
}

