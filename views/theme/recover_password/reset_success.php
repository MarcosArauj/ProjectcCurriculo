<?php $v->layout("theme/_default"); ?>
<section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id="titulo_home">
            <a href="<?= $router->route("web.home"); ?>">
                <b><?= site("name") . " - ". site("desc");?></b>
            </a>
        </h1>
    </div>
</section>

<section class="container col-md-6">
    <div class="alert_message">
        <?= flash();?>
    </div>
    <div class="alert alert-success">

        <h4 class="alert-heading">Senha Alterada com Sucesso!!</h4>
        <p>Tente fazer o login com sua nova senha. <span><a href="<?= $router->route("web.login"); ?>">Clique aqui</a> para fazer o login.</span></p>
        </div>
    </div>
</section>


