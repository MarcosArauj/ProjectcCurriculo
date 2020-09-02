<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php if( $curriculum["nome_social_uso"] == 'Sim' ){ ?>
        <h4><?php echo htmlspecialchars( $curriculum["nome_social"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
        <?php }else{ ?>
        <h4><?php echo htmlspecialchars( $curriculum["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $curriculum["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
        <?php } ?>
    </div>

    <div  class="card border-success">
            <div class="card-body">
                <div class="row">
                    <!-- Coluna 1 -->
                    <div class="col-3">
                        <img class="img-circle" src="<?php echo htmlspecialchars( $curriculum["foto_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
                    </div>
                    <!-- Coluna 2 -->
                    <div class="col-3">
                        <div class="row"><h5>Dados Pessoais</h5></div>
                        <div class="row">
                            <label><b>Sexo: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["genero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            <span class="offset-1"></span>
                            <label><b>Cor/Raça: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["cor_raca"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <div class="row">
                            <label><b>Data de Nascimento: </b></label>&nbsp;
                            <span><?php echo formatDate($curriculum["nascimento"]); ?></span>
                        </div>
                        <div class="row">
                            <label><b>Naturalidade: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $curriculum["uf_naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        </div>
                        <div class="row">
                            <label><b>Nacionalidade: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["nacionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        </div>
                    </div>
                    <!-- Coluna 3 -->
                    <div class="col-6">
                        <div class="row"><h5>Contato</h5></div>
                        <div class="row">
                            <label><b>Rua/Av: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            <span class="offset-1"></span>
                            <label><b>Nº: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <div class="row">
                            <label><b>CEP: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            <span class="offset-2"></span>&nbsp;&nbsp;
                            <label><b>Bairro: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <div class="row">
                            <label><b>Cidade: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            <span class="offset-2"></span>
                            <label><b>Pais: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <hr/>
                        <div class="row">
                            <label><b>Celular: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                            <span class="offset-2"></span>
                            <label><b>Telefone: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        </div>
                        <div class="row">
                            <label><b>E-mail: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $curriculum["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require $this->checkTemplate("footer");?>
