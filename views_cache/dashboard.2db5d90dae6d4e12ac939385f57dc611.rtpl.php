<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main">
    <div class="dashboard-text">
         <div class="container col-md-8">
             <span  class="alert_message">  <?php echo flash(); ?></span>
            <h1><?php echo site("desc"); ?></h1>
            <?php if( checkCurriculum() ){ ?>

            <h3>Olá -  <?php echo htmlspecialchars( $curriculum["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $curriculum["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
            <?php }else{ ?>

            <h4>Finalize seu Curriculo!</h4>
            <br>
             <form class="form" action="/curriculum/curriculum/create" method="post" autocomplete="off">
                 <button class="btn btn-lg btn-success hover"><i class="fa fa-check" aria-hidden="true"></i>  Finalizar Curriculo</button>
             </form>
            <?php } ?>

         </div>
    </div>

</main>
<?php require $this->checkTemplate("footer");?>

