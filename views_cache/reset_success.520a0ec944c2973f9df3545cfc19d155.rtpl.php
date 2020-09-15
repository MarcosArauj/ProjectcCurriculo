<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<main role="main">
    <section class="section-forget">
        <img src="/views/assets/images/fundo_login.jpg" class="banner-img" alt="main-banner">
        <div class="form-content">
            <div class="alert alert-success">
                <h4 class="alert-heading">Senha Alterada com Sucesso!!</h4>
                <p>Tente fazer o login com sua nova senha. <span><a href="/login">Clique aqui</a> para fazer o login.</span></p>
            </div>
        </div>
        </div>
    </section>
    <span  class="alert_message">  <?php echo flash(); ?></span>
</main>
<?php require $this->checkTemplate("footer");?>


