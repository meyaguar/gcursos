<?php

/**
 * Archivo: test.inscripciones.controller.php
 * Descripción: Script para probar las operaciones del controlador Inscripciones
 * Autor: YAGUAR, Eduardo
 * Fecha: 15/08/2024
 */

// Testear la operación 'todos'
echo "Testeando la operación 'todos':\n";
$url = 'http://localhost/gcursos/app/controllers/inscripciones.controller.php?op=todos';
$response = file_get_contents($url);
echo $response . "\n";

// Testear la operación 'uno'
echo "Testeando la operación 'uno':\n";
$url = 'http://localhost/gcursos/app/controllers/inscripciones.controller.php?op=uno';
$post_data = ['inscripcion_id' => 1];
$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($post_data),
    ],
];
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
echo $response . "\n";

// Testear la operación 'insertar'
// Puede arrojar error por integridad referencial
echo "Testeando la operación 'insertar'. Puede arrojar error por integridad referencial:\n";
$url = 'http://localhost/gcursos/app/controllers/inscripciones.controller.php?op=insertar';
$post_data = [
    'estudiante_id' => 1,
    'curso_id' => 1,
    'fecha_inscripcion' => '2022-01-01',
    'estado' => 1,
];
$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($post_data),
    ],
];
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
echo $response . "\n";

// Testear la operación 'actualizar'
echo "Testeando la operación 'actualizar':\n";
$url = 'http://localhost/gcursos/app/controllers/inscripciones.controller.php?op=actualizar';
$post_data = [
    'inscripcion_id' => 1,
    'estudiante_id' => 1,
    'curso_id' => 1,
    'fecha_inscripcion' => '2022-02-02',
    'estado' => 1,
];
$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($post_data),
    ],
];
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
echo $response . "\n";

// Testear la operación 'eliminar'
echo "Testeando la operación 'eliminar':\n";
$url = 'http://localhost/gcursos/app/controllers/inscripciones.controller.php?op=eliminar';
$post_data = ['inscripcion_id' => 1];
$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($post_data),
    ],
];
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
echo $response . "\n";