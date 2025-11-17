<?php
// Toast.php
$variant = $variables['variant'] ?? 'info'; // 'success', 'error', 'warning', 'info'
$children = $variables['children'] ?? '';
$class = 'toast ' . htmlspecialchars($variant);
?>

<div class="toast-container" id="toast-container">
    <div class="<?= $class ?>">
        <span><?= htmlspecialchars($children) ?></span>
    </div>
</div>
<?php

if (!empty($children)) {
?>
    <script src="./components/ui/Toast/Toast.js"></script>
<?php
}
?>