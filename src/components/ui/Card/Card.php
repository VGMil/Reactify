
<div class="card">
        <?php
        
        if ($children instanceof Closure) {
        
            echo $children();
        } else {
        
            echo $children;
        }
        ?>
</div