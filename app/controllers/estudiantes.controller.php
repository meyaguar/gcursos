<?php

/**
 * Archivo: estudiantes.controller.php
 * Descripción: Controlador para manejar las operaciones CRUD de la tabla Estudiantes
 * Autor: YAGUAR, Eduardo
 * Fecha: 15/08/2024
 */

// TODO: Configuración de cabeceras CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// TODO: Función para manejar errores
function handle_error($message) {
    http_response_code(500);
    echo json_encode(['error' => $message]);
    exit;
}

// TODO: Función para validar datos
function validate_data($data, $required_fields) {
    foreach ($required_fields as $field) {
        if (!isset($data[$field]) || empty($data[$field])) {
            handle_error("Campo '$field' es requerido");
        }
    }
}

// TODO: Inclusión del modelo de Estudiantes
require_once('../models/estudiantes.model.php');

// TODO: Creación de instancia de Estudiantes
$estudiantes = new Estudiantes();

// TODO: Obtención del método de solicitud
$method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : null;

// TODO: Manejo de la solicitud OPTIONS
if ($method === "OPTIONS") {
    die();
}

// TODO: Obtención de la operación
$op = isset($_GET["op"]) ? $_GET["op"] : null;

// TODO: Manejo de operaciones CRUD
switch ($op) {
    case 'todos':
        try {
            // TODO: Obtener todos los estudiantes
            $datos = $estudiantes->todos();
            echo json_encode($datos->fetch_all(MYSQLI_ASSOC));
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'uno':
        try {
            // TODO: Obtener un estudiante por ID
            validate_data($_POST, ['estudiante_id']);
            $estudiante_id = $_POST["estudiante_id"];
            $datos = $estudiantes->uno($estudiante_id);
            echo json_encode($datos->fetch_assoc());
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'insertar':
        try {
            // TODO: Insertar un nuevo estudiante
            validate_data($_POST, ['nombre', 'apellido', 'email', 'fecha_nacimiento', 'estado']);
            $datos = $estudiantes->insertar(
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["email"],
                $_POST["fecha_nacimiento"],
                $_POST["estado"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'actualizar':
        try {
            // TODO: Actualizar un estudiante existente
            validate_data($_POST, ['estudiante_id', 'nombre', 'apellido', 'email', 'fecha_nacimiento', 'estado']);
            $datos = $estudiantes->actualizar(
                $_POST["estudiante_id"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["email"],
                $_POST["fecha_nacimiento"],
                $_POST["estado"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'eliminar':
        try {
            // TODO: Eliminar un estudiante
            validate_data($_POST, ['estudiante_id']);
            $datos = $estudiantes->eliminar($_POST["estudiante_id"]);
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    default:
        handle_error("Operación no válida");
        break;
}