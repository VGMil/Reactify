<?php
 $tag = $variables['tag'] ?? 'p'; // Por defecto, es un párrafo
 $size = !empty($variables['size']) ? 'text-' . $variables['size'] : '';
 $variant = !empty($variables['variant']) ? 'text-' . $variables['variant'] : '';
 $class = 'text ' . $size . ' ' . $variant;
?>
<<?= htmlspecialchars($tag) ?> class="<?= htmlspecialchars(trim($class)) ?>">
    <?= $children ?>
</<?= htmlspecialchars($tag) ?>>