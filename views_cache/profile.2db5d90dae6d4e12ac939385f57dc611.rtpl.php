<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main" >
<form action="/curriculum/personal_data/photo" method="post" enctype="multipart/form-data">
   <div class="section-dashboard">
       <div class="form-content">
           <div class="card-profile">
               <div class="header-cad">
                   <?php if( $user["nome_social_uso"] == 'Sim' ){ ?>

                   <h3><u><?php echo htmlspecialchars( $user["nome_social"], ENT_COMPAT, 'UTF-8', FALSE ); ?></u></h3>
                   <?php }else{ ?>

                   <h3><u><?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $user["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></u></h3>
                   <?php } ?>

               </div>
               <div class="card-body">
                   <div class="row">
                       <!-- Coluna 1 -->
                       <div class="col">
                           <?php if( $user["foto_usuario"] != NULL ){ ?>

                           <img class="img-circle" src="<?php echo htmlspecialchars( $user["foto_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nova_imagem" alt="Photo">
                           <?php }else{ ?>

                           <img class="img-circle" src="/views/assets/images/user/user.png"  alt="Photo">
                           <?php } ?>

                           <label id="userphoto" for="foto_usuario">Carregar Foto</label>
                           <input type="file" name="foto_usuario" id="foto_usuario" onchange="carregarImagem(event)"/>
                       </div>
                       <!-- Coluna 2 -->
                       <div class="col">
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
                           <div class="row">
                               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalCompartilha" href="" title="Link de Compartinhamento">Link de Compartinhamento <i class="fa fa-share-alt-square" aria-hidden="true"></i></a>
                           </div>
                           <br>
                           <div class="row">
                               <a class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#" href="" title="Gerar PDF">Gerar PDF <i class="fa fa-clipboard" aria-hidden="true"></i></a>
                           </div>
                       </div>
                       <!-- Coluna 3 -->
                       <div class="col">
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
                           </div>
                           <div class="row">
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
                           </div>
                           <div class="row">
                               <?php if( $user["telefone"] != NULL ){ ?>

                               <label><b>Telefone: </b></label>&nbsp;
                               <span><?php echo htmlspecialchars( $user["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                               <?php } ?>

                           </div>
                           <div class="row">
                               <label><b>E-mail: </b></label>&nbsp;
                               <span><?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                           </div>
                       </div>
                   </div>
               </div>
                   <div class="card-footer card-cad">
                       <div class="float-left">
                           <button class="btn btn-md btn-success" type="submit"><i class="fa fa-plus-circle" aria-hidden="true"></i> Registrar Foto</button>
                       </div>
                       <div class="float-right">
                           <a class="btn btn-danger" href="/user/dashboard" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Início </a>
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
           </div>
       </div>
   </div>
</form>
    <!-- Modal Compartilhamento de Link do Curriculo -->
    <div class="modal fade" id="ModalCompartilha" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert_copy ">
                        <?php echo flash(); ?>

                    </div>
                    <p><b>Link de Compartinhamento do seu Curriculo</b></p>
                    <input type="text" id="link" class="form-control" value="<?php echo site('root'); ?>/curriculum/<?php echo htmlspecialchars( $curriculum, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>
                <div class="modal-footer">
                    <button id="btncopy"  class="btn btn-danger btn-sm"><i class="fa fa-clone" aria-hidden="true"></i> Copiar</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</main>
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