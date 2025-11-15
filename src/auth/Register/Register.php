<?php
require_once __DIR__ . '../../../functions.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Register - Reactify</title>

    <!-- Cargar estilos globales y de componentes -->
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="./Register.css">
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
                'children' => 'Registrate'
            ]); ?>

            <?php render_component('ui/Text', [
                'tag' => 'h2',
                'children' => 'Crea una cuenta para comenzar',
                'size' => 'small',
                'variant' => 'muted'
            ]); ?>
            <!-- nombre -->
            <div class="form-field">
                <?php render_component('ui/Text', [
                    'tag' => 'h3',
                    'children' => 'Nombre'
                ]); ?>

                <?php render_component('ui/InputText', [
                    'name' => 'nombre',
                    'type' => 'text',
                    'placeholder' => 'Nombre Apellido',
                    'required' => true
                ]); ?>
            </div>
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
                'name' => 'registrar',
                'children' => 'Entrar',
                'variant' => 'submit'
            ]); ?>

            <?php render_component('ui/Text', [
                'tag' => 'h3',
                'children' => '¿Ya tienes una cuenta?',
                'size' => 'small',
                'variant' => 'muted'
            ]); ?>

            <?php render_component('ui/Button', [
                'children' => 'Inicia Sesion',
                'name' => 'iniciarSesion',
                'variant' => 'submit',
                'onclick' => "window.location.href = '../Login/Login.php';" // <-- Corrección aquí
            ]); ?>

        </form>
    <?php
        }
    ]);
    ?>

</body>

</html>