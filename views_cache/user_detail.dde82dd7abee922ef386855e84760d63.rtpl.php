<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<section class="container col-md-9">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Usuário</h4>
    </div>
    <div class="alert_message">
        <?php echo flash(); ?>
    </div>
    <div class="card" style="color: black;">
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <h5><b>Dados Pessoais</b></h5>
                    <label><b>Sexo: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["genero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    <br>
                    <label><b>Cor/Raça: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["cor_raca"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    <br>
                    <label><b>Data de Nascimento: </b></label>&nbsp;
                    <span><?php echo formatDate($user["nascimento"]); ?></span>
                    <br>
                    <label><b>Naturalidade: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $user["uf_naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                    <br>
                    <label><b>Nacionalidade: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["nacionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                    <br>
                </div>
                <div class="col-6">
                    <h5><b>Contato</b></h5>
                    <br>
                    <label><b>Rua/Av: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    <span class="offset-1"></span>
                    <label><b>Nº: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    <br>
                    <label><b>CEP: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    <br>
                    <label><b>Bairro: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    <br>
                    <label><b>Cidade: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    <span class="offset-2"></span>
                    <label><b>Pais: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    <br>
                    <hr/>
                    <label><b>Celular: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                    <br>
                    <?php if( $user["telefone"] != NULL ){ ?>
                    <label><b>Telefone: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                    <?php } ?>
                    <br>
                    <label><b>E-mail: </b></label>&nbsp;
                    <span><?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                </div>
            </div>
        </div>
        <div class="card-footer">
                <a class="btn btn-danger float-left" href="/admin/users" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
            <div class="float-right">
                <a class="btn btn-primary" href="/admin/<?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update_email" title="Editar Perfil"> Atualizar Email <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
            </div>
        </div>

    </div>
</section>
</main>
<?php require $this->checkTemplate("footer");?>


