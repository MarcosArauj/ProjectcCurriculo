<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<main role="main" id="fundo_login">
    <section class="container col-md-4" style="top: 25%">
            <div class="alert_message">
                <?php echo flash(); ?>

            </div>
            <div  class="card bg-dark">
                <div class="card-header">
                    <span class="card-title">Olá, digite uma nova senha:</span>
                </div>
                <div class="card-body">
                    <form class="form" action="/reset" method="post" autocomplete="off">
                        <div id="cad_senha">
                            <div class="form-group">
                                <div id="div_senha">
                                    <input type="hidden" name="code" value="<?php echo htmlspecialchars( $code, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <strong class="obrigatorio">*</strong><b class="text-white">Senha</b>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="senha" name="senha_nova" placeholder="Senha"  >
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" ><i id="mostrar_senha" class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div id="div_confsenha">
                                    <strong class="obrigatorio">*</strong><b class="text-white">Confirma Senha</b>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="confirma_senha" name="confirmasenha" placeholder="Confirma Senha"  >
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
                        <hr>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-md btn-success float-right" >&nbsp;&nbsp;Enviar Nova Senha&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</main>
<?php require $this->checkTemplate("footer");?>


