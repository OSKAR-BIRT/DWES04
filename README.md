📘 DWES04 - Tarea de Evaluación
📝 Descripción general
En esta tarea se ampliará la aplicación desarrollada en la unidad anterior incorporando persistencia de datos mediante una base de datos relacional. Para ello, se diseñará e implementará una base de datos en MySQL, así como la capa de acceso a datos, siguiendo una arquitectura en capas.

El alumnado deberá crear el script SQL necesario para definir la estructura de la base de datos, implementar los patrones DAO y DTO, serializar las respuestas a formato JSON y devueltos al cliente a través de la API, respetando el formato estándar application/json.

🎯 Objetivos de aprendizaje
Identificar los conceptos básicos de bases de datos relacionales: tablas, claves primarias y claves foráneas.
Configurar correctamente una conexión a la base de datos mediante un fichero de configuración.
Implementar un DAO que ejecute operaciones CRUD sobre la base de datos.
Utilizar DTOs para mapear los resultados de las consultas SQL.
Serializar los datos obtenidos en formato JSON y devolverlos desde un endpoint de la API.
Diferenciar claramente las responsabilidades de cada capa: controladores, DAO y DTO.
Construir una arquitectura en capas que separe correctamente la lógica de negocio, el acceso a datos y la representación de la información.
🛠️ Ejercicios
Ejercicio 1: Creación de la BD y conexión
Base de datos:

Desarrolla un fichero para la creación de una base de datos con nombre:
apellido1_apellido2_nombre_DWES04.sql

La base de datos debe contener al menos dos tablas y debe implementar:

Claves primarias para definir las entidades
Claves foráneas para establecer relaciones entre las entidades
Los tipos de datos de cada columna deberán adecuarse a los modelos o entidades (por ejemplo: INT, VARCHAR, DATE, etc.).

Define restricciones:NOT NULL, UNIQUE, DEFAULT cuando sea necesario

Implementar restricciones y reglas para garantizar la integridad referencial, por ejemplo:

Restricción ON DELETE CASCADE en claves foráneas, asegurando que al eliminar un usuario se eliminen también sus pedidos asociados.
Conexión y Configuración:

Crear un fichero de configuración con las siguientes credenciales para conectarse:

Usuario: root

Contraseña: (vacía)

Fichero SQL:

Sube el archivo SQL que contiene el script para crear la base de datos a tu repositorio de GitHub.

Este archivo debe poder ejecutarse sin problemas para crear correctamente la base de datos.

Ejercicio 2: Acceso a los datos
DAO:

Crear DAOs para acceder a la base de datos.

Los controladores de la aplicación deberán hacer uso de los objetos DAO para acceder a la capa de datos.

El DAO será el encargado de:

Ejecutar las consultas SQL
Gestionar operaciones CRUD (Create, Read, Update, Delete)
Aislar la lógica de acceso a datos del resto de la aplicación
Comunicación entre Capas:

Los controladores deben interactuar exclusivamente con los objetos DAO para:

Acceder a los datos
Manipular la información almacenada en la base de datos
Ejercicio 3: Encapsulación de Datos
DTO:

Crear objetos DTO para encapsular los datos devueltos por las consultas.

Los DTO deben usarse para:

Organizar los datos de forma clara y consistente
Enviarlos de manera estructurada a través de la API
Serialización a JSON:

Los datos deben ser serializados a formato JSON para ser enviados al cliente cuando el cliente realice una consulta a uno de los endpoints de la API.

La respuesta de la API debe devolverse en un formato application/json