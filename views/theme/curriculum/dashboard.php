<?php $v->layout("theme/_default"); ?>

<?= $v->insert("theme/includes/navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 text-center">

        <p class="alert_message"> <?= flash();?></p>

        <h2><?= site("desc");?></h2>

        <?php if(checkCurriculum()):?>
           <h3>Olá - <?= $user->primeiro_nome; $user->sobrenome; ?></h3>
         <?php else: ?>
           <h4>Finalize seu Curriculo!</h4>
           <br>
           <p><a class="btn btn-primary" href="<?= $router->route("app.saveCurriculum"); ?>" id="Finalizar" title="Iniciar">Finalizar Curriculo <i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
       <?php endif; ?>

