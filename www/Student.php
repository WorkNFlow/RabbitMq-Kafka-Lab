<?php
class Student {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS students (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $this->pdo->exec($sql);
    }

    public function save($name) {
        $stmt = $this->pdo->prepare("INSERT INTO students (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM students ORDER BY timestamp DESC");
        return $stmt->fetchAll();
    }
}
