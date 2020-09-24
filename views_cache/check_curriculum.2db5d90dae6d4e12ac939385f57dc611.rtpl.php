<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navebar");?>
<main role="main">
    <div class="dashboard-text">
        <div class="container col-md-8">
            <h1><?php echo site("desc"); ?></h1>
            <?php if( checkCurriculum() ){ ?>
            <h3>Olá -  <?php echo htmlspecialchars( $curriculum["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $curriculum["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
            <?php }else{ ?>
            <div class="alert alert-danger">
                <h4>Gentileza Verifique se Existe Dados Obrigatórios sem Preechimento!</h4>
            </div>
            <br>
            <a class="btn btn-primary hover" href="/user/personal_data/update" title="Verificar Curriculo"><i class="fa fa-check" aria-hidden="true"></i>Verificar Curriculo </a>
            <?php } ?>
        </div>
    </div>

</main>
<?php require $this->checkTemplate("footer");?>