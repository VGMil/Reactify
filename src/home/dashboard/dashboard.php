<?php 
    require_once __DIR__ . '../../../functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./global.css">
    <link rel="stylesheet" href="./home/dashboard/dashboard.css">
    <?php render_css('ui/Card'); ?>
    <?php render_css('ui/Button'); ?>
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="test sidebar">
            <?php render_component('ui/Card', [
                'children' => function () {
            ?>
                <div class="sidebar-wrapper"></div>
                    <?php render_component('ui/Button', [
                        'type'=> 'button',
                        'children'=> 'Cerrar Sesion',
                        'variant'=> 'danger',
                        'name'=> 'logout',
                        'fullWidth'=>true,
                        'onclick'=> "window.location.href = '/logout';",
                    ] );
                    ?>
            <?php
                }
            ]);
            ?>
        </div>
        <div class="test money">
            <?php render_component('ui/Card', [
                'children' => function () {
                    ?>
                    <h3>Money</h3>
                <?php }
                ]);
            ?>
        </div>
        <div class="test activity">
            <?php render_component('ui/Card', [
                'children' => function () {
                    ?>
                    <h3>Activity</h3>
                <?php }
                ]);
            ?>
        </div>
        <div class="test top">
            <?php render_component('ui/Card', [
                'children' => function () {
                    ?>
                    <h3>Top</h3>
                <?php }
                ]);
            ?>
        </div>
        <div class="test courses">
            <?php render_component('ui/Card', [
                'children' => function () {
                    ?>
                    <h3>Courses</h3>
                <?php }
                ]);
            ?>
        </div>
        <div class="test footer">
            <?php render_component('ui/Card', [
                'children' => function () {
                    ?>
                    <h3>Footer</h3>
                <?php }
                ]);
            ?>
        </div>
    </div>
</body>

</html>