<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <section class="col-md-8 cad">
        <form class="form" action="/admin/{id_usuario}/update" method="post" autocomplete="off">
            <div class="alert_message">
                <?php echo flash(); ?>
            </div>
            <div class="card bg-dark ">
                <div class="card-header">
                    <h4 class="h2">E-mail Usuário</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Coluna 1 -->
                        <div class="col">
                            <!-- Linha 1 -->
                            <div class="row">
                                <div class="col-md-12">
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

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button class="btn btn-md btn-success"><i class="fa fa-edit"></i> Atualizar Registro</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>
<?php require $this->checkTemplate("footer");?>


