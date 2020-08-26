<?php $v->layout("theme/_default"); ?>
<div class="alert alert-primary" role="alert">

    <div style="text-align: center">

        <h2><?= site("desc");?></h2>
        <h3><?= saudacao();?></h3>
        <p> <?= flash();?></p>
        <p><a class="btn btn-success" href="<?= $router->route("web.login"); ?>" title="Registrar">Entrar :)</a></p>
        <p><a class="btn btn-primary" href="<?= $router->route("web.register"); ?>" title="Registrar">Registrar :)</a></p>
    </div>

</div>
