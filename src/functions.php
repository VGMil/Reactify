<?php
/**
 * Renderiza un componente, pasándole variables de forma segura.
 *
 * @param string $component_path La ruta al archivo del componente desde la carpeta 'components'.
 * @param array $variables Un array asociativo de variables para pasar al componente.
 */
function render_component(string $component_path, array $variables = []): void
{
    // Extrae las variables del array, por ejemplo, ['title' => 'Hola'] crea una variable $title.
    extract($variables);

    // Construye la ruta completa al archivo del componente.
    $full_path = __DIR__ . '/components/' . $component_path . '.php';

    // Incluye el archivo si existe.
    if (file_exists($full_path)) {
        include $full_path;
    } else {
        echo "<!-- Error: Componente no encontrado en {$full_path} -->";
    }
}