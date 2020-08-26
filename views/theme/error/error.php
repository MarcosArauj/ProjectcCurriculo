<?php $v->layout("theme/_default"); ?>
<div class="page_error">
    <h1 style="text-align: center">Ooooops Error <?= $error; ?>! :(</h1>
    <p><b>Desculpe pelo incomodo, Caso o problema prescista <br> entre em contato com nosso Suporte!
    </b></p>
    <p><a class="btn btn-danger" href="<?= $router->route("web.home"); ?>" title="Registrar"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar ao Ínicio</a></p>
</div>
