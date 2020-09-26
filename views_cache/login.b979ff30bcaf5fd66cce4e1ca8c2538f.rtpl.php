<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar_login");?>

<main role="main" id="fundo_login">
    <form class="form" action="/login" method="post" autocomplete="off">
        <section class="container col-md-4" style="top: 40px;">
            <div class="alert_message">
                <?php echo flash(); ?>

            </div>
            <div  class="card bg-dark">
                <div class="card-header">
                    <span class="card-title">Entre em sua conta</span>
                </div>
                <div class="card-body">
                    <form class="form" action="/login" method="post" autocomplete="off">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control"  placeholder="Usuário - E-mail ou CPF"  name="login"  autofocus
                                       aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"
                                       aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" ><i id="mostrar_senha" class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="link_forgot" href="/forgot" title="Recuperar Senha">Recuperar senha</a>
                            <button class="btn btn-success"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Entrar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="footer-login">
                    <a href="/register" title="Registre-se aqui" class="link_forgot">Ainda não tenho conta</a>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </form>
</main>
<?php require $this->checkTemplate("footer");?>


