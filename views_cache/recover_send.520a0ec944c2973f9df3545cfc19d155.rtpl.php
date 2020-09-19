<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>


<main role="main">
    <section class="section-login">
        <img src="/views/assets/images/fundo_login.jpg" class="banner-img" alt="main-banner">
        <div class="form-content">
            <div class="card-login">
                <div class="card-header">
                    <span class="card-title">Olá, <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?> digite uma nova senha:</span>
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
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-md btn-success float-right" >&nbsp;&nbsp;Enviar Nova Senha&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <span  class="alert_message">  <?php echo flash(); ?></span>
</main>

<?php require $this->checkTemplate("footer");?>


