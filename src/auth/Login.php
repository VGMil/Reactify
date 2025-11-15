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
    <link rel="stylesheet" href="./Login.css">
    <?php render_css('ui/InputText'); ?>
    <?php render_css('ui/Button'); ?>
    <?php render_css('ui/Card'); ?>
    <?php render_css('ui/Text'); ?>

</head>

<body>

    <?php
    render_component('ui/Card', [
        'children' => function () {
    ?>
        <form action="auth.php" method="POST" class="form">


            <?php render_component('ui/Text', [
                'tag' => 'h1',
                'children' => 'Iniciar Sesión'
            ]); ?>
            
            <?php render_component('ui/Text', [
                'tag' => 'h2',
                'children' => 'Ingresa tus crendeciales para continuar',
                'size' => 'small',
                'variant' => 'muted'
            ]); ?>

            <!-- email -->
            <div class="form-field">
                <?php render_component('ui/Text', [
                    'tag' => 'h3',
                    'children' => 'Email'
                ]); ?>

                <?php render_component('ui/InputText', [
                    'name' => 'correo',
                    'type' => 'email',
                    'placeholder' => 'Correo Electrónico',
                    'required' => true
                ]); ?>
            </div>

            <!-- password -->
            <div class="form-field">
                <?php render_component('ui/Text', [
                    'tag' => 'h3',
                    'children' => 'Password'
                ]); ?>
                <?php render_component('ui/InputText', [
                    'name' => 'password',
                    'type' => 'password',
                    'placeholder' => 'Contraseña',
                    'required' => true
                ]); ?>
            </div>


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