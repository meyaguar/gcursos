# GCursos - Sistema de Gestión de Cursos

## Descripción
**GCursos** es un sistema de gestión de cursos, estudiantes e inscripciones que facilita las operaciones básicas de base de datos (CRUD) utilizando PHP y MySQL. Esta aplicación está diseñada para gestionar de manera eficiente la información relacionada con cursos, estudiantes y sus inscripciones.

## Estructura del Proyecto

gcursos/
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
├── database/
│   ├── schema.sql
│   └── seeds.sql
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

1. Edite el archivo `config.env` con sus credenciales de base de datos:
   DB_HOST=localhost
   DB_USER=root
   DB_PASS=root
   DB_NAME=gcursos

## Instalación

1. Clone el repositorio:  
   `git clone https://github.com/meyaguar/gcursos.git`
2. Navegue al directorio del proyecto:  
   `cd gcursos`
3. Importe el esquema de la base de datos:  
   `mysql -u root -p < database/schema.sql`
4. (Opcional) Importe datos de prueba:  
   `mysql -u root -p < database/seeds.sql`

## Uso

El sistema ofrece endpoints para realizar operaciones CRUD sobre las entidades **Cursos**, **Estudiantes** e **Inscripciones**. A continuación se muestran algunos ejemplos:

- Obtener todos los cursos:  
  `GET /app/controllers/cursos.controller.php?op=todos`

- Obtener un curso específico:  
  `POST /app/controllers/cursos.controller.php?op=uno`  
  (con `curso_id` en el cuerpo de la solicitud)

- Insertar un nuevo curso:  
  `POST /app/controllers/cursos.controller.php?op=insertar`  
  (con datos del curso en el cuerpo de la solicitud)

- Actualizar un curso existente:  
  `POST /app/controllers/cursos.controller.php?op=actualizar`  
  (con datos del curso en el cuerpo de la solicitud)

- Eliminar un curso:  
  `POST /app/controllers/cursos.controller.php?op=eliminar`  
  (con `curso_id` en el cuerpo de la solicitud)

## Pruebas

Los archivos de prueba para los modelos y controladores se encuentran en el directorio `test/`. Se recomienda importar previamente los datos de prueba para una mejor validación.

## Autor

**Eduardo Yaguar**
