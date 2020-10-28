<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <section class="container col-md-9">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">E-mail Usuário</h4>
        </div>
        <div class="alert_message">
            <?php echo flash(); ?>
        </div>
        <form class="form" action="/admin/<?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update_email" method="post" autocomplete="off">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="row">
                    <!-- Coluna 1 -->
                    <div class="col">
                        <!-- Linha 1 -->
                        <div class="row">
                            <div class="col-md-12">
                                <div id="email" class="form-group">
                                    <strong class="obrigatorio">*</strong><b class="text-white">E-mail</b><?php echo htmlspecialchars( $user["id_contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >@</span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="E-mail (exemplo@email.com)" id="campo_email"  name="c_email">
                                    </div>
                                    <div id="mesmeail" class="error-disabled" >
                                        <h6>E-mail inválido!!!</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-danger float-left" href="/admin/<?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/detail" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                <div class="float-right">
                    <button class="btn btn-md btn-success"><i class="fa fa-edit"></i> Atualizar Registro</button>
                </div>
            </div>
        </div>
        </form>
    </section>
</main>
<?php require $this->checkTemplate("footer");?>


