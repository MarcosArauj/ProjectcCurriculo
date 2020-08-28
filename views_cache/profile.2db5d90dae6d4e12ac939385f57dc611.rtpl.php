<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php if( $user["nome_social_uso"] == 'Sim' ){ ?>

          <h4><?php echo htmlspecialchars( $user["nome_social"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
        <?php }else{ ?>

            <h4><?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $user["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
        <?php } ?>

    </div>

    <div class="alert_message col-md-8">
        <?php echo flash(); ?>

    </div>
<form action="/curriculum/personal_data/photo" method="post" enctype="multipart/form-data">
    <div  class="card border-success">
            <div class="card-body">
                <div class="row">
                    <!-- Coluna 1 -->
                    <div class="col-3">
                        <?php if( $user["foto_usuario"] != null ){ ?>

                        <img class="img-circle" src="<?php echo htmlspecialchars( $user["foto_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nova_imagem" alt="Photo">
                        <?php }else{ ?>

                        <img class="img-circle" src="/views/assets/images/user/user.png" id="nova_imagem" alt="Photo">
                        <?php } ?>

                        <label id="userphoto" for="foto_usuario">Enviar Foto</label>
                        <input type="file" name="foto_usuario" id="foto_usuario" onchange="carregarImagem(event)"/>
                    </div>
                    <!-- Coluna 2 -->
                    <div class="col-3">
                        <div class="row"><h5>Dados Pessoais</h5></div>
                        <div class="row">
                            <label><b>Sexo: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["genero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            <span class="offset-1"></span>
                            <label><b>Cor/Raça: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["cor_raca"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <div class="row">
                            <label><b>Data de Nascimento: </b></label>&nbsp;
                            <span><?php echo formatDate($user["nascimento"]); ?></span>
                        </div>
                        <div class="row">
                            <label><b>Naturalidade: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $user["uf_naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        </div>
                        <div class="row">
                            <label><b>Nacionalidade: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["nacionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        </div>
                    </div>
                    <!-- Coluna 3 -->
                    <div class="col-6">
                        <div class="row"><h5>Contato</h5></div>
                        <div class="row">
                            <label><b>Rua/Av: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            <span class="offset-1"></span>
                            <label><b>Nº: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <div class="row">
                            <label><b>CEP: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            <span class="offset-2"></span>&nbsp;&nbsp;
                            <label><b>Bairro: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <div class="row">
                            <label><b>Cidade: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            <span class="offset-2"></span>
                            <label><b>Pais: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <hr/>
                        <div class="row">
                            <label><b>Celular: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                            <span class="offset-2"></span>
                            <label><b>Telefone: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        </div>
                        <div class="row">
                            <label><b>E-mail: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <div class="float-left">
                <a class="btn btn-danger" href="/user/other_courses" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                <button class="btn btn-md btn-success" type="submit"><i class="fa fa-plus-circle" aria-hidden="true"></i> Registrar Foto</button>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="/user/personal_data/update" title="Editar Perfil"> Editar Perfil <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#ModalExcluir" href=""><i class="fa fa-trash"></i> Excluir Cadastro</a>
                    <!-- Modal Excluir -->
                    <div class="modal fade" id="ModalExcluir" role="dialog">
                        <div class="modal-dialog modal-sm">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p><b>Deseja realmente excluir seu Registro?</b></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="/curriculum/curriculum/delete"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sim</a>
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<?php require $this->checkTemplate("footer");?>

<script>
    var carregarImagem = function(){
        var reader = new FileReader();
        reader.onload = function(){

            var output = document.getElementById('nova_imagem');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>