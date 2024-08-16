-- =========================================================
-- Autor: YAGUAR, Eduardo
-- Descripción: Datos de prueba para el sistema de gestión de cursos
-- Versión: 1.0
-- =========================================================

-- Seleccionar base de datos
USE gcursos;

-- Insertar datos en la tabla Cursos
INSERT INTO Cursos (nombre, descripcion, fecha_inicio, fecha_fin, estado) VALUES
('Curso de PHP', 'Curso de programación en PHP', '2022-01-01', '2022-01-31', 1),
('Curso de JavaScript', 'Curso de programación en JavaScript', '2022-02-01', '2022-02-28', 1),
('Curso de HTML/CSS', 'Curso de diseño web con HTML y CSS', '2022-03-01', '2022-03-31', 1),
('Curso de Python', 'Curso de programación en Python', '2022-04-01', '2022-04-30', 1),
('Curso de Java', 'Curso de programación en Java', '2022-05-01', '2022-05-31', 1),
('Curso de C++', 'Curso de programación en C++', '2022-06-01', '2022-06-30', 1),
('Curso de Ruby', 'Curso de programación en Ruby', '2022-07-01', '2022-07-31', 1),
('Curso de Swift', 'Curso de programación en Swift', '2022-08-01', '2022-08-31', 1),
('Curso de Go', 'Curso de programación en Go', '2022-09-01', '2022-09-30', 1),
('Curso de Rust', 'Curso de programación en Rust', '2022-10-01', '2022-10-31', 1);

-- Insertar datos en la tabla Estudiantes
INSERT INTO Estudiantes (nombre, apellido, email, fecha_nacimiento, estado) VALUES
('Juan', 'Pérez', 'juan.perez@example.com', '1990-01-01', 1),
('María', 'González', 'maria.gonzalez@example.com', '1992-02-02', 1),
('Carlos', 'López', 'carlos.lopez@example.com', '1995-03-03', 1),
('Ana', 'Rodríguez', 'ana.rodriguez@example.com', '1998-04-04', 1),
('Pedro', 'Hernández', 'pedro.hernandez@example.com', '2000-05-05', 1),
('Sofía', 'García', 'sofia.garcia@example.com', '2002-06-06', 1),
('Luis', 'Martínez', 'luis.martinez@example.com', '2004-07-07', 1),
('Isabel', 'Sánchez', 'isabel.sanchez@example.com', '2006-08-08', 1),
('Francisco', 'Díaz', 'francisco.diaz@example.com', '2008-09-09', 1),
('Elena', 'Fernández', 'elena.fernandez@example.com', '2010-10-10', 1);

-- Insertar datos en la tabla Inscripciones
INSERT INTO Inscripciones (estudiante_id, curso_id, fecha_inscripcion, estado) VALUES
(1, 1, '2022-01-01', 1),
(2, 2, '2022-02-01', 1),
(3, 3, '2022-03-01', 1),
(4, 4, '2022-04-01', 1),
(5, 5, '2022-05-01', 1),
(6, 6, '2022-06-01', 1),
-- (7, 7, '2022-07-01', 1),
-- (8, 8, '2022-08-01', 1),
-- (9, 9, '2022-09-01', 1),
(10, 10, '2022-10-01', 1);
