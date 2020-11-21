<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navbar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<form action="/curriculum/personal_data/photo" method="post" enctype="multipart/form-data">
<section class="container col-md-10 cad">
<div class="alert_message">
    <?php echo flash(); ?>

</div>
<div  class="card text-dark">
    <div class="card-body">
        <div class="text-center">
            <?php if( $user["nome_social_uso"] == 'Sim' ){ ?>

            <h2><?php echo htmlspecialchars( $user["nome_social"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
            <?php }else{ ?>

            <h2><?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $user["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
            <?php } ?>

        </div>
        <hr>
        <div class="row">
            <div class="col-3">
                <label for="foto_usuario" class="user_photo" data-toggle="tooltip" data-placement="bottom" title="Clique aqui e escolha sua Foto. Gentileza usar foto com fundo Branco">
                    <?php if( $user["foto_usuario"] == NULL ){ ?>

                      <img class="img-circle card-img-overlay" src="<?php echo htmlspecialchars( $user["foto_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nova_imagem" alt="Photo">
                     <?php }else{ ?>

                        <?php if( $user["genero"] == 'Masculino' ){ ?>

                        <img class="img-circle card-img-overlay" src="/views/assets/images/user/masculino.jpg" id="nova_imagem" alt="Photo">
                        <?php }elseif( $user["genero"] == 'Feminino' ){ ?>

                        <img class="img-circle card-img-overlay" src="/views/assets/images/user/feminino.jpg"  id="nova_imagem" alt="Photo">
                        <?php } ?>

                    <?php } ?>

                </label>
                <input type="file" name="foto_usuario" id="foto_usuario" onchange="carregarImagem(event)"/>
            </div>
            <div class="col-4">
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
            <!-- Coluna 3 -->
            <div class="col-5">
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
        <div class="float-left">
            <button class="btn btn-md btn-success" type="submit"><i class="fa fa-plus-circle" aria-hidden="true"></i> Registrar Foto</button>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="/user/personal_data/update" title="Editar Perfil"> Editar Perfil <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
            <a class="btn btn-danger" data-toggle="modal" data-target="#ModalExcluir" href=""><i class="fa fa-trash"></i> Excluir Cadastro</a>
        </div>
    </div>
</div>
</section>
</form>
</div>
</main>
<!-- Modal Excluir -->
<div class="modal fade" id="ModalExcluir" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body text-center">
                <p><b>Deseja realmente excluir seu Registro?</b></p>
                <p><b>Voce será redirecionado para a Tela Inicial</b></p>
            </div>
            <div class="modal-footer">
                <form class="form" action="/curriculum/curriculum/delete" method="post">
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sim</button>
                </form>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php require $this->checkTemplate("footer");?>

<script>

    document.querySelector('.user_photo').addEventListener('mouseover',() => {
        document.querySelector('.user_photo').style.cursor = 'pointer';
    });

    var carregarImagem = function(){
        var reader = new FileReader();
        reader.onload = function(){

            var output = document.getElementById('nova_imagem');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>