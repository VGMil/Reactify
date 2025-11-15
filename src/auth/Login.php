<?php
require_once __DIR__ . '/../functions.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Reactify</title>

    <!-- Cargar estilos globales y de componentes -->
    <link rel="stylesheet" href="../global.css">
    <?php render_css('ui/InputText'); ?>
    <?php render_css('ui/Button'); ?>
    <?php render_css('ui/Card'); ?>

</head>

<body>

    <?php
    render_component('ui/Card', [
        'children' => function() {
            ?>
            <form action="auth.php" method="POST">
                <?php render_component('ui/InputText', [
                    'name' => 'correo',
                    'type' => 'email',
                    'placeholder' => 'Correo Electrónico',
                    'required' => true
                ]); ?>

                <?php render_component('ui/InputText', [
                    'name' => 'password',
                    'type' => 'password',
                    'placeholder' => 'Contraseña',
                    'required' => true
                ]); ?>

                <?php render_component('ui/Button', [
                    'type' => 'submit',
                    'children' => 'Entrar',
                    'variant' => 'submit'
                ]); ?>
            </form>
            <?php
        }
    ]);
    ?>

</body>

</html>