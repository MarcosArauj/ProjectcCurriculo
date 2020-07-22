<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Atualizar - Contato</h4>
    </div>

<div class="alert_message">
    <?php echo flash(); ?>
</div>
<form class="form" action="/curriculum/contact_update" method="post" autocomplete="off">
    <div class="card border-success ">
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <!-- Linha 1 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cep"><strong class="obrigatorio">*</strong><b>CEP</b></label>
                            <input type="text" class="form-control form-control-sm" id="cep" name="cep" value="<?php echo htmlspecialchars( $user["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onkeypress="formatar('##.###-###',this)"  maxlength="10" autofocus required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endereco"><strong class="obrigatorio">*</strong><b>Endereço</b></label>
                            <input type="text" class="form-control form-control-sm" id="endereco" name="endereco" value="<?php echo htmlspecialchars( $user["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="numero"><strong class="obrigatorio">*</strong><b>Nº</b></label>
                            <input type="text" class="form-control form-control-sm" id="numero" name="numero" value="<?php echo htmlspecialchars( $user["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                    </div>
                    <!-- Linha 2 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bairro"><strong class="obrigatorio">*</strong><b>Bairro</b></label>
                            <input type="text" class="form-control form-control-sm" id="bairro" name="bairro" value="<?php echo htmlspecialchars( $user["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade"><strong class="obrigatorio">*</strong><b>Cidade</b></label>
                            <input type="text" class="form-control form-control-sm" id="cidade" name="cidade" value="<?php echo htmlspecialchars( $user["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="estado"><strong class="obrigatorio">*</strong><b>Estado</b></label>
                            <input type="text" class="form-control form-control-sm" id="estado" name="estado" value="<?php echo htmlspecialchars( $user["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pais"><strong class="obrigatorio">*</strong><b>País</b></label>
                            <select class="form-control form-control-sm" name="pais" id="pais" required>
                                <option value="<?php echo htmlspecialchars( $user["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $user["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <?php $counter1=-1;  if( isset($countries) && ( is_array($countries) || $countries instanceof Traversable ) && sizeof($countries) ) foreach( $countries as $key1 => $value1 ){ $counter1++; ?>
                                <option value="<?php echo htmlspecialchars( $value1["nome_pais_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_pais_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <!-- Linha 3 -->
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label  for="celular"><strong class="obrigatorio">*</strong><b>Celular</b></label>
                            <input type="text" class="form-control form-control-sm" id="celular" name="celular"  value="<?php echo htmlspecialchars( $user["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onkeypress="formatar('##-#####-####',this)"  maxlength="13" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label  for="telefone"><b>Telefone Fixo</b></label>
                            <input type="text" class="form-control form-control-sm" name="telefone" id="telefone" value="<?php echo htmlspecialchars( $user["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onkeypress="formatar('##-####-####',this)"  maxlength="12" >
                        </div>
                    </div>
                </div>

           </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-danger float-left" href="/user/personal_data_update" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
            <div class="float-right">
                <button class="btn btn-md btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Atualizar Contato</button>
                <a class="btn btn-primary" href="/user/deficiency" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
            </div>
        </div>

    </div>
    </form>


