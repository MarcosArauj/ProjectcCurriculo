<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navbar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<section class="col-md-10 cad">
<form class="form" action="/curriculum/contact/update" method="post" autocomplete="off">
<div class="alert_message">
    <?php echo flash(); ?>

</div>
<div class="card bg-dark ">
    <div class="card-header">
        <h4 class="h2">Contato</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Coluna 1 -->
            <div class="col">
                <!-- Linha 1 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="cep"><strong class="obrigatorio">*</strong><b>CEP</b></label>
                        <input type="text" class="form-control form-control-sm" id="cep" name="cep" value="<?php echo htmlspecialchars( $user["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onkeypress="format('##.###-###',this)"  maxlength="10" autofocus required>
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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" ><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                        <input type="text" class="form-control form-control-sm" id="celular" name="celular"  value="<?php echo htmlspecialchars( $user["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onkeypress="format('##-#####-####',this)"  maxlength="13" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  for="telefone"><b>Telefone Fixo</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" ><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                            </div>
                         <input type="text" class="form-control form-control-sm" name="telefone" id="telefone" value="<?php echo htmlspecialchars( $user["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Ex: 00-00000-0000" onkeypress="format('##-####-####',this)"  maxlength="12" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="upemail" class="form-group col-md-6">
                        <label for="upemail">
                            <strong class="obrigatorio">*</strong><b>E-mail</b>&nbsp;&nbsp; <strong id="mesmeail" class="error-disabled" ><span class="h6">E-mail inválido!!!</span></strong>
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" ><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input type="email" class="form-control form-control-sm" value="<?php echo htmlspecialchars( $user["c_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="campo_email"  name="c_email"  autofocus>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
    <div class="card-footer">
        <?php if( !checkCurriculum() ){ ?>

        <?php if( $user["id_pessoa"] == NULL ){ ?>

            <a class="btn btn-danger float-left" href="/user/personal_data/create" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
            <?php }else{ ?>

            <a class="btn btn-danger float-left" href="/user/personal_data/update" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
            <?php } ?>

        <?php } ?>

        <div class="float-right">
            <button class="btn btn-md btn-success"><i class="fa fa-edit"></i> Atualizar</button>
            <?php if( !checkCurriculum() ){ ?>

               <?php if( $user["id_deficiencia"] == NULL ){ ?>

                <a class="btn btn-primary" href="/user/deficiency/create" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                <?php }else{ ?>

                <a class="btn btn-primary" href="/user/deficiency/update" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                <?php } ?>

            <?php } ?>

        </div>
    </div>
</div>
</form>
</section>
</main>
<?php require $this->checkTemplate("footer");?>


