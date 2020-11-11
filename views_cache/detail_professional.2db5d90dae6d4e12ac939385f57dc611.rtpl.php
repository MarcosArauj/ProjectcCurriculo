<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navbar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Experiência Profissional </h4>
    </div>
    <section class="container col-md-8">
        <div class="alert_message">
            <?php echo flash(); ?>

        </div>
        <div class="card" style="color: black;">
            <div class="card-body">
                <div class="row">
                    <!-- Coluna 1 -->
                    <div class="form-group col-md-12">
                        <div class="form-inline col-md-12">&nbsp;
                            <?php if( $professional["registro"] == 'ativo' ){ ?>

                              <h3><strong>Emprego Atual</strong></h3>
                            <?php }else{ ?>

                             <h3><strong>Experiência Anterior</strong></h3>
                            <?php } ?>

                        </div>
                        <hr>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="form-inline col-md-12">
                                <label><b>Empresa: </b></label>&nbsp;
                                <?php if( $professional["registro"] == 'ativo' ){ ?>

                                <span><?php echo htmlspecialchars( $professional["empresa_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <?php }else{ ?>

                                <span><?php echo htmlspecialchars( $professional["empresa_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <?php } ?>

                            </div>
                            <div class="form-inline col-md-12">
                                <label><b>Cargo:  </b></label>&nbsp;
                                <?php if( $professional["registro"] == 'ativo' ){ ?>

                                <span><?php echo htmlspecialchars( $professional["cargo_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <?php }else{ ?>

                                <span><?php echo htmlspecialchars( $professional["cargo_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <?php } ?>

                            </div>
                            <div class="form-inline col-md-12">
                                <label><b>Data de Admissão: </b></label>&nbsp;
                                <span><?php echo formatDate($professional["data_admissao"]); ?></span>
                            </div>
                             <?php if( $professional["registro"] == 'inativo' ){ ?>

                                <div class="form-inline col-md-12">
                                    <label><b>Data de Demissão: </b></label>&nbsp;
                                    <span><?php echo formatDate($professional["data_demissao"]); ?></span>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <!-- Coluna 2 -->
                    <div class="col">
                        <div class="form-inline col-md-12">
                            <label><b>Atividade Exercida: </b></label>
                            <span><?php echo htmlspecialchars( $professional["atividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-danger float-left" href="/user/professional_experience" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                <div class="float-right">
                    <a class="btn btn-primary" href="/user/<?php echo htmlspecialchars( $professional["id_profissional"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/professional_experience/update" title="Editar"> Editar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require $this->checkTemplate("footer");?>