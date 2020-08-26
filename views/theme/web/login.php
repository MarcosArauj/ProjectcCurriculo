<?php $v->layout("theme/_default"); ?>
<section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 id="titulo_home">
        <a href="/">
            <b><?= site("name");?> - <?= site("desc");?> </b>
        </a>
    </h1>
    </div>
</section>

<section class="container col-md-4">
    <div class="alert_message">
        <?= flash();?>
    </div>
    <form class="form" action="<?= $router->route("auth.login"); ?>" method="post" autocomplete="off">
        <div class="card border-success ">
            <div class="card-header text-success text-center">
                <h5><strong>Entre em sua Conta</strong></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Coluna E-mail e Senha -->
                    <div class="col">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control " placeholder="Usuário - E-mail ou CPF"  name="login"  autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" ><i id="mostrar_senha" class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <a id="recuperasenha" href="<?= $router->route("auth.forgot"); ?>" title="Recuperar Senha">Recuperar Senha</a>
                                <button class="btn btn-md btn-success float-right" ><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Entrar&nbsp;&nbsp;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="<?= $router->route("web.register"); ?>" title="Cadastro"><strong>&nbsp;&nbsp;Registre-se aqui :)&nbsp;&nbsp;</strong> </a>
            </div>

        </div>
    </form>
</section>
</div>


