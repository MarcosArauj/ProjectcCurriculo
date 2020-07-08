<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="page">

    <div style="text-align: center">

        <h2><?php echo site("desc"); ?></h2>

        <h3>Olá - <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -> <?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

        <br>
        <h4>Vamos iniciar o cadastro do seu Curriculo!</h4>
        <br>
        <p><a class="btn btn-primary" href="/user/personalData" id="iniciar" title="Iniciar">Iniciar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        <br>
        <a class="btn btn-danger" href="/user/logout" title="Voltar"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar </a></p>
    </div>

</div>
