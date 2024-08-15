<?php

/**
 * Archivo: test.estudiantes.controller.php
 * Descripción: Script para probar las operaciones del controlador Estudiantes
 * Autor: YAGUAR, Eduardo
 * Fecha: 15/08/2024
 */

// Testear la operación 'todos'
echo "Testeando la operación 'todos':\n";
$url = 'http://localhost/gcursos/app/controllers/estudiantes.controller.php?op=todos';
$response = file_get_contents($url);
echo $response . "\n";

// Testear la operación 'uno'
echo "Testeando la operación 'uno':\n";
$url = 'http://localhost/gcursos/app/controllers/estudiantes.controller.php?op=uno';
$post_data = ['estudiante_id' => 1];
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
echo "Testeando la operación 'insertar':\n";
$url = 'http://localhost/gcursos/app/controllers/estudiantes.controller.php?op=insertar';
$post_data = [
    'nombre' => 'Estudiante de Prueba2',
    'apellido' => 'Apellido de Prueba2',
    'email' => 'email2@example.com',
    'fecha_nacimiento' => '1990-01-01',
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
$url = 'http://localhost/gcursos/app/controllers/estudiantes.controller.php?op=actualizar';
$post_data = [
    'estudiante_id' => 1,
    'nombre' => 'Estudiante Actualizado3',
    'apellido' => 'Apellido Actualizado3',
    'email' => 'email3@example.com',
    'fecha_nacimiento' => '1990-02-02',
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
// Va arrojar error por integridad referencial
echo "Testeando la operación 'eliminar'. Puede arrojar error por integridad referencial:\n";
$url = 'http://localhost/gcursos/app/controllers/estudiantes.controller.php?op=eliminar';
$post_data = ['estudiante_id' => 1];
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