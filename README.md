[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/zqMLWLIf)
# 📘 DWES03 - Tarea de Evaluación [2/2]

## 📝 Descripción general

En esta segunda parte del proyecto, **desarrollarás el diseño que planificaste en la
primera tarea.**

Para ello, utilizarás una estructura MVC y un controlador frontal para gestionar las solicitudes. **Toda la comunicación se realizará mediante JSON y HTTP, la persistencia de datos la programarás mediante ficheros CSV.**

**El servicio debe correr completamente en el lado del servidor (CSR)** (sin interfaces gráficas).

## 🎯 Objetivos de aprendizaje

- Desarrollar un servicio web
- Entender el funcionamiento de una API
- Diseñar una estructura MVC robusta
- Comprender el uso del front controller
- Incorporar el uso de ficheros CSV
- Implementar respuestas en formato JSON
- Desarrollar un servicio CSR

## 🛠️ Ejercicios

*⚠️ **Importante**: por favor, nombra el directorio raíz de tu proyecto como: ‘apellido1_apellido2_nombre_DWES03_TE2’*

#### Ejercicio 1: Estructura de Directorios y Front Controller

- Crea una estructura de directorios basada en MVC que respete el diseño de la primera tarea

- Configura el archivo `index.php` como controlador frontal, de modo que todas las solicitudes HTTP pasen primero por este archivo para el enrutamiento y procesado.

- Crea un enrutador con enrutado dinámico.

#### Ejercicio 2: Persistencia de Datos

- Añade ficheros con extensión `csv` que sirvan como *soporte de datos* para almacenar los elementos de tu servicio, por ejemplo: `Productos`, `Usuarios` etc. 

- Incluir al menos 5 entradas iniciales en cada fichero, estructuradas de forma consistente y legible

*⚠️ **Importante**: al no haber estudiado aún la parte asociada al modelo de datos, si no quieres no crees entidades específicas para cada elemento, puedes trabajar con ellos como arrays asociativos directamente*

#### Ejercicio 3: Controladores y Rutas CRUD

- Implementa los controladores necesarios para cada entidad definida en la planificación 

- Configura las rutas en el controlador frontal para redirigir cada tipo de solicitud HTTP a su método correspondiente en los controladores.

- Debes implementar como mínimo 5 endpoints
  
  - GET (‘All’ y ‘ByID’)
  
  - POST
  
  - PUT
  
  - DELETE

- El controlador frontal se comunicará con el cliente rest mediante consultas/respuestas en formato JSON, bien para recibir o enviar datos. 

#### Ejercicio 4: Respuestas JSON y Códigos HTTP

- Asegúrate de que todas las respuestas de la aplicación sean en formato JSON, y que incluya los campos:
  
  - `status`
  
  - `code`
  
  - `message`
  
  - `data` (si procede)

#### Ejercicio 5: Gestión de Errores

- Implementa un sistema de gestión de errores que maneje las siguientes excepciones:
  
  - **Elemento no encontrado:** si se intenta actualizar un ID que no existe, la respuesta JSON debe incluir un mensaje de error y código
  
  - **Error de URL no válida:** si se intenta acceder a una ruta no definida, la aplicación debe devolver un error 404 Not Found.

- 
