<?php
$type = $variables['type'] ?? 'button';
$children = $variables['children'] ?? 'Button';
$variant = !empty($variables['variant']) ? ' '.$variables['variant'] : '';
$class = 'btn' . $variant;
$name = $variables['name'] ?? '';
$id = $variables['id'] ?? 'btn-'.$name;

// Manejamos los atributos booleanos (que no tienen valor)
$fullWidth = !empty($variables['fullWidth']) ?'style="width:100%;"': 'style="width:120px;"';
$required = !empty($variables['required']) ? 'required' : '';
$disabled = !empty($variables['disabled']) ? 'disabled' : '';
$onclick = !empty($variables['onclick']) ? 'onclick="' . htmlspecialchars($variables['onclick']) . '"' : '';
?>
<button
    type="<?= htmlspecialchars($type) ?>"
    class="<?= htmlspecialchars($class) ?>"
    name="<?= htmlspecialchars($name) ?>"
    id="<?= htmlspecialchars($id) ?>"
    <?= $fullWidth ?>
    <?= $required ?>
    <?= $disabled ?>
    <?= $onclick ?>
>
    <?= $children ?>
</button>