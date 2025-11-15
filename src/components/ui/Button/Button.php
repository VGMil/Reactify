<?php
$type = $variables['type'] ?? 'button';
$children = $variables['children'] ?? 'Button';
$variant = !empty($variables['variant']) ? ' '.$variables['variant'] : '';
$class = 'btn' . $variant;
$name = $variables['name'] ?? '';
$id = $variables['id'] ?? 'btn-'.$name;

// Manejamos los atributos booleanos (que no tienen valor)
$required = !empty($variables['required']) ? 'required' : '';
$disabled = !empty($variables['disabled']) ? 'disabled' : '';
$onclick = !empty($variables['onclick']) ? 'onclick="' . htmlspecialchars($variables['onclick']) . '"' : '';
?>
<button
    type="<?= htmlspecialchars($type) ?>"
    class="<?= htmlspecialchars($class) ?>"
    name="<?= htmlspecialchars($name) ?>"
    id="<?= htmlspecialchars($id) ?>"
    <?= $required ?>
    <?= $disabled ?>
    <?= $onclick ?>
>
    <?= $children ?>
</button>