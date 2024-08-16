<?php

/**
 * Archivo: test.estudiantes.model.php
 * Descripción: Script de prueba para el modelo Estudiantes
 * Autor: YAGUAR, Eduardo
 * Fecha: 15/08/2024
 */

// TODO: Reemplazar con la ruta correcta al modelo Estudiantes
require_once('../../app/models/estudiantes.model.php');

/**
 * Testear el modelo Estudiantes
 */
$estudiantes = new Estudiantes();

// TODO: Testear el método todos()
echo "Testeando el método todos():\n";
try {
    // TODO: Verificar que se obtengan todos los estudiantes
    $datos = $estudiantes->todos();
    while ($fila = $datos->fetch_assoc()) {
        print_r($fila);
    }
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$estudiantes = new Estudiantes();
// TODO: Testear el método uno()
echo "\nTesteando el método uno():\n";
try {
    // TODO: Verificar que se obtenga un estudiante por ID
    $datos = $estudiantes->uno(1);
    print_r($datos->fetch_assoc());
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$estudiantes = new Estudiantes();
// TODO: Testear el método insertar()
echo "\nTesteando el método insertar():\n";
try {
    // TODO: Verificar que se inserte un nuevo estudiante
    $id = $estudiantes->insertar('Juan', 'Pérez', 'juan1@example.com', '1990-01-01', 1);
    echo "Estudiante insertado con ID: $id\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$estudiantes = new Estudiantes();
// TODO: Testear el método actualizar()
echo "\nTesteando el método actualizar():\n";
try {
    // TODO: Verificar que se actualice un estudiante existente
    $id = $estudiantes->actualizar(1, 'Juan', 'Pérez', 'jun2@example.com', '1990-01-01', 1);
    echo "Estudiante actualizado con ID: $id\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$estudiantes = new Estudiantes();
// TODO: Testear el método eliminar()
echo "\nTesteando el método eliminar():\n";
try {
    // TODO: Verificar que se elimine un estudiante
    $estudiantes->eliminar(7);
    echo "Estudiante eliminado\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}
