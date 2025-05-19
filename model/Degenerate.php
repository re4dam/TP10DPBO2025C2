<?php
require_once 'config/Database.php';

class Degenerate
{
    private $conn;
    private $table = 'degenerate';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $height, $weight, $kelamin)
    {
        $query = "INSERT INTO " . $this->table . " (name, height, weight, kelamin) (:name, :height, :weight, :kelamin)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':height', $height);
        $stmt->bindParam(':weight', $weight);
        $stmt->bindParam(':kelamin', $kelamin);
        return $stmt->execute();
    }

    public function update($id, $name, $height, $weight, $kelamin)
    {
        $query = "UPDATE " . $this->table . " SET name = :name, height = :height, weight = :weight, kelamin = :kelamin WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':height', $height);
        $stmt->bindParam(':weight', $weight);
        $stmt->bindParam(':kelamin', $kelamin);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
