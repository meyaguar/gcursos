<?php

/**
 * Archivo: cursos.controller.php
 * Descripción: Controlador para manejar las operaciones CRUD de la tabla Cursos
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

// TODO: Inclusión del modelo de Cursos
require_once('../models/cursos.model.php');

// TODO: Creación de instancia de Cursos
$cursos = new Cursos();

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
            // TODO: Obtener todos los cursos
            $datos = $cursos->todos();
            echo json_encode($datos->fetch_all(MYSQLI_ASSOC));
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'uno':
        try {
            // TODO: Obtener un curso por ID
            validate_data($_POST, ['curso_id']);
            $curso_id = $_POST["curso_id"];
            $datos = $cursos->uno($curso_id);
            echo json_encode($datos->fetch_assoc());
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'insertar':
        try {
            // TODO: Insertar un nuevo curso
            validate_data($_POST, ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado']);
            $datos = $cursos->insertar(
                $_POST["nombre"],
                $_POST["descripcion"],
                $_POST["fecha_inicio"],
                $_POST["fecha_fin"],
                $_POST["estado"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'actualizar':
        try {
            // TODO: Actualizar un curso existente
            validate_data($_POST, ['curso_id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado']);
            $datos = $cursos->actualizar(
                $_POST["curso_id"],
                $_POST["nombre"],
                $_POST["descripcion"],
                $_POST["fecha_inicio"],
                $_POST["fecha_fin"],
                $_POST["estado"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'eliminar':
        try {
            // TODO: Eliminar un curso
            validate_data($_POST, ['curso_id']);
            $datos = $cursos->eliminar($_POST["curso_id"]);
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    default:
        handle_error("Operación no válida");
        break;
}