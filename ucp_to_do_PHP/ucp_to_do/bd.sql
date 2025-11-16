-- Estructura de la Base de Datos 'todo_app'

CREATE DATABASE IF NOT EXISTS `todo_app`;
USE `todo_app`;

CREATE TABLE `tareas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(255) NOT NULL,
  `completada` TINYINT(1) NOT NULL DEFAULT 0,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tareas de ejemplo
INSERT INTO `tareas` (`descripcion`, `completada`) VALUES
('Diseñar la estructura MVC', 1),
('Implementar la conexión a la BD', 0),
('Añadir funcionalidad de eliminar con JS', 0); 