# Reactify

Entorno de desarrollo web, construido con Docker, que incluye un stack LEMP (Linux, Nginx, MySQL, PHP) optimizado para el desarrollo de aplicaciones PHP.

## 🚀 Características

-   **Dockerizado**: Todo el entorno está contenido en contenedores Docker, garantizando consistencia entre diferentes máquinas.
-   **Stack LEMP**: Utiliza Nginx como servidor web, PHP 8.2 con Apache para la lógica de backend y MySQL 8.0 para la base de datos.
-   **Base de Datos Pre-configurada**: La base de datos se inicializa automáticamente con una tabla de `usuarios` y un dataset de ejemplo para facilitar las pruebas.
-   **phpMyAdmin**: Incluye phpMyAdmin para una gestión gráfica y sencilla de la base de datos.
-   **Componentes de UI Reutilizables**: Un sistema simple para crear y renderizar componentes de interfaz de usuario como Card y Button.
-   **Sistema de Enrutamiento**: Un enrutador propio que soporta métodos GET y POST, con capacidad para proteger rutas específicas.
-   **Configuración Centralizada**: Uso de variables de entorno (.env) para gestionar credenciales y configuración sensible.
-   **Gestión de Sesiones Segura**: Un sistema centralizado para manejar el estado del usuario, login, logout.

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
Reactify/
├── src/
│   ├── auth/             # Controladores de autenticación
│   │   ├── Login/        # Formulario de Login
│   │   ├── Register/     # Formulario de Register
│   │   └── auth.php      # AuthController
│   ├── domain/           # Modelos de datos (lógica de negocio)
│   │   └── User.php      # Modelo User
│   ├── home/             # Vistas de la aplicación principal
│   │   └── dashboard/    # Vista de Dashboard
│   ├── lib/              # Librerías y clases centrales
│   │   ├── Route.php     # Sistema de enrutamiento
│   │   └── Session.php    # Gestor de sesiones
│   ├── ui/               # Componentes de UI reutilizables
│   │   ├── Button.php
│   │   ├── Card.php
│   │   └── Text.php
│   ├── database.php      # Conexión a la base de datos
│   ├── index.php         # Punto de entrada de la aplicación
│   ├── load_env.php      # Cargador de variables de entorno
│   └── .env              # Archivo de configuración (no versionado)
├── sql/                  # Scripts de base de datos
│   ├── 01-create-table.sql
│   └── 02-insert-users.sql
├── docker-compose.yml    # Configuración de Docker
├── Dockerfile            # Configuración del contenedor PHP
└── README.md             # Este archivo
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
