<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Registro - Dados Pessoais <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

    <div class="alert_message">
        <?php echo flash(); ?>
    </div>
<form class="form" action="/app/personal_data" method="post" autocomplete="off">
    <div class="card border-success ">
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <!-- Linha 1 -->
                    <div class="row">
                        <div class="col-md-12">
                            <div id="mens_social" class="success-disabled" >
                                *Em âmbito federal, o <a href="http://www.planalto.gov.br/ccivil_03/_ato2015-2018/2016/decreto/D8727.htm" target="_blank">Decreto nº 8.727, de 28 de abril de 2016</a>, da Presidência da República normatizou o uso do nome social
                                pelos órgãos e entidades da administração pública federal direta, autárquica e fundacional;
                                <hr>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <b >Usar Nome Social ?</b> <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sim" name="nomesocial" class="custom-control-input">
                                <label class="custom-control-label" for="sim">Sim</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="nao" name="nomesocial" class="custom-control-input" autofocus>
                                <label class="custom-control-label" for="nao">Não</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nome_social"><b>Nome Social</b></label>
                            <input type="text" class="form-control form-control-sm" id="nome_social" name="nome_social" placeholder="Nome social se Houver" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label  for="genero"><strong class="obrigatorio">*</strong><b>Sexo</b></label>
                            <select class="form-control form-control-sm" name="genero" id="genero" required>
                                <option value="">Selecione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>
                    <!-- Linha 2 -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="primeiro_nome"><strong class="obrigatorio">*</strong><b>Nome</b></label>
                            <input type="text" class="form-control form-control-sm" id="primeiro_nome" name="primeiro_nome" placeholder="Digite seu nome" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="sobrenome"><strong class="obrigatorio">*</strong><b>Sobrenome</b></label>
                            <input type="text" class="form-control form-control-sm" id="sobrenome" name="sobrenome" placeholder="Digite seu sobrenome" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nascimento"><strong class="obrigatorio">*</strong><b>Data de Nascimento</b></label>
                            <input type="date" class="form-control form-control-sm" id="nascimento" name="nascimento" required>
                        </div>
                    </div>
                    <!-- Linha 3 -->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label  for="uf"><strong class="obrigatorio">*</strong><b>Estado</b></label>
                            <select class="form-control form-control-sm" name="uf_naturalidade" id="uf" required>
                                <option value="">Selecione</option>
                                <?php $counter1=-1;  if( isset($uf) && ( is_array($uf) || $uf instanceof Traversable ) && sizeof($uf) ) foreach( $uf as $key1 => $value1 ){ $counter1++; ?>
                                <option value="<?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label  for="city"><strong class="obrigatorio">*</strong><b>Naturalidade</b></label>
                            <input type="text" class="form-control form-control-sm" id="city" name="naturalidade" required>
                       </div>
                        <div class="form-group col-md-3">
                            <label for="nacionalidade"><strong class="obrigatorio">*</strong><b>País de Nacionalidade</b></label>
                            <select class="form-control form-control-sm" id="nacionalidade" name="nacionalidade"  required>
                                <option value="">Selecione</option>
                                <?php $counter1=-1;  if( isset($countries) && ( is_array($countries) || $countries instanceof Traversable ) && sizeof($countries) ) foreach( $countries as $key1 => $value1 ){ $counter1++; ?>
                                <option value="<?php echo htmlspecialchars( $value1["nome_pais_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_pais_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label  for="cor"><strong class="obrigatorio">*</strong><b>Cor ou Raça</b></label>
                            <select class="form-control form-control-sm" name="cor_raca" id="cor" required>
                                <option value="">Selecione</option>
                                <option value="Branco">Branco</option>
                                <option value="Negro">Negro</option>
                                <option value="Parda">Parda</option>
                            </select>
                        </div>
                    </div>
                    <!-- Linha 4 -->
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label  for="city"><strong class="obrigatorio">*</strong><b>RG</b></label>
                            <input type="text" class="form-control form-control-sm" id="rg" name="rg"  placeholder="Carteira de Identidade" maxlength="20" required>
                        </div>
                        <div id="cpf" class="form-group col-md-4">
                            <label  for="cpf"><strong class="obrigatorio">*</strong><b>CPF</b></label>
                            <input type="text" class="form-control form-control-sm" name="cpf" id="camp_cpf" placeholder="Ex: 000.000.000-00" onkeypress="formatar('###.###.###-##',this)"  maxlength="14" required>
                            <div id="mescpf" class="error-disabled" >
                                CPF inválido!!!
                            </div>
                        </div>
                    </div>
                </div>

           </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-danger float-left" href="/user" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
            <div class="float-right">
                <button class="btn btn-md btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Registrar Dados Pessoais</button>
                <a class="btn btn-primary" href="/user/contact" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
            </div>
        </div>

    </div>
    </form>


