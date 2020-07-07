<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="alert alert-primary" role="alert">

    <div style="text-align: center">

        <h2><?php echo site("desc"); ?></h2>
        <h3><?php echo saudacao(); ?></h3>
        <p> <?php echo flash(); ?></p>
        <p><a class="btn btn-success" href="/login" title="Registrar">Entrar :)</a></p>
        <p><a class="btn btn-primary" href="/register" title="Registrar">Registrar :)</a></p>
    </div>

</div>
