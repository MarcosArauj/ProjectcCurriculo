<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar_register");?>

<main role="main" id="register">
    <section class="section-register">
        <div class="form-content">
            <div class="card-register-img">
                <div class="card-header-img">
                    <h2><u>CADASTRE-SE</u></h2>
                </div>
                <div class="card-body">
                    <h4 style="color: #0062cc">TENHA SEU CURRÍCULO SEM <br> COMPLICAÇÕES DE ONDE ESTIVER</h4>
                    <img src="/views/assets/images/fundo_register.png" alt="fundo_register"  id="fundo_register">
                </div>
            </div>
            <div class="card-register">
                <div class="card-body">
                    <form class="form" action="/register" method="post" autocomplete="off">
                        <div id="cad_email">
                            <div id="email" class="form-group">
                                <strong class="obrigatorio">*</strong><b class="text-white">E-mail</b>&nbsp;&nbsp; <strong id="mesmeail" class="error-disabled" >E-mail inválido!!!</strong>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="E-mail (exemplo@email.com)" id="campo_email"  name="email"  autofocus>
                                </div>
                            </div>
                            <div id="confirma_email" class="form-group">
                                <strong class="obrigatorio">*</strong><b class="text-white">Confirma E-mail</b>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="E-mail (exemplo@email.com)" id="confirmaemail"  name="confirmaemail"  >
                                </div>
                                <div id="mesmeail_conf" class="error-disabled" >
                                    E-mails não Conferem!!!
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="cad_senha">
                            <div class="form-group">
                                <div id="div_senha">
                                    <strong class="obrigatorio">*</strong><b class="text-white">Senha</b>
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
                            <div class="form-group">
                                <div id="div_confsenha">
                                    <strong class="obrigatorio">*</strong><b class="text-white">Confirma Senha</b>
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
                        <hr>
                        <div>
                            <button class="btn btn-md btn-success float-right">Criar Conta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <span  class="alert_message">  <?php echo flash(); ?></span>
</main>

<?php require $this->checkTemplate("footer");?>


