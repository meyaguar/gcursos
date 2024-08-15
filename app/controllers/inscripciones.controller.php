<?php

/**
 * Archivo: inscripciones.controller.php
 * Descripción: Controlador para manejar las operaciones CRUD de la tabla Inscripciones
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

// TODO: Inclusión del modelo de Inscripciones
require_once('../models/inscripciones.model.php');

// TODO: Creación de instancia de Inscripciones
$inscripciones = new Inscripciones();

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
            // TODO: Obtener todas las inscripciones
            $datos = $inscripciones->todos();
            echo json_encode($datos->fetch_all(MYSQLI_ASSOC));
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'uno':
        try {
            // TODO: Obtener una inscripción por ID
            validate_data($_POST, ['inscripcion_id']);
            $inscripcion_id = $_POST["inscripcion_id"];
            $datos = $inscripciones->uno($inscripcion_id);
            echo json_encode($datos->fetch_assoc());
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'insertar':
        try {
            // TODO: Insertar una nueva inscripción
            validate_data($_POST, ['estudiante_id', 'curso_id', 'fecha_inscripcion', 'estado']);
            $datos = $inscripciones->insertar(
                $_POST["estudiante_id"],
                $_POST["curso_id"],
                $_POST["fecha_inscripcion"],
                $_POST["estado"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'actualizar':
        try {
            // TODO: Actualizar una inscripción existente
            validate_data($_POST, ['inscripcion_id', 'estudiante_id', 'curso_id', 'fecha_inscripcion', 'estado']);
            $datos = $inscripciones->actualizar(
                $_POST["inscripcion_id"],
                $_POST["estudiante_id"],
                $_POST["curso_id"],
                $_POST["fecha_inscripcion"],
                $_POST["estado"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'eliminar':
        try {
            // TODO: Eliminar una inscripción
            validate_data($_POST, ['inscripcion_id']);
            $datos = $inscripciones->eliminar($_POST["inscripcion_id"]);
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    default:
        handle_error("Operación no válida");
        break;
}