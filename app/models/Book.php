<?php
require_once __DIR__ . '/../core/Database.php';

class Book {
    private $db;
    private $table = 'libros';

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($titulo, $autor, $año) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("INSERT INTO {$this->table} (titulo, autor, año) VALUES (:titulo, :autor, :año)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':año', $año);
        return $stmt->execute();
    }

    public function update($id, $titulo, $autor, $año) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("UPDATE {$this->table} SET titulo = :titulo, autor = :autor, año = :año WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':año', $año);
        return $stmt->execute();
    }

    public function delete($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>