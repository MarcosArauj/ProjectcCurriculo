<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="brand" href="/"><?php echo site("name_complete"); ?></a>
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav mr-auto link_navebar">
                <li class="nav-item">
                    <a class="nav-link" href="/">Início</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a class="btn link_btn link_register" href="/register" title="Registre-se aqui">&nbsp;&nbsp;Registre-se aqui :)&nbsp;&nbsp;</a>
            </div>
        </div>
    </nav>
</header>
<main role="main">
    <section class="section-banner">
        <img src="/views/assets/images/fundo_login.jpg" class="banner-img" alt="main-banner">
        <div class="form-content">
            <div class="card-login">
                <div class="card-header">
                    <span class="card-title">Entre em sua conta</span>
                </div>
                <div class="card-body">
                    <form class="form" action="/login" method="post" autocomplete="off">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control"  placeholder="Usuário - E-mail ou CPF"  name="login"  autofocus
                                   aria-label="Username" aria-describedby="basic-addon1">
                        </div>

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
                        <div class="d-flex justify-content-between">
                            <a class="link_forgot" href="/forgot" title="Recuperar Senha">Recuperar senha</a>
                            <button class="btn btn-success"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Entrar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="/register" title="Registre-se aqui" class="link_forgot">Ainda não tenho conta</a>
                </div>
            </div>
        </div>
    </section>
    <span  class="alert_message">  <?php echo flash(); ?></span>
</main>
<?php require $this->checkTemplate("footer");?>


