<?php
class database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "asm";
    private $conn;

    public static $instance;

    // Singleton pattern: getInstance method
    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new database();
        }
        return self::$instance;
    }

    // Constructor to establish the database connection
    public function __construct(){
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Execute a query (INSERT, UPDATE, DELETE)
    public function execute($sql, $params = []){
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params); // Truyền params
    }

    // Execute a SELECT query and fetch all rows
    public function getAll($sql, $params = []){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params); // Truyền params ở đây
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Sử dụng PDO::FETCH_ASSOC để chỉ lấy mảng kết hợp
    }

    // Execute a SELECT query and fetch a single row
    public function getOne($sql, $params = []){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params); // Truyền params
        return $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng fetch() để lấy 1 bản ghi
    }

    // Execute a query and get the last inserted ID
    public function executeGetId($sql, $params = []){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params); // Truyền params
        return $this->conn->lastInsertId(); // Lấy ID vừa chèn
    }
}
?>
