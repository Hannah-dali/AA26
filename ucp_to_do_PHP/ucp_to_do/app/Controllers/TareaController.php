<?php
// Usamos la ruta absoluta definida en index.php
require_once ROOT_PATH . '/app/Models/TareaModel.php'; 

class TareaController {
    private $model;

    public function __construct() {
        $this->model = new TareaModel();
    }

    // 1. Mostrar la lista de tareas
    public function index() {
        $tareas = $this->model->obtenerTareas(); // Obtiene datos del Modelo
        require_once ROOT_PATH . '/app/Views/task_list.php'; // Carga la Vista
    }

    // 2. Crear nueva tarea
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['descripcion'])) {
            $descripcion = htmlspecialchars(trim($_POST['descripcion']));
            $this->model->crearTarea($descripcion);
        }
        header("Location: index.php"); 
        exit(); 
    }

    // 3. Eliminar tarea
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $this->model->eliminarTarea($id);
        }
        header("Location: index.php");
        exit();
    }
    
    // 4. Marcar/Desmarcar tarea
    public function completar() {
        if (isset($_GET['id']) && isset($_GET['estado'])) {
            $id = (int)$_GET['id'];
            $estado = (int)$_GET['estado'];
            $this->model->actualizarEstado($id, $estado);
        }
        header("Location: index.php");
        exit();
    }
}
?>