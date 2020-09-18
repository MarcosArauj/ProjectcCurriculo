<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<form class="form" action="/curriculum/professional_experience/create" method="post" autocomplete="off">
    <section class="section-register">
        <div class="form-content">
            <div class="card bg-dark col-md-8">
                <div class="card-header">
                    <h4 class="h2">Registro - Experiência Profissional</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Coluna 1 -->
                        <div class="form-group col-md-12">
                            <b>Selecione para realizar o Cadastro</b> <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sim_emprego" name="registro" class="custom-control-input" value="ativo"  autofocus>
                                <label class="custom-control-label" for="sim_emprego">Emprego Atual</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="nao_emprego" name="registro" class="custom-control-input" value="inativo">
                                <label class="custom-control-label" for="nao_emprego">Empregos Anteriores</label>
                            </div>
                            <hr>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="form-group col-md-12 professional_atual">
                                    <label for="empresa_atual"><strong class="obrigatorio">*</strong><b>Empresa Atual </b></label>
                                    <input type="text" class="form-control form-control-sm" id="empresa_atual" name="empresa_atual" placeholder="Ex:Empresa">
                                </div>
                                <div class="form-group col-md-12 professional_anterior">
                                    <label for="empresa_anterior"><strong class="obrigatorio">*</strong><b>Empresa Anterior </b></label>
                                    <input type="text" class="form-control form-control-sm" id="empresa_anterior" name="empresa_anterior" placeholder="Ex:Empresa" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="cargo"><strong class="obrigatorio">*</strong><b>Cargo </b></label>
                                    <input type="text" class="form-control form-control-sm professional_atual" id="cargo" name="cargo_atual" placeholder="Ex: Gerente">
                                    <input type="text" class="form-control form-control-sm professional_anterior" id="cargo_" name="cargo_anterior" placeholder="Ex: Gerente">
                                </div>
                            </div>
                        </div>
                        <!-- Coluna 2 -->
                        <div class="col">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="data_admissao"><strong class="obrigatorio">*</strong><b>Admissão </b></label>
                                    <input type="date" class="form-control form-control-sm" id="data_admissao" name="data_admissao" >
                                </div>
                                <div class="form-group col-md-6 professional_anterior">
                                    <label for="data_demissao"><strong class="obrigatorio">*</strong><b>Demissão </b></label>
                                    <input type="date" class="form-control form-control-sm" id="data_demissao" name="data_demissao" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="atividade"><strong class="obrigatorio">*</strong><b>Atividade Exercida</b></label>
                                    <textarea class="form-control form-control-sm" id="atividade" name="atividade" placeholder="Descreva um pouco de sua Atividade Exercida"  rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-danger float-left" href="/user/languages/create" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
                    <div class="float-right">
                        <button class="btn btn-md btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Experiência Profissional</button>
                        <a class="btn btn-primary" href="/user/curriculum/create" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <span  class="alert_message">  <?php echo flash(); ?></span>
    <section class="container col-md-8">

        <!-- Lista de Experiência Profissional -->
        <?php require $this->checkTemplate("table_professional");?>

    </section>
</form>
<?php require $this->checkTemplate("footer");?>

