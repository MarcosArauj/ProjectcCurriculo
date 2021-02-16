<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar");?>
<main role="main">
<form class="form" action="/curriculum/contact/create" method="post" autocomplete="off">
    <section class="container col-md-8 cad">
        <div class="alert_message">
            <?php echo flash(); ?>
        </div>
        <div  class="card bg-dark">
            <div class="card-header">
                <h4 class="h2">Contato</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <!-- Coluna 1 -->
                        <div class="col">
                            <!-- Linha 1 -->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="cep"><strong class="obrigatorio">*</strong><b>CEP</b></label>
                                    <input type="text" class="form-control form-control-sm" id="cep" name="cep" placeholder="CEP" onkeypress="format('##.###-###',this)"  maxlength="10" autofocus required>
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
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="celular" name="celular"  placeholder="Ex: 00-00000-0000" onkeypress="format('##-#####-####',this)"  maxlength="13" required>
                                 </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label  for="telefone"><b>Telefone Fixo</b></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                                        </div>
                                    <input type="text" class="form-control form-control-sm" name="telefone" id="telefone" placeholder="Ex: 00-00000-0000" onkeypress="format('##-####-####',this)"  maxlength="12" >
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <?php if( $user["id_pessoa"] == NULL ){ ?>
                <a class="btn btn-danger float-left" href="/user/personal_data/create" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
                <?php }else{ ?>
                <a class="btn btn-danger float-left" href="/user/personal_data/update" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
                <?php } ?>
                <div class="float-right">
                    <button class="btn btn-md btn-success">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;   Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </button>

                </div>
            </div>
        </div>
    </section>
</form>
</main>
<?php require $this->checkTemplate("footer");?>

