<?php $v->layout("theme/_default"); ?>
<div class="page">
    <div style="text-align: center">
        <p class="alert_message"> <?= flash();?></p>

        <h2><?= site("desc");?></h2>

        <h3>Olá - <?= $user->id_usuario ?> -> <?= $user->email; ?></h3>

        <br>
        <h4>Vamos iniciar o cadastro do seu Curriculo!</h4>
        <br>
        <p><a class="btn btn-primary" href="<?= $router->route("app.savePersonalData"); ?>" id="iniciar" title="Iniciar">Iniciar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        <br>
        <a class="btn btn-danger" href="<?= $router->route("app.logout"); ?>" title="Voltar"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar </a></p>
    </div>
</div>
