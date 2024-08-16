# GCursos - Sistema de Gestión de Cursos

## Descripción
GCursos es un sistema de gestión de cursos, estudiantes e inscripciones que permite realizar operaciones básicas de base de datos (CRUD) utilizando PHP y MySQL.

## Estructura del Proyecto
gcursos/
│
├── app/
│   ├── config/
│   │   ├── config.env
│   │   └── config.php
│   ├── models/
│   │   ├── cursos.model.php
│   │   ├── estudiantes.model.php
│   │   └── inscripciones.model.php
│   └── controllers/
│       ├── cursos.controller.php
│       ├── estudiantes.controller.php
│       └── inscripciones.controller.php
│
├── database/
│   ├── schema.sql
│   └── seeds.sql
│
└── test/
    ├── models/
    │   ├── test.cursos.model.php
    │   ├── test.estudiantes.model.php
    │   └── test.inscripciones.model.php
    └── controllers/
        ├── test.cursos.controller.php
        ├── test.estudiantes.controller.php
        └── test.inscripciones.controller.php

## Configuración
1. Edite `config.env` con sus credenciales de base de datos:
    DB_HOST=localhost
    DB_USER=root
    DB_PASS=root
    DB_NAME=gcursos
## Instalación
1. Clone el repositorio: `git clone https://github.com/meyaguar/gcursos.git`
2. Navegue al directorio del proyecto: `cd gcursos`
3. Importe el esquema de la base de datos: `mysql -u root -p < database/schema.sql`
4. (Opcional) Importe datos de prueba: `mysql -u root -p < database/seeds.sql`

## Uso
El sistema proporciona endpoints para operaciones CRUD en las entidades Cursos, Estudiantes e Inscripciones. 

Ejemplo de uso para Cursos:
- Obtener todos los cursos: GET `/app/controllers/cursos.controller.php?op=todos`
- Obtener un curso: POST `/app/controllers/cursos.controller.php?op=uno` (con `curso_id` en el body)
- Insertar curso: POST `/app/controllers/cursos.controller.php?op=insertar` (con datos del curso en el body)
- Actualizar curso: POST `/app/controllers/cursos.controller.php?op=actualizar` (con datos del curso en el body)
- Eliminar curso: POST `/app/controllers/cursos.controller.php?op=eliminar` (con `curso_id` en el body)

## Pruebas
Los archivos para probar modelos y controladores se encuentran en el directorio `test/`. Se recomienda previamente haber importado los datos de prueba.

## Autor
YAGUAR, Eduardo

