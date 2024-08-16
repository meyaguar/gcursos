<?php
/**
 * Archivo: Estudiantes.php
 * Descripción: Clase para manejar estudiantes en la base de datos
 * Autor: YAGUAR, Eduardo
 * Fecha: 15/08/2024
 */

// TODO: Incluir archivo de configuración
//require_once('../config/config.php');
require_once(__DIR__ . '/../config/config.php');

// TODO: Definir clase Estudiantes
class Estudiantes
{
    private $con;

    // TODO: Establecer conexión a la base de datos en el constructor
    public function __construct()
    {
        $this->con = (new ClaseConectar())->conectar();
    }

    // TODO: Obtener todos los estudiantes de la base de datos
    public function todos()
    {
        try {
            $query = "SELECT * FROM Estudiantes";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener estudiantes: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Obtener un estudiante por ID de la base de datos
    public function uno($estudiante_id)
    {
        try {
            $query = "SELECT * FROM Estudiantes WHERE estudiante_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $estudiante_id);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener estudiante: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Insertar un nuevo estudiante en la base de datos
    public function insertar($nombre, $apellido, $email, $fecha_nacimiento, $estado)
    {
        try {
            $query = "INSERT INTO Estudiantes (nombre, apellido, email, fecha_nacimiento, estado) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("ssssd", $nombre, $apellido, $email, $fecha_nacimiento, $estado);
            $stmt->execute();
            return $this->con->insert_id;
        } catch (Exception $th) {
            throw new Exception("Error al insertar estudiante: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Actualizar un estudiante existente en la base de datos
    public function actualizar($estudiante_id, $nombre, $apellido, $email, $fecha_nacimiento, $estado)
    {
        try {
            $query = "UPDATE Estudiantes SET nombre = ?, apellido = ?, email = ?, fecha_nacimiento = ?, estado = ? WHERE estudiante_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("ssssdi", $nombre, $apellido, $email, $fecha_nacimiento, $estado, $estudiante_id);
            $stmt->execute();
            return $estudiante_id;
        } catch (Exception $th) {
            throw new Exception("Error al actualizar estudiante: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Eliminar un estudiante de la base de datos
    public function eliminar($estudiante_id)
    {
        try {
            $query = "DELETE FROM Estudiantes WHERE estudiante_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $estudiante_id);
            $stmt->execute();
            return 1;
        } catch (Exception $th) {
            throw new Exception("Error al eliminar estudiante: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }
}
