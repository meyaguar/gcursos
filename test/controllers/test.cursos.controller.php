<?php

/**
 * Archivo: test.cursos.controller.php
 * Descripción: Script para probar las operaciones del controlador Cursos
 * Autor: YAGUAR, Eduardo
 * Fecha: 15/08/2024
 */

// Testear la operación 'todos'
echo "Testeando la operación 'todos':\n";
$url = 'http://localhost/gcursos/app/controllers/cursos.controller.php?op=todos';
$response = file_get_contents($url);
echo $response . "\n";

// Testear la operación 'uno'
echo "Testeando la operación 'uno':\n";
$url = 'http://localhost/gcursos/app/controllers/cursos.controller.php?op=uno';
$post_data = ['curso_id' => 1];
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
$url = 'http://localhost/gcursos/app/controllers/cursos.controller.php?op=insertar';
$post_data = [
    'nombre' => 'Curso de Prueba2',
    'descripcion' => 'Descripción del curso2',
    'fecha_inicio' => '2022-01-01',
    'fecha_fin' => '2022-01-31',
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
$url = 'http://localhost/gcursos/app/controllers/cursos.controller.php?op=actualizar';
$post_data = [
    'curso_id' => 1,
    'nombre' => 'Curso Actualizado3',
    'descripcion' => 'Descripción actualizada3',
    'fecha_inicio' => '2022-02-02',
    'fecha_fin' => '2022-02-28',
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
$url = 'http://localhost/gcursos/app/controllers/cursos.controller.php?op=eliminar';
$post_data = ['curso_id' => 1];
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