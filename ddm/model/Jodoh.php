<?php
require_once 'config/Database.php';

class Jodoh
{
    private $conn;
    private $table = 'jodoh';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT j.*, 
                     d.name AS degenerate_name, 
                     h.name AS haluan_name
              FROM " . $this->table . " j
              JOIN degenerate d ON j.id_degenerate = d.id
              JOIN haluan h ON j.id_haluan = h.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT j.*, 
            d.name AS degenerate_name,
            h.name AS haluan_name FROM " . $this->table . " j
            JOIN degenerate d ON j.id_degenerate = d.id
            JOIN haluan h ON j.id_haluan = h.id
            WHERE j.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($id_degenerate, $id_haluan)
    {
        $query = "INSERT INTO " . $this->table . " (id_degenerate, id_haluan) VALUES (:id_degenerate, :id_haluan)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_degenerate', $id_degenerate);
        $stmt->bindParam(':id_haluan', $id_haluan);
        return $stmt->execute();
    }

    public function update($id, $id_degenerate, $id_haluan)
    {
        $query = "UPDATE " . $this->table . " SET id_degenerate = :id_degenerate, id_haluan = :id_haluan WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_degenerate', $id_degenerate);
        $stmt->bindParam(':id_haluan', $id_haluan);
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
