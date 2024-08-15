-- =========================================================
-- Autor: YAGUAR, Eduardo
-- Descripción: Esquema de la base de datos para el sistema de gestión de cursos
-- Versión: 1.0
-- =========================================================

-- Crear base de datos
CREATE DATABASE IF NOT EXISTS gcursos;

-- Seleccionar base de datos
USE gcursos;

-- Eliminar tablas si existen
DROP TABLE IF EXISTS Inscripciones;
DROP TABLE IF EXISTS Estudiantes;
DROP TABLE IF EXISTS Cursos;

-- Crear tabla Cursos
CREATE TABLE Cursos (
  curso_id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  fecha_inicio DATE,
  fecha_fin DATE,
  estado INT
);

-- Crear tabla Estudiantes
CREATE TABLE Estudiantes (
  estudiante_id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  fecha_nacimiento DATE,
  estado INT
);

-- Crear tabla Inscripciones
CREATE TABLE Inscripciones (
  inscripcion_id INT PRIMARY KEY AUTO_INCREMENT,
  estudiante_id INT NOT NULL,
  curso_id INT NOT NULL,
  fecha_inscripcion DATE,
  estado INT,
  FOREIGN KEY (estudiante_id) REFERENCES Estudiantes(estudiante_id),
  FOREIGN KEY (curso_id) REFERENCES Cursos(curso_id)
);