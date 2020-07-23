<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Atualização - Idiomas </h4>
    </div>

    <div class="alert_message">
        <?php echo flash(); ?>
    </div>
    <form class="form" action="/curriculum/<?php echo htmlspecialchars( $languages["id_idiomac"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/languages" method="post" autocomplete="off">
        <div  class="card border-success">
            <div class="card-body">
                <div class="row">
                    <div id="senha_atual" class="form-row">
                        <div class="col-md-12">
                            <label class="control-label" for="senha_atual">Senha Atual</label>
                            <input type="password" class="form-control" name="senha_atual" id="senhatual" maxlength="20" oninput="validarCampoDeSenha()" autofocus>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div id="nova_senha">
                                <label class="control-label" for="nova_senha">Nova Senha</label>
                                <input type="password" class="form-control"  name="nova_senha" id="novasenha" maxlength="20" oninput="validarCampoDeSenha()" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="confirma_senha">
                                <label class="control-label" for="confirma_senha">Confirme a Nova Senha</label>
                                <input type="password" class="form-control" name="confirma_senha" id="confirmasenha" maxlength="20" oninput="validarCampoDeSenha()" required>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-danger float-left" href="/user/languages" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                <div class="float-right">
                    <button class="btn btn-md btn-success float-right"> Atualizar Idioma</button>
                </div>
            </div>
        </div>
    </form>

