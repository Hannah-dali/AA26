<?php
// Define la ruta absoluta al directorio raíz (todo-mvc)
define('ROOT_PATH', dirname(__DIR__));

// Carga la clase principal del Controlador
require_once ROOT_PATH . '/app/Controllers/TareaController.php';

// Inicializa el Controlador
$controller = new TareaController();

// 1. Obtiene la acción de la URL (ej: index.php?action=eliminar)
$action = $_GET['action'] ?? 'index'; 

// 2. Enrutamiento: Llama al método del controlador según la acción
switch ($action) {
    case 'crear':
        $controller->crear();
        break;
    case 'eliminar': 
        $controller->eliminar();
        break;
    case 'completar':
        $controller->completar( );
        break;
    case 'index':
    default:
        $controller->index(); // Carga la lista de tareas
        break;
}
?>