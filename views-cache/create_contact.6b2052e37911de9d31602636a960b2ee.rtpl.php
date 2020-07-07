<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <h4 style="text-align: center">
        Registro de Curriculo <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </h4>

</section>

<section class="container col-md-8">
    <div class="alert">
        <?php echo flash(); ?>
    </div>
    <form class="form" action="/curriculum/contact" method="post" autocomplete="off">
    <div class="card border-success ">
        <div class="card-header text-success">
            <h4>Contato</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <!-- Linha 1 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cep"><strong class="obrigatorio">*</strong><b>CEP</b></label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" onkeypress="formatar('##.###-###',this)"  maxlength="10" autofocus required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endereco"><strong class="obrigatorio">*</strong><b>Endereço</b></label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Ex: Rua/Avenida" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="numero"><strong class="obrigatorio">*</strong><b>Nº</b></label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Ex: 234" required>
                        </div>
                    </div>
                    <!-- Linha 2 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bairro"><strong class="obrigatorio">*</strong><b>Bairro</b></label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Ex: Bairro" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade"><strong class="obrigatorio">*</strong><b>Cidade</b></label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex: Cidade" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="estado"><strong class="obrigatorio">*</strong><b>Estado</b></label>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Ex: UF" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pais"><strong class="obrigatorio">*</strong><b>País</b></label>
                            <input type="text" class="form-control" id="pais" name="pais" placeholder="Ex: País" required>
                        </div>

                    </div>
                    <!-- Linha 3 -->
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label  for="celular"><strong class="obrigatorio">*</strong><b>Celular</b></label>
                            <input type="text" class="form-control" id="celular" name="celular"  placeholder="Ex: 00-00000-0000" onkeypress="formatar('##-#####-####',this)"  maxlength="13" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label  for="telefone"><strong class="obrigatorio">*</strong><b>Telefone Fixo</b></label>
                            <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Ex: 00-00000-0000" onkeypress="formatar('##-####-####',this)"  maxlength="12" >
                        </div>
                    </div>
                </div>

           </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-md btn-success float-right">Proximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            <a class="btn btn-danger float-left" href="/user/personalData" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a></p>
        </div>

    </div>
    </form>
</section>

</div>

