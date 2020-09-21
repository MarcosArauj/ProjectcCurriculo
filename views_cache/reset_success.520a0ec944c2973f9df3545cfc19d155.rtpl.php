<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<main role="main" id="fundo_login">
    <section class="container col-md-6" style="top: 30%">
        <div class="alert_message">
            <?php echo flash(); ?>

        </div>
        <div class="alert alert-success">
            <h4 class="alert-heading">Senha Alterada com Sucesso!!</h4>
            <p>Tente fazer o login com sua nova senha. <span><a href="/login">Clique aqui</a> para fazer o login.</span></p>
        </div>
    </section>
</main>
<?php require $this->checkTemplate("footer");?>


