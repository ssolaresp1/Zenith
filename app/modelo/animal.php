<?php
class Animal {
    private $conn;
    private $table = 'animal';

    public $id;
    public $codigo;
    public $nombre;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo animal
    public function create() {
        $query = "INSERT INTO " . $this->table . " (codigo, nombre) VALUES (:codigo, :nombre)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':nombre', $this->nombre);

        return $stmt->execute();
    }

    // Leer todos los animales
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Leer un animal por ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt;
    }

    // Actualizar un animal
    public function update() {
        $query = "UPDATE " . $this->table . " SET codigo = :codigo, nombre = :nombre WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    // Eliminar un animal
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
}
?>
