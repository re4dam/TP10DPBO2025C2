<?php
require_once 'config/Database.php';

class Dege
{
    private $conn;
    private $table = 'degenerate';
    private $jodohTable = 'jodoh'; // Add jodoh table name

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Method to check if the degenerate ID is used in the jodoh table
    public function isUsedInJodoh($id)
    {
        $query = "SELECT COUNT(*) as count FROM " . $this->jodohTable . " WHERE id_degenerate = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
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
        $query = "INSERT INTO " . $this->table . " (name, height, weight, kelamin) VALUES (:name, :height, :weight, :kelamin)";
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
        // Check if the record is used in jodoh table
        if ($this->isUsedInJodoh($id)) {
            return "Cannot delete: This Degenerate record is currently being used in Jodoh.";
        }

        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        }
        return "Error deleting record."; // Or be more specific with $stmt->errorInfo()
    }
}
