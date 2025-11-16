<?php
require_once ROOT_PATH . '/app/Models/Database.php';

class TareaModel {
    private $db;
 
    public function __construct() {
        $this->db = new Database();
    }

    // C - CREATE: Crear una nueva tarea
    public function crearTarea($descripcion) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("INSERT INTO tareas (descripcion) VALUES (?)");
        return $stmt->execute([$descripcion]);
    }

    // R - READ: Obtener todas las tareas
    public function obtenerTareas() {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->query("SELECT * FROM tareas ORDER BY completada ASC, id DESC");
        return $stmt->fetchAll();
    }

    // U - UPDATE: Actualizar estado de completada
    public function actualizarEstado($id, $completada) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("UPDATE tareas SET completada = ? WHERE id = ?");
        return $stmt->execute([$completada, $id]);
    }

    // D - DELETE: Eliminar una tarea
    public function eliminarTarea($id) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("DELETE FROM tareas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>