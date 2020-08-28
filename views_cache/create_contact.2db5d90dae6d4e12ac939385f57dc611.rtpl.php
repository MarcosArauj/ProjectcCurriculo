<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Registro - Contato <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

<div class="alert_message">
    <?php echo flash(); ?>

</div>
<form class="form" action="/curriculum/contact/create" method="post" autocomplete="off">
    <div class="card border-success ">
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <!-- Linha 1 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cep"><strong class="obrigatorio">*</strong><b>CEP</b></label>
                            <input type="text" class="form-control form-control-sm" id="cep" name="cep" placeholder="CEP" onkeypress="formatar('##.###-###',this)"  maxlength="10" autofocus required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endereco"><strong class="obrigatorio">*</strong><b>Endereço</b></label>
                            <input type="text" class="form-control form-control-sm" id="endereco" name="endereco" placeholder="Ex: Rua/Avenida" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="numero"><strong class="obrigatorio">*</strong><b>Nº</b></label>
                            <input type="text" class="form-control form-control-sm" id="numero" name="numero" placeholder="Ex: 234" required>
                        </div>
                    </div>
                    <!-- Linha 2 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bairro"><strong class="obrigatorio">*</strong><b>Bairro</b></label>
                            <input type="text" class="form-control form-control-sm" id="bairro" name="bairro" placeholder="Ex: Bairro" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade"><strong class="obrigatorio">*</strong><b>Cidade</b></label>
                            <input type="text" class="form-control form-control-sm" id="cidade" name="cidade" placeholder="Ex: Cidade" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="estado"><strong class="obrigatorio">*</strong><b>Estado</b></label>
                            <input type="text" class="form-control form-control-sm" id="estado" name="estado" placeholder="Ex: UF" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pais"><strong class="obrigatorio">*</strong><b>País</b></label>
                            <select class="form-control form-control-sm" name="pais" id="pais" required>
                                <option value="">Selecione</option>
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
                            <input type="text" class="form-control form-control-sm" id="celular" name="celular"  placeholder="Ex: 00-00000-0000" onkeypress="formatar('##-#####-####',this)"  maxlength="13" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label  for="telefone"><b>Telefone Fixo</b></label>
                            <input type="text" class="form-control form-control-sm" name="telefone" id="telefone" placeholder="Ex: 00-00000-0000" onkeypress="formatar('##-####-####',this)"  maxlength="12" >
                        </div>
                    </div>
                </div>

           </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button class="btn btn-md btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Registrar Contato</button>
                <a class="btn btn-primary" href="/user/deficiency/create" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
            </div>
        </div>

    </div>
</form>
<?php require $this->checkTemplate("footer");?>


