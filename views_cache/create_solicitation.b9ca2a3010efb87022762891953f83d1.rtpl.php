<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navebar_forgot");?>
<main role="main">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-3">
        <h2 class="text-center"><u>Criar Solicitação</u></h2>
    </div>
    <section class="container col-md-6">
        <div class="alert_message">
            <?php echo flash(); ?>
        </div>
        <form class="form" action="/support/solicitation_create" method="post" autocomplete="on">
        <div  class="card bg-dark" style="color: white">
            <div class="card-header">
                <h4 class="h2">Criar Solicitação</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Coluna 1 -->
                    <div class="col">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <strong class="obrigatorio">*</strong><b>Nome Completo</b>
                                <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" placeholder="Digite seu nome" autofocus>
                            </div>
                            <div class="col-md-6">
                                <div id="cpf" class="form-group">
                                    <strong class="obrigatorio">*</strong><b>CPF</b>&nbsp;&nbsp; <strong  id="mescpf" class="error-disabled"> CPF inválido!!!</strong>
                                    <input type="text" class="form-control" name="cpf" id="camp_cpf" placeholder="Ex: 000.000.000-00" onkeypress="format('###.###.###-##',this)"  maxlength="14">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div id="email" class="form-group">
                                    <strong class="obrigatorio">*</strong><b class="text-white">E-mail</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >@</span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="E-mail (exemplo@email.com)" id="campo_email"  name="email">
                                    </div>
                                    <div id="mesmeail" class="error-disabled" >
                                        E-mail inválido!!!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <strong class="obrigatorio">*</strong><b>Assunto</b>
                                <select class="form-control" name="assunto" id="assunto">
                                    <option value="">Selecione</option>
                                    <option value="Recuperar Senha">Senha</option>
                                    <option value="Recuperar E-mail">E-mail</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong class="obrigatorio">*</strong><b>Descrição </b>
                                <textarea class="form-control form-control-sm" id="descricao_solicitacao" name="descricao_solicitacao" placeholder="Descreva um pouco sua solicitação"  rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-danger float-left" href="/" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar ao início</a>
                <button class="btn btn-md btn-success float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Registrar Solicitação</button>
            </div>
        </div>
        </form>
    </section>
</main>

<?php require $this->checkTemplate("footer");?>

