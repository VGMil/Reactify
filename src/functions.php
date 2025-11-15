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
    $full_path = __DIR__ . '/components/' . $component_path . '/' . basename($component_path) . '.php';

    // Incluye el archivo si existe.
    if (file_exists($full_path)) {
        include $full_path;
    } else {
        echo "<!-- Error: Componente no encontrado en {$full_path} -->";
    }
}
/**
 * Renderiza la etiqueta <link> para el CSS de un componente.
 * Ahora construye una URL válida para el navegador.
 *
 * @param string $component_path La ruta al componente desde la carpeta 'components'.
 */
function render_css(string $component_path): void
{
    $url_path = '/components/' . $component_path . '/' . basename($component_path) . '.css';
    
    $safe_path = htmlspecialchars($url_path);
    echo '<link rel="stylesheet" href="' . $safe_path . '">' . "\n";
}
