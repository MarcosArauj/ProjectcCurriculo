<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main">
    <div class="dashboard-text">
            <h1><?php echo site("desc"); ?></h1>
            <?php if( checkCurriculum() ){ ?>

            <h3>Olá -  <?php echo htmlspecialchars( $curriculum["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $curriculum["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
            <?php }else{ ?>

            <h4>Finalize seu Curriculo!</h4>
            <br>
            <p><a class="btn btn-primary hover" href="/user/curriculum/create" id="Finalizar" title="Iniciar">Finalizar Curriculo <i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
            <?php } ?>

           <span  class="alert_message" style="width: 50px">  <?php echo flash(); ?></span>
    </div>

</main>

<?php require $this->checkTemplate("footer");?>

