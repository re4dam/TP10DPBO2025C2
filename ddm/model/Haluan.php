<?php
require_once 'config/Database.php';

class Haluan
{
    private $conn;
    private $table = 'haluan';
    private $jodohTable = 'jodoh'; // Add jodoh table name

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Method to check if the haluan ID is used in the jodoh table
    public function isUsedInJodoh($id)
    {
        $query = "SELECT COUNT(*) as count FROM " . $this->jodohTable . " WHERE id_haluan = :id";
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

    public function create($name, $asal, $kelamin, $stereotipe)
    {
        $query = "INSERT INTO " . $this->table . " (name, asal, kelamin, stereotipe) VALUES (:name, :asal, :kelamin, :stereotipe)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':asal', $asal);
        $stmt->bindParam(':kelamin', $kelamin);
        $stmt->bindParam(':stereotipe', $stereotipe);
        return $stmt->execute();
    }

    public function update($id, $name, $asal, $kelamin, $stereotipe)
    {
        $query = "UPDATE " . $this->table . " SET name = :name, asal = :asal, kelamin = :kelamin, stereotipe = :stereotipe WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':asal', $asal);
        $stmt->bindParam(':kelamin', $kelamin);
        $stmt->bindParam(':stereotipe', $stereotipe);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        // Check if the record is used in jodoh table
        if ($this->isUsedInJodoh($id)) {
            return "Cannot delete: This Haluan record is currently being used in Jodoh.";
        }

        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        }
        return "Error deleting record."; // Or be more specific
    }
}
