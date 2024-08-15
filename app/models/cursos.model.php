<?php
/**
 * Archivo: Cursos.php
 * Descripción: Clase para manejar cursos en la base de datos
 * Autor: YAGUAR, Eduardo
 * Fecha: 14/08/2024
 */

//require_once('../config/config.php');
require_once(__DIR__ . '/../config/config.php');

class Cursos
{
    private $con;

    // TODO: Establecer conexión a la base de datos en el constructor
    public function __construct()
    {
        $this->con = (new ClaseConectar())->conectar();
    }

    // TODO: Obtener todos los cursos de la base de datos
    
    public function todos()
    {
        try {
            $query = "SELECT * FROM Cursos";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener cursos: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    //TODO: Obtener un curso por ID de la base de datos
    
    public function uno($curso_id)
    {
        try {
            $query = "SELECT * FROM Cursos WHERE curso_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $curso_id);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener curso: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Insertar un nuevo curso en la base de datos
     
    public function insertar($nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado)
    {
        try {
            $query = "INSERT INTO Cursos (nombre, descripcion, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("ssssi", $nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado);
            $stmt->execute();
            return $this->con->insert_id;
        } catch (Exception $th) {
            throw new Exception("Error al insertar curso: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Actualizar un curso existente en la base de datos
    
    public function actualizar($curso_id, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado)
    {
        try {
            $query = "UPDATE Cursos SET nombre = ?, descripcion = ?, fecha_inicio = ?, fecha_fin = ?, estado = ? WHERE curso_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sssssi", $nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado, $curso_id);
            $stmt->execute();
            return $curso_id;
        } catch (Exception $th) {
            throw new Exception("Error al actualizar curso: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Eliminar un curso de la base de datos
    
    public function eliminar($curso_id)
    {
        try {
            $query = "DELETE FROM Cursos WHERE curso_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $curso_id);
            $stmt->execute();
            return 1;
        } catch (Exception $th) {
            throw new Exception("Error al eliminar curso: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }
}