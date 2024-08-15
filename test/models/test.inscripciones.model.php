<?php

/**
 * Archivo: test.inscripciones.model.php
 * Descripción: Script de prueba para el modelo Inscripciones
 * Autor: YAGUAR, Eduardo
 * Fecha: 15/08/2024
 */

// TODO: Reemplazar con la ruta correcta al modelo Inscripciones
require_once('../../app/models/inscripciones.model.php');

/**
 * Testear el modelo Inscripciones
 */
$inscripciones = new Inscripciones();

// TODO: Testear el método todos()
echo "Testeando el método todos():\n";
try {
    // TODO: Verificar que se obtengan todas las inscripciones
    $datos = $inscripciones->todos();
    while ($fila = $datos->fetch_assoc()) {
        print_r($fila);
    }
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$inscripciones = new Inscripciones();
// TODO: Testear el método uno()
echo "\nTesteando el método uno():\n";
try {
    // TODO: Verificar que se obtenga una inscripción por ID
    $datos = $inscripciones->uno(1);
    print_r($datos->fetch_assoc());
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$inscripciones = new Inscripciones();
// TODO: Testear el método insertar()
echo "\nTesteando el método insertar():\n";
try {
    // TODO: Verificar que se inserte una nueva inscripción
    $id = $inscripciones->insertar(1, 1, '2022-01-01', 1);
    echo "Inscripción insertada con ID: $id\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$inscripciones = new Inscripciones();
// TODO: Testear el método actualizar()
echo "\nTesteando el método actualizar():\n";
try {
    // TODO: Verificar que se actualice una inscripción existente
    $id = $inscripciones->actualizar(1, 1, 1, '2022-02-02', 1);
    echo "Inscripción actualizada con ID: $id\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

$inscripciones = new Inscripciones();
// TODO: Testear el método eliminar()
echo "\nTesteando el método eliminar():\n";
try {
    // TODO: Verificar que se elimine una inscripción
    $inscripciones->eliminar(1);
    echo "Inscripción eliminada\n";
} catch (Exception $e) {
    // TODO: Manejar excepciones
    echo "Error: " . $e->getMessage() . "\n";
}