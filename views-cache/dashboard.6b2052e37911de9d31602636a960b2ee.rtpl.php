<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div style="text-align: center">
        <p class="alert_message"> <?php echo flash(); ?></p>

        <h2><?php echo site("desc"); ?></h2>

        <?php if( checkCurriculum() ){ ?>
        <h3>Olá -  <?php echo htmlspecialchars( $curriculum["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $curriculum["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
        <?php }else{ ?>
        <h4>Finalize seu Curriculo!</h4>
        <br>
        <p><a class="btn btn-primary" href="/user/curriculum" id="Finalizar" title="Iniciar">Finalizar Curriculo <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        <?php } ?>
    </div>

</div>
</main>
