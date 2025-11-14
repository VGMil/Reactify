-- =============================================================================
-- Archivo: 01-create-users-table.sql
-- Descripción: Crea la tabla 'usuarios' en la base de datos.
--              Este script se ejecuta automáticamente al iniciar el contenedor
--              de MySQL por primera vez.
-- =============================================================================

-- Selecciona la base de datos a utilizar, definida en el archivo .env
USE reactifyDB;

-- Creación de la tabla 'usuarios' si no existe
CREATE TABLE IF NOT EXISTS `usuarios` (
  -- Columna de ID autoincremental, clave primaria de la tabla
  `id` INT AUTO_INCREMENT PRIMARY KEY,

  -- Nombre completo del usuario, con un máximo de 100 caracteres
  `nombre` VARCHAR(100) NOT NULL,

  -- Correo electrónico del usuario, debe ser único para evitar duplicados
  `correo` VARCHAR(255) NOT NULL UNIQUE,

  -- Contraseña hasheada del usuario.
  -- Se usa VARCHAR(255) para asegurar espacio para hashes largos y seguros.
  `password_hash` VARCHAR(255) NOT NULL,

  -- Marca de tiempo que se registra automáticamente al crear el usuario
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  -- Marca de tiempo que se actualiza automáticamente al modificar cualquier campo del registro
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Explicación de las opciones de la tabla:
-- ENGINE=InnoDB: Motor de almacenamiento estándar que soporta transacciones y claves foráneas.
-- CHARSET=utf8mb4: Asegura el soporte completo para caracteres Unicode (incluyendo emojis y símbolos especiales).

-- =============================================================================
-- Confirmación de finalización
-- =============================================================================
SELECT 'Tabla `usuarios` creada exitosamente.' AS message;