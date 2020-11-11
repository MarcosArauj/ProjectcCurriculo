<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<main role="main" style="background-color: #ccdddd;">
<section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id="titulo_home">
            <a href="/">
                <b><?php echo site("name"); ?> - <?php echo site("desc"); ?></b>
            </a>
        </h1>
    </div>
</section>
<?php if( $curriculum ){ ?>

<section class="container col-md-8" >
   <div class="card border-success" style="color: black;">
     <div class="card-header text-success text-center">
         <?php if( $curriculum["nome_social_uso"] == 'Sim' ){ ?>

         <h1><?php echo htmlspecialchars( $curriculum["nome_social"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
         <?php }else{ ?>

         <h1><?php echo htmlspecialchars( $curriculum["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $curriculum["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
         <?php } ?>

     </div>
     <div class="card-body">
       <div class="row">
           <?php if( $curriculum["foto_usuario"] != NULL ){ ?>

           <div class="col-3">
               <img style="width: 150px;" class="card-img-overlay" src="<?php echo htmlspecialchars( $curriculum["foto_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
           </div>
           <?php }else{ ?>

           <div class="col-2"></div>
           <?php } ?>

           <div class="col-9">
               <!-- Dados Pessoais -->
               <div class="row">
                   <h5><u>Dados Pessoais</u> </h5>
               </div>
               <div class="col">
                   <div class="row">
                       <label><b>Idade: </b></label>&nbsp;
                       <span><?php echo calculateAge($curriculum["nascimento"]); ?> anos;</span>
                       <span class="offset-1"></span>
                       <label><b>Data de Nascimento: </b></label>&nbsp;
                       <span><?php echo formatDate($curriculum["nascimento"]); ?>;</span>
                   </div>
                   <div class="row">
                       <label><b>Sexo: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["genero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-1"></span>
                       <label><b>Cor/Raça: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["cor_raca"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
                   <div class="row">
                       <label><b>Naturalidade: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $curriculum["uf_naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                       <span class="offset-2"></span>
                       <label><b>Nacionalidade: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["nacionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                   </div>
               </div>
               <hr>
               <!-- Contato -->
               <div class="row">
                   <h5><u>Contato</u> </h5>
               </div>
               <div class="col">
                   <div class="row">
                       <label><b>Celular: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                       <span class="offset-2"></span>
                       <?php if( $curriculum["telefone"] != NULL ){ ?>

                       <label><b>Telefone: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                       <?php } ?>

                   </div>
                   <div class="row">
                       <label><b>E-mail: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                   </div>
               </div>
               <hr>
               <!-- Endereço -->
               <div class="row">
                   <h5><u>Endereço</u> </h5>
               </div>
               <div class="col">
                   <div class="row">
                       <label><b>Rua/Av: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-2"></span>
                       <label><b>Nº: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
                   <div class="row">
                       <label><b>CEP: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-3"></span>
                       <label><b>Bairro: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
                   <div class="row">
                       <label><b>Cidade: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $curriculum["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-2"></span>&nbsp;&nbsp;
                       <label><b>Pais: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
               </div>
               <!-- Deficiência -->
               <?php if( $curriculum["deficiencia_existe"] == 'Sim' ){ ?>

               <hr>
               <div class="row">
                   <h5><u>Deficiência</u> </h5>
               </div>
               <div class="col">
                   <div class="row">
                       <label><b>Tipo: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["tipo_deficiencia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-2"></span>&nbsp;&nbsp;
                       <?php if( $curriculum["cid"] != NULL ){ ?>

                       <label><b>CID: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["cid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <?php } ?>

                   </div>
                   <div class="row">
                       <label><b>Detalhamento da Deficiência: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["especificacao_deficiencia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
                   <div class="row">
                       <?php if( $curriculum["regime_cota"] == 'Sim' ){ ?>

                       <label><b>* Já trabalhou pelo regime de <a href="https://www2.camara.leg.br/legin/fed/lei/1991/lei-8213-24-julho-1991-363650-publicacaooriginal-1-pl.html" target="_blank">Lei de Cotas 8213/91</a></b></label>
                       <?php } ?>

                   </div>
                   <div class="row">
                       <?php if( $curriculum["veiculo_adaptado"] == 'Sim' ){ ?>

                       <label><b>* Possúi veículo adaptado</b></label>
                       <?php } ?>

                   </div>
                   <div class="row">
                       <?php if( $curriculum["transporte"] == 'Sim' ){ ?>

                       <label><b>* Independente no transporte coletivo</b></label>
                       <?php }else{ ?>

                       <label><b>* Necessita de ajuda no transporte coletivo</b></label>
                       <?php } ?>

                   </div>
                   <div class="row">
                       <?php if( $curriculum["acompanhantes"] == 'Sim' ){ ?>

                       <label><b>* Necessita de acompanhantes ou cão-guia</b></label>
                       <?php } ?>

                   </div>
                   <div class="row">
                       <?php if( $curriculum["adaptacoes_trabalho"] == 'Sim' ){ ?>

                           <?php if( $curriculum["especificacao_trabalho"] != NULL ){ ?>

                           <label><b>* Detalhamento da Adaptação Necessaria: </b></label>&nbsp;
                           <span><?php echo htmlspecialchars( $curriculum["especificacao_trabalho"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                          <?php } ?>

                       <?php } ?>

                   </div>
               </div>
               <?php } ?>

               <hr>
               <!-- Formação Acadêmica -->
               <div class="row">
                   <h5><u>Formação Acadêmica</u> </h5>
               </div>
               <div class="col">
                   <?php if( $curriculum["nivel_conclusao"] != NULL ){ ?>

                   <div class="row">
                       <label><b>Formação Concluida: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["nivel_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-2"></span>&nbsp;&nbsp;
                       <label><b>Início: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["ano_inicio_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-1"></span>
                       <label><b>Conclusão: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["ano_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
                   <div class="row">
                       <label><b>Instituição de Conclusão: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["instituicao_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
                   <?php } ?>

                   <?php if( $curriculum["nivel_andamento"] != NULL ){ ?>

                   <div class="row">
                       <label><b>Formação em Andamento: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["nivel_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-1"></span>&nbsp;&nbsp;
                       <label><b>Início: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["ano_inicio_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
                   <div class="row">
                       <label><b>Instituição: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["instituicao_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
                   <?php } ?>

                   <div class="row">
                       <?php if( $curriculum["curso"] != NULL ){ ?>

                       <label><b>Curso: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-5"></span>
                       <label><b>Tipo de Graduação: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $curriculum["tipo_graduacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <?php } ?>

                   </div>
               </div>
               <!-- Outros Cursos -->
               <?php if( $courses ){ ?>

               <hr>
               <div class="row">
                   <h6><u>Outros Cursos</u> </h6>
               </div>
               <?php $counter1=-1;  if( isset($courses) && ( is_array($courses) || $courses instanceof Traversable ) && sizeof($courses) ) foreach( $courses as $key1 => $value1 ){ $counter1++; ?>

               <div class="col">
                   <div class="row">
                       <label><b>Curso: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $value1["nome_curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-2"></span>&nbsp;&nbsp;&nbsp;
                       <label><b>Carga Horária: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $value1["carga_horaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> horas</span>
                   </div>
                   <div class="row">
                       <label><b>Instituicão: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $value1["instituicao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       <span class="offset-md-2"></span>
                       <label><b>Conclusão: </b></label>&nbsp;
                       <span><?php echo formatDate($value1["termino"]); ?></span>
                   </div>
                   <div class="row">
                       <label><b>Compentências: </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $value1["compentencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
               </div>
               <br>
               <?php } ?>

               <?php } ?>

               <!-- Idiomas -->
               <?php if( $languages ){ ?>

               <hr>
               <div class="row">
                   <h5><u>Idiomas</u> </h5>
               </div>
               <?php $counter1=-1;  if( isset($languages) && ( is_array($languages) || $languages instanceof Traversable ) && sizeof($languages) ) foreach( $languages as $key1 => $value1 ){ $counter1++; ?>

               <div class="row">
                   <div class="col-5">
                       <label><b>* </b></label>&nbsp;
                       <span><?php echo htmlspecialchars( $value1["idioma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["nivel_conhecimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                   </div>
               </div>
               <?php } ?>

               <?php } ?>

               <!-- Experiência Profissional -->
               <?php if( $professional ){ ?>

               <hr>
               <div class="row">
                   <h5><u>Experiência Profissional</u> </h5>
               </div>
               <?php $counter1=-1;  if( isset($professional) && ( is_array($professional) || $professional instanceof Traversable ) && sizeof($professional) ) foreach( $professional as $key1 => $value1 ){ $counter1++; ?>

                   <?php if( $value1["registro"] == 'inativo' && $value1["empresa_anterior"] != NULL ){ ?>

                   <div class="row">
                       <div class="col-5">
                           <label><b>Empresa: </b></label>&nbsp;
                           <span><?php echo htmlspecialchars( $value1["empresa_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       </div>
                       <div class="col">
                           <label><b>Cargo: </b></label>&nbsp;
                           <span><?php echo htmlspecialchars( $value1["cargo_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-5">
                           <label><b>Admissão: </b></label>&nbsp;
                           <span><?php echo formatDate($value1["data_admissao"]); ?></span>
                       </div>
                       <div class="col">
                           <label><b>Demissão: </b></label>&nbsp;
                           <span><?php echo formatDate($value1["data_demissao"]); ?></span>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col">
                           <label><b>Atividade Exercida: </b></label>&nbsp;
                           <span><?php echo htmlspecialchars( $value1["atividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                       </div>
                   </div>
                    <?php } ?>

                    <?php if( $value1["registro"] == 'ativo' && $value1["empresa_atual"] != NULL ){ ?>

                       <div class="row">
                           <div class="col-5">
                               <label><b>Empresa Atual: </b></label>&nbsp;
                               <span><?php echo htmlspecialchars( $value1["empresa_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                           </div>
                           <div class="col">
                               <label><b>Cargo: </b></label>&nbsp;
                               <span><?php echo htmlspecialchars( $value1["cargo_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-5">
                               <label><b>Admissão: </b></label>&nbsp;
                               <span><?php echo formatDate($value1["data_admissao"]); ?></span>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col">
                               <label><b>Atividade Exercida: </b></label>&nbsp;
                               <span><?php echo htmlspecialchars( $value1["atividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                           </div>
                       </div>
                       <br>
                   <?php } ?>

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
                                   <input type="text" id="link" style="color: black" class="form-control" value="<?php echo site('root'); ?>/curriculum/<?php echo htmlspecialchars( $curriculum["cod_curriculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                               </div>
                               <div class="modal-footer">
                                   <button id="btncopia"  class="btn btn-info btn-sm"><i class="fa fa-clone" aria-hidden="true"></i> Copiar</button>
                                   <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                               </div>
                           </div>
                       </div>
                   </div>
               <?php } ?>

               <?php } ?>

           </div>
       </div>
     </div>
       <div class="card-footer">
           <a class="btn btn-info" data-toggle="modal" data-target="#ModalCompartilha" href="" title="Link de Compartinhamento">
               Link de Compartinhamento <i class="fa fa-share-alt-square" aria-hidden="true"></i></a>
           <a class="btn btn-secondary float-right" href="/curriculum/<?php echo htmlspecialchars( $curriculum["cod_curriculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/generate_pdf" title="Gerar PDF">Gerar PDF <i class="fa fa-clipboard" aria-hidden="true"></i> </a>
       </div>
   </div>
</section>
<?php }else{ ?>

<div  class="alert alert-danger">
    <h3 class="text-center">Curriculo não Existe</h3>
</div>
<?php } ?>

</div>
</main>
<?php require $this->checkTemplate("footer");?>

