# Reactify

Entorno de desarrollo web, construido con Docker, que incluye un stack LEMP (Linux, Nginx, MySQL, PHP) optimizado para el desarrollo de aplicaciones PHP.

## 🚀 Características

-   **Dockerizado**: Todo el entorno está contenido en contenedores Docker, garantizando consistencia entre diferentes máquinas.
-   **Stack LEMP**: Utiliza Nginx como servidor web, PHP 8.2 con Apache para la lógica de backend y MySQL 8.0 para la base de datos.
-   **Base de Datos Pre-configurada**: La base de datos se inicializa automáticamente con una tabla de `usuarios` y un dataset de ejemplo para facilitar las pruebas.
-   **phpMyAdmin**: Incluye phpMyAdmin para una gestión gráfica y sencilla de la base de datos.

## 🛠️ Stack Tecnológico

-   **Backend**: PHP 8.2, Apache
-   **Servidor Web**: Nginx
-   **Base de Datos**: MySQL 8.0
-   **Herramienta de Gestión**: phpMyAdmin
-   **Orquestación**: Docker & Docker Compose

## 📋 Prerrequisitos

Asegúrate de tener instalados los siguientes programas en tu sistema:

-   [Docker](https://docs.docker.com/get-docker/)
-   [Docker Compose](https://docs.docker.com/compose/install/)

## ⚙️ Configuración e Inicio

Sigue estos pasos para poner en marcha el entorno de desarrollo:

1.  **Clona el repositorio:**
    ```bash
    git clone https://github.com/VGMil/Reactify
    cd reactify
    ```

2.  **Configura las variables de entorno:**
    Abre el archivo `.env` en la raíz del proyecto y ajusta las credenciales de la base de datos si es necesario.

3.  **Levanta los contenedores:**
    Desde la raíz del proyecto, ejecuta el siguiente comando para construir e iniciar todos los servicios:
    ```bash
    docker-compose up -d --build
    ```

4.  **Accede a la aplicación:**
    -   **Aplicación Web**: Abre tu navegador en [http://localhost:8080](http://localhost:8080)
    -   **phpMyAdmin**: Accede al gestor de BD en [http://localhost:8081](http://localhost:8081)
        -   **Servidor**: `db`
        -   **Usuario**: `reactify`
        -   **Contraseña**: `reactify`

## 👤 Usuarios de Ejemplo

Para probar el sistema de autenticación, puedes usar las siguientes credenciales:

| Correo Electrónico            | Contraseña     |
| ------------------------------ | -------------- |
| `ana.garcia@example.com`       | `password123`  |
| `luis.martinez@example.com`    | `reactify2024` |
| `sofia.r@example.com`          | `secreto`      |
| `carlos.dev@example.com`       | `password123`  |

## 📁 Estructura del Proyecto Actualmente
```
reactify/
├── docker-compose.yml # Archivo de orquestación de Docker
├── .env # Variables de entorno (credenciales, etc.)
├── nginx/
│ └── default.conf # Configuración del servidor Nginx
├── sql/
│ ├── 01-create-users-table.sql # Script para crear la tabla de usuarios
│ └── 02-insert-users.sql # Script para insertar datos de ejemplo
└── src/
└── index.php # Punto de entrada
```

## 🛠️ Comandos Útiles

-   **Ver logs de los contenedores:**
    ```bash
    docker-compose logs -f
    ```
-   **Detener los contenedores:**
    ```bash
    docker-compose stop
    ```
-   **Detener y eliminar contenedores y volúmenes (¡borra la BD!):**
    ```bash
    docker-compose down -v
    ```
