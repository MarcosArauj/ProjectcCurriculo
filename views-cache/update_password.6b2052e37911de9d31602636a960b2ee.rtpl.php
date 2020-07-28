<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Atereção de Senha - <?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </h4>
    </div>

<div class="alert_message col-md-8">
    <?php echo flash(); ?>
</div>
<form class="form" action="/user/password/update" method="post" autocomplete="off">
<div class="col-md-8">
<div  class="card border-success">
    <div class="card-body">
                <!-- Coluna senhas -->
    <div id="cad_senha" class="col">
        <div class="row">
            <div class="form-group col-md-12">
                <div id="div_senhaatual">
                    <input type="hidden" name="code" value="<?php echo htmlspecialchars( $code, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <label for="senhatual"><strong class="obrigatorio">*</strong><b>Senha Atual</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control " name="senha_atual" id="senhatual" placeholder="Nova Senha"  >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <div id="div_senha">
                    <label for="senha"><strong class="obrigatorio">*</strong><b>Nova Senha</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control " name="nova_senha" id="senha" placeholder="Nova Senha"  >
                    </div>
                    <div id="mesenha_atual" class="error-disabled" >
                        Digite uma Senha diferente Atual!!!
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div id="div_confsenha">
                    <label for="confirma_senha"><strong class="obrigatorio">*</strong><b>Confirma Senha</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control form-control" name="confirma_senha" id="confirma_senha" placeholder="Confirma Senha"  >
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
        <div class="float-left">
        <a class="btn btn-danger " href="/user/dashboard" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
        <input type="button" id="mostrar_senha_alterar" class="btn btn-secondary btn-md " value="Mostrar Senhas"  />
        </div>
        <div class="float-right">
            <button class="btn btn-md btn-success"> Atualizar Senha</button>
        </div>
    </div>
</div>
</div>
</form>

