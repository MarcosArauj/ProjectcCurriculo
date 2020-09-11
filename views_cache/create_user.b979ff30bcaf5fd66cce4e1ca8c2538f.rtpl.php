<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<main role="main">
<section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="text-center h2">Registro de Usuário</h2>
    </div>

</section>
<section class="container col-md-7">
    <div class="alert_message">
        <?php echo flash(); ?>

    </div>
    <form class="form" action="/register" method="post" autocomplete="off">
    <div class="card border-success ">
        <div class="card-header text-success">
            <h4>Novo Cadastro  - <?php echo site("name"); ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Coluna E-mails -->
                <div id="cad_email" class="col">
                    <div id="email" class="form-group col-md-12">
                        <label for="email">
                            <strong class="obrigatorio">*</strong><b>E-mail</b>&nbsp;&nbsp; <strong id="mesmeail" class="error-disabled" >E-mail inválido!!!</strong>
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" ><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input type="email" class="form-control form-control-sm" placeholder="E-mail (exemplo@email.com)" id="campo_email"  name="email"  autofocus>
                        </div>
                    </div>
                    <div id="confirma_email" class="form-group col-md-12">
                        <label for="email"><strong class="obrigatorio">*</strong><b>Confirma E-mail</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" ><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input type="email" class="form-control form-control-sm" placeholder="E-mail (exemplo@email.com)" id="confirmaemail"  name="confirmaemail"  >
                        </div>
                        <div id="mesmeail_conf" class="error-disabled" >
                            E-mails não Conferem!!!
                        </div>
                    </div>
                </div>
                <!-- Coluna senhas -->
                <div id="cad_senha" class="col">
                    <div class="form-group col-md-11">
                        <div id="div_senha">
                            <label for="senha"><strong class="obrigatorio">*</strong><b>Senha</b></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-sm" id="senha" name="senha" placeholder="Senha"  >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" ><i id="mostrar_senha" class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-11">
                        <div id="div_confsenha">
                            <label for="confirma_senha"><strong class="obrigatorio">*</strong><b>Confirma Senha</b></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-sm" id="confirma_senha" name="confirmasenha" placeholder="Confirma Senha"  >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" ><i id="mostrar_confirma_senha" class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="mesenha_conf" class="error-disabled" >
                                Senhas não Conferem!!!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fim Contato-->
        <div class="card-footer">
            <button class="btn btn-md btn-success float-right">Criar Conta</button>
            <div class="float-left">
                <a class="btn btn-danger" href="/" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Ínicio </a>
                <a class="btn btn-primary" href="/login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Login&nbsp;&nbsp;</a>
            </div>
        </div>

    </div>
    </form>
</section>
</main>
<?php require $this->checkTemplate("footer");?>
