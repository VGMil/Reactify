<?php
// Asignamos las variables con valores por defecto.
 $type = $variables['type'] ?? 'text';
 $class = $variables['class'] ?? 'input';
 $name = $variables['name'] ?? '';
 $id = $variables['id'] ?? $name; // Patrón común: si no hay id, usamos el name.
 $placeholder = $variables['placeholder'] ?? '';
 $value = $variables['value'] ?? '';

// Manejamos los atributos booleanos (que no tienen valor)
 $required = !empty($variables['required']) ? 'required' : '';
 $disabled = !empty($variables['disabled']) ? 'disabled' : '';
?>
<!-- Ahora, el HTML se ve casi como estático, solo con variables de PHP -->
<input 
    type="<?= htmlspecialchars($type) ?>"
    class="<?= htmlspecialchars($class) ?>"
    name="<?= htmlspecialchars($name) ?>"
    id="<?= htmlspecialchars($id) ?>"
    placeholder="<?= htmlspecialchars($placeholder) ?>"
    value="<?= htmlspecialchars($value) ?>"
    <?= $required ?>
    <?= $disabled ?>
>