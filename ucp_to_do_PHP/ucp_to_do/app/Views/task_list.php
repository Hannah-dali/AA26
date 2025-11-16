<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List MVC</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
    <div class="container">
        <h1> To-Do List MVC (PHP)</h1>

        <form method="POST" action="index.php?action=crear" class="task-form">
            <input type="text" name="descripcion" placeholder="Escribe tu nueva tarea..." required>
            <button type="submit">Añadir</button>
        </form>

        <ul class="task-list">
            <?php if (empty($tareas)): ?>
                <p>¡No tienes tareas pendientes! </p>
            <?php endif; ?>

            <?php foreach ($tareas as $tarea): ?> 
                <li class="<?= $tarea['completada'] ? 'completed' : '' ?>">
                    <span class="description"><?= htmlspecialchars($tarea['descripcion']) ?></span>
                    <div class="actions">
                        <?php 
                        $new_state = $tarea['completada'] ? 0 : 1; 
                        $action_text = $tarea['completada'] ? 'Reabrir' : 'Completar';
                        ?>
                        <a href="index.php?action=completar&id=<?= $tarea['id'] ?>&estado=<?= $new_state ?>" class="action-btn complete-btn">
                            <?= $action_text ?>
                        </a>
                        
                        <a href="index.php?action=eliminar&id=<?= $tarea['id'] ?>" class="action-btn delete-btn">
                            Eliminar
                        </a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>