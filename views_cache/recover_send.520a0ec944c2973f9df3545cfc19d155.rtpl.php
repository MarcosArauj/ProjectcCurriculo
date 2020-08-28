<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id="titulo_home">
            <a href="/">
                <b><?php echo site("name"); ?> - <?php echo site("desc"); ?></b>
            </a>
        </h1>
    </div>
</section>

<section class="container col-md-4">
    <div class="alert_message">
        <?php echo flash(); ?>

    </div>
    <form class="form" action="/reset" method="post" autocomplete="off">
        <div class="card border-success ">
            <div class="card-header text-success">
                <h5><strong>Olá <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>, digite uma nova senha:</strong></h5>
            </div>
            <div class="card-body">
                <!-- Coluna senhas -->
                <div id="cad_senha" class="col">
                    <div class="row">
                        <div class="form-group col-md-12">
                              <div id="div_senha">
                                  <input type="hidden" name="code" value="<?php echo htmlspecialchars( $code, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                <label for="senha"><strong class="obrigatorio">*</strong><b>Nova Senha</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="password" class="form-control " id="senha" name="senha_nova" placeholder="Nova Senha"  >
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" ><i id="mostrar_senha" class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                              <div id="div_confsenha">
                                <label for="confirma_senha"><strong class="obrigatorio">*</strong><b>Confirma Senha</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control" id="confirma_senha" name="confirmasenha" placeholder="Confirma Senha"  >
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
            <div class="card-footer">
                <button class="btn btn-md btn-success float-right" >&nbsp;&nbsp;Enviar Nova Senha&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></button>
            </div>

        </div>
    </form>
</section>
</div>
<?php require $this->checkTemplate("footer");?>


