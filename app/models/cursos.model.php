<?php
/**
 * Archivo: Cursos.php
 * Descripción: Clase para manejar cursos en la base de datos
 * Autor: YAGUAR, Eduardo
 * Fecha: 14/08/2024
 */

require_once('../config/config.php');

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
            $query = "SELECT * FROM cursos";
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
    
    public function uno($idCurso)
    {
        try {
            $query = "SELECT * FROM cursos WHERE idCurso = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $idCurso);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener curso: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Insertar un nuevo curso en la base de datos
     
    public function insertar($nombre, $descripcion, $duracion, $precio)
    {
        try {
            $query = "INSERT INTO cursos (nombre, descripcion, duracion, precio) VALUES (?, ?, ?, ?)";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sssi", $nombre, $descripcion, $duracion, $precio);
            $stmt->execute();
            return $this->con->insert_id;
        } catch (Exception $th) {
            throw new Exception("Error al insertar curso: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Actualizar un curso existente en la base de datos
    
    public function actualizar($idCurso, $nombre, $descripcion, $duracion, $precio)
    {
        try {
            $query = "UPDATE cursos SET nombre = ?, descripcion = ?, duracion = ?, precio = ? WHERE idCurso = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("ssssi", $nombre, $descripcion, $duracion, $precio, $idCurso);
            $stmt->execute();
            return $idCurso;
        } catch (Exception $th) {
            throw new Exception("Error al actualizar curso: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Eliminar un curso de la base de datos
    
    public function eliminar($idCurso)
    {
        try {
            $query = "DELETE FROM cursos WHERE idCurso = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $idCurso);
            $stmt->execute();
            return 1;
        } catch (Exception $th) {
            throw new Exception("Error al eliminar curso: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }
}