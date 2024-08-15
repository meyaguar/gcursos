<?php
/**
 * Archivo: Inscripciones.php
 * Descripción: Clase para manejar inscripciones en la base de datos
 * Autor: [Tu nombre]
 * Fecha: [Fecha actual]
 */

// TODO: Incluir archivo de configuración
require_once('../config/config.php');

// TODO: Definir clase Inscripciones
class Inscripciones
{
    private $con;

    // TODO: Establecer conexión a la base de datos en el constructor
    public function __construct()
    {
        $this->con = (new ClaseConectar())->conectar();
    }

    // TODO: Obtener todas las inscripciones de la base de datos
    public function todos()
    {
        try {
            $query = "SELECT * FROM Inscripciones";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener inscripciones: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Obtener una inscripción por ID de la base de datos
    public function uno($inscripcion_id)
    {
        try {
            $query = "SELECT * FROM Inscripciones WHERE inscripcion_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $inscripcion_id);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener inscripción: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Insertar una nueva inscripción en la base de datos
    public function insertar($estudiante_id, $curso_id, $fecha_inscripcion, $estado)
    {
        try {
            $query = "INSERT INTO Inscripciones (estudiante_id, curso_id, fecha_inscripcion, estado) VALUES (?, ?, ?, ?)";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("iisi", $estudiante_id, $curso_id, $fecha_inscripcion, $estado);
            $stmt->execute();
            return $this->con->insert_id;
        } catch (Exception $th) {
            throw new Exception("Error al insertar inscripción: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Actualizar una inscripción existente en la base de datos
    public function actualizar($inscripcion_id, $estudiante_id, $curso_id, $fecha_inscripcion, $estado)
    {
        try {
            $query = "UPDATE Inscripciones SET estudiante_id = ?, curso_id = ?, fecha_inscripcion = ?, estado = ? WHERE inscripcion_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("iiisi", $estudiante_id, $curso_id, $fecha_inscripcion, $estado, $inscripcion_id);
            $stmt->execute();
            return $inscripcion_id;
        } catch (Exception $th) {
            throw new Exception("Error al actualizar inscripción: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Eliminar una inscripción de la base de datos
    public function eliminar($inscripcion_id)
    {
        try {
            $query = "DELETE FROM Inscripciones WHERE inscripcion_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $inscripcion_id);
            $stmt->execute();
            return 1;
        } catch (Exception $th) {
            throw new Exception("Error al eliminar inscripción: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }
}