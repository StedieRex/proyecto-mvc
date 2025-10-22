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
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($titulo, $autor, $anio) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("INSERT INTO {$this->table} (titulo, autor, anio) VALUES (:titulo, :autor, :anio)");
        
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
        $stmt->bindParam(':anio', $anio, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function update($id, $titulo, $autor, $anio) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("UPDATE {$this->table} SET titulo = :titulo, autor = :autor, anio = :anio WHERE id = :id");
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
        $stmt->bindParam(':anio', $anio, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>