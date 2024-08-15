<?php

/**
 * Archivo: test.cursos.model.php
 * Descripción: Script de prueba para el modelo Cursos
 * Autor: YAGUAR,Eduardo
 * Fecha: 15/08/2024
 */

// TODO: Reemplazar con la ruta correcta al modelo Cursos
require_once('../../app/models/cursos.model.php');

/**
 * Testear el modelo Cursos
 */
$cursos = new Cursos();

// TODO: Testear el método todos()
echo "Testeando el método todos():\n";
try {
    // TODO: Verificar que se obtengan todos los cursos
    $datos = $cursos->todos();
    while ($fila = $datos->fetch_assoc()) {
        print_r($fila);
    }
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$cursos = new Cursos();
// TODO: Testear el método uno()
echo "\nTesteando el método uno():\n";
try {
    // TODO: Verificar que se obtenga un curso por ID
    $datos = $cursos->uno(1);
    print_r($datos->fetch_assoc());
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$cursos = new Cursos();
// TODO: Testear el método insertar()
echo "\nTesteando el método insertar():\n";
try {
    // TODO: Verificar que se inserte un nuevo curso
    $id = $cursos->insertar('Curso de Prueba', 'Descripción del curso', '2022-01-01', '2022-01-31', 1);
    echo "Curso insertado con ID: $id\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$cursos = new Cursos();
// TODO: Testear el método actualizar()
echo "\nTesteando el método actualizar():\n";
try {
    // TODO: Verificar que se actualice un curso existente
    $id = $cursos->actualizar(1, 'Curso Actualizado', 'Descripción actualizada', '2022-02-01', '2022-02-28', 1);
    echo "Curso actualizado con ID: $id\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$cursos = new Cursos();
// TODO: Testear el método eliminar()
echo "\nTesteando el método eliminar():\n";
try {
    // TODO: Verificar que se elimine un curso
    $cursos->eliminar(1);
    echo "Curso eliminado\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}