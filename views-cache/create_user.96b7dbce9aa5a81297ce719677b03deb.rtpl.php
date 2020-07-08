<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <h4 style="text-align: center">
        Registro de Usuário
    </h4>

</section>

<section class="container col-md-8">
    <div class="alert">
        <?php echo flash(); ?>
    </div>
    <form class="form" action="/register" method="post" autocomplete="off">
    <div class="card border-success ">
        <div class="card-header text-success">
            <h4>Novo Cadastro  - <?php echo site("name"); ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Coluna E-mails -->
                <div id="cad_email" class="col">
                    <div id="email" class="form-group col-md-12">
                        <label for="email">
                            <strong class="obrigatorio">*</strong><b>E-mail</b>&nbsp;&nbsp; <strong id="mesmeail" class="error-disabled" >E-mail inválido!!!</strong>
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >@</span>
                            </div>
                            <input type="email" class="form-control " placeholder="E-mail (exemplo@email.com)" id="campo_email"  name="email"  autofocus>
                        </div>
                    </div>
                    <div id="confirma_email" class="form-group col-md-12">
                        <label for="email"><strong class="obrigatorio">*</strong><b>Confirma E-mail</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >@</span>
                            </div>
                            <input type="email" class="form-control" placeholder="E-mail (exemplo@email.com)" id="confirmaemail"  name="confirmaemail"  >
                        </div>
                        <div id="mesmeail_conf" class="error-disabled" >
                            E-mails não Conferem!!!
                        </div>
                    </div>
                </div>
                <!-- Coluna senhas -->
                <div id="cad_senha" class="col">
                    <div class="form-group col-md-11">
                        <div id="div_senha">
                            <label for="senha"><strong class="obrigatorio">*</strong><b>Senha</b></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"  >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" ><i id="mostrar_senha" class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-11">
                        <div id="div_confsenha">
                            <label for="confirma_senha"><strong class="obrigatorio">*</strong><b>Confirma Senha</b></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control" id="confirma_senha" name="confirmasenha" placeholder="Confirma Senha"  >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" ><i id="mostrar_confirma_senha" class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="mesenha_conf" class="error-disabled" >
                                Senhas não Conferem!!!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fim Contato-->
        <div class="card-footer">
            <button class="btn btn-md btn-success float-right">Criar Conta</button>
        </div>

    </div>
    </form>
</section>

</div>

