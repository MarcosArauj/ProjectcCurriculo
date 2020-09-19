<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar_forgot");?>

<main role="main">
    <section class="section-forget">
        <img src="/views/assets/images/fundo_login.jpg" class="banner-img" alt="main-banner">
        <div class="form-content">
            <div class="card-forgot">
                <div class="card-header-forgot">
                    <span class="card-title">Esqueceu sua Senha?</span>
                </div>
                <div class="card-body">
                    <form class="form" action="/forgot" method="post" autocomplete="off">
                        <div id="email" class="form-group">
                            <strong id="mesmeail" class="error-disabled" >E-mail inválido!!!</strong>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >@</span>
                                </div>
                                <input type="email" class="form-control " placeholder="Ex: exemplo@exemplo.com"  id="campo_email" name="email" autofocus>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success">&nbsp;&nbsp;Recuperar minha Senha&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <span  class="alert_message">  <?php echo flash(); ?></span>
</main>

<?php require $this->checkTemplate("footer");?>


