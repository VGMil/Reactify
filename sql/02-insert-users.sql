-- =============================================================================
-- Archivo: 02-insert-users.sql
-- Descripción: Inserta un dataset de usuarios de ejemplo en la tabla 'usuarios'.
--              Este script se ejecuta automáticamente al iniciar el contenedor
--              de MySQL por primera vez.
-- =============================================================================

USE reactifyDB;

INSERT INTO usuarios (nombre, correo, password_hash) VALUES
-- Usuario 1: ana.garcia@example.com / Contraseña: password123
('Ana Garcia', 'ana.garcia@example.com', '$2y$10$ik6A29YYaul3DnA5LqTbxuHIaVC38hOY3rhtc.sCaZvqjzf7ewNzq'),

-- Usuario 2: luis.martinez@example.com / Contraseña: reactify2024
('Luis Martinez', 'luis.martinez@example.com', '$2y$10$oIkRd9ieFFUEPt.IOcxWt.XryFXbu950OS9uv7sXPDwsP3X.LAkIW'),

-- Usuario 3: sofia.r@example.com / Contraseña: secreto
('Sofia R', 'sofia.r@example.com', '$2y$10$cbsZ9GWIomL5d2Yg7cGSQekfa3Dt6Dk4G7KJVWew.T9KkO1eEwF0S'),

-- Usuario 4: carlos.dev@example.com / Contraseña: password123
('Carlos Developer', 'carlos.dev@example.com', '$2y$10$6AbxVe6FulQ.DnVUVHoPzekp4cxfFPGvdoMldh4uUc4oziSFOo3ZS');

SELECT 'Dataset de usuarios insertado exitosamente.' AS message;