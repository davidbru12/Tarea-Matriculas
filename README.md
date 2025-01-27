# Tarea-Matriculas

Tarea-Matriculas es una aplicación web en PHP para gestionar matrículas de estudiantes, permitiendo registrar, editar y consultar información de manera sencilla.

## Características
- Registro de estudiantes y matrículas.
- Validación de datos.
- Interfaz web simple con HTML, CSS y Bootstrap.
- Conexión a MySQL.

## Tecnologías
- PHP 7.4+, MySQL, HTML, CSS, Bootstrap.

## Requisitos
- Servidor web (Apache/Nginx), PHP 7.4+, MySQL.

## Configuración
1. Clona el repositorio:
   ```bash
   git clone https://github.com/davidbru12/Tarea-Matriculas.git
   ```
2. Configura la base de datos:
   - Crea una base en MySQL.
   - Ejecuta `database.sql`.
3. Actualiza `config/db.php` con tus credenciales:
   ```php
   $host = 'localhost';
   $db = 'nombre_base_datos';
   $user = 'usuario';
   $pass = 'contrasena';
   ```
4. Sube los archivos al servidor y accede desde el navegador.

## Estructura
```
Tarea-Matriculas/
|-- index.php
|-- config/
|-- views/
|-- controllers/
|-- models/
|-- resources/
|-- README.md
```

## Contribuciones
1. Haz un fork.
2. Crea una rama:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3. Realiza cambios y abre un Pull Request.

## Licencia
Proyecto bajo la Licencia MIT.

## Autor
Desarrollado por davidbru12(https://github.com/davidbru12).

