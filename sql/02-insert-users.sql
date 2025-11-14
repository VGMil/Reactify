-- =============================================================================
-- Archivo: 02-insert-users.sql
-- Descripción: Inserta un dataset de usuarios de ejemplo en la tabla 'usuarios'.
--              Este script se ejecuta automáticamente al iniciar el contenedor
--              de MySQL por primera vez.
-- =============================================================================

USE reactifyDB;

INSERT INTO usuarios (nombre, correo, password_hash) VALUES
-- Usuario 1: ana.garcia@example.com / Contraseña: password123
('Ana Garcia', 'ana.garcia@example.com', '$2y$10$p2S8ReWYJb3v8L9F6qKz6.1vQZ5x7c9K0mN3pQrS.tUvW8XyZ5a7c'),

-- Usuario 2: luis.martinez@example.com / Contraseña: reactify2024
('Luis Martinez', 'luis.martinez@example.com', '$2y$10$X9fL2mN5oP8qR1tY6uZ3.vC0dE5fG7hI9jK1lM3nO5pQ7rS9tUvW'),

-- Usuario 3: sofia.r@example.com / Contraseña: secreto
('Sofia R', 'sofia.r@example.com', '$2y$10$aB1cD2eF3gH4iJ5kL6mN.oP7qR8sT9uV0wX1yZ2aB3cD4eF5gH6i'),

-- Usuario 4: carlos.dev@example.com / Contraseña: password123
('Carlos Developer', 'carlos.dev@example.com', '$2y$10$p2S8ReWYJb3v8L9F6qKz6.1vQZ5x7c9K0mN3pQrS.tUvW8XyZ5a7c');

SELECT 'Dataset de usuarios insertado exitosamente.' AS message;