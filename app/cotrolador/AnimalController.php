<?php
require_once 'app/modelo/Animal.php';

class AnimalController {
    private $animal;
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
        $this->animal = new Animal($this->conn);
    }

    // Crear un nuevo animal
    public function create($codigo, $nombre) {
        $this->animal->codigo = $codigo;
        $this->animal->nombre = $nombre;
        return $this->animal->create();
    }

    // Leer todos los animales
    public function read() {
        return $this->animal->read();
    }

    // Leer un animal por ID
    public function readOne($id) {
        $this->animal->id = $id;
        return $this->animal->readOne();
    }

    // Actualizar un animal
    public function update($id, $codigo, $nombre) {
        $this->animal->id = $id;
        $this->animal->codigo = $codigo;
        $this->animal->nombre = $nombre;
        return $this->animal->update();
    }

    // Eliminar un animal
    public function delete($id) {
        $this->animal->id = $id;
        return $this->animal->delete();
    }
}
?>
