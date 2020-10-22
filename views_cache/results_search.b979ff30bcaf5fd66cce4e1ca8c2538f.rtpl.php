<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $curriculum ){ ?>

<?php $counter1=-1;  if( isset($curriculum) && ( is_array($curriculum) || $curriculum instanceof Traversable ) && sizeof($curriculum) ) foreach( $curriculum as $key1 => $value1 ){ $counter1++; ?>

<div class="card border-success">
    <div class="card-body text-success">
        <a data-toggle="modal" data-target="#ModalDetalhes<?php echo htmlspecialchars( $value1["id_curriculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="" title="Detalhes">
                    <span  data-toggle="tooltip" data-placement="bottom" title="Clique aqui para Detalhar">
                    <h5 class="card-title" ><?php echo htmlspecialchars( $value1["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                    </span>
        </a>
        <?php if( $value1["nivel_andamento"] != NULL ){ ?>

        <span class="card-text">Ensino <?php echo htmlspecialchars( $value1["nivel_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> incompleto, iniciou em <?php echo htmlspecialchars( $value1["ano_inicio_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
        <br>
        <?php } ?>

        <?php if( $value1["nivel_conclusao"] != NULL ){ ?>

        <span class="card-text">
                Ensino <?php echo htmlspecialchars( $value1["nivel_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> completo, concluido em <?php echo htmlspecialchars( $value1["ano_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                <br>
                </span>
        <?php } ?>

        <?php if( $value1["curso"] != NULL ){ ?>

        <span class="card-text">
                 <?php if( $value1["nivel_andamento"] == 'Superior' ){ ?>

                     Cursando <?php echo htmlspecialchars( $value1["curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                 <?php }else{ ?>

                 <?php echo htmlspecialchars( $value1["tipo_graduacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> em <?php echo htmlspecialchars( $value1["curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                 <?php } ?>

                 </span>
        <?php } ?>

    </div>
</div>
<!-- Modal Compartilhamento de Link do Curriculo -->
<div class="modal fade" id="ModalDetalhes<?php echo htmlspecialchars( $value1["id_curriculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="titulo_home"><b><?php echo htmlspecialchars( $value1["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <img class="rounded-circle" src="<?php echo htmlspecialchars( $value1["foto_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width: 100px; height: 100px" alt="Photo">
                    </div>
                    <div class="col-md-9">
                                <span class="card-text">Idade <?php echo calculateAge($value1["nascimento"]); ?> anos, natural de <?php echo htmlspecialchars( $value1["naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["uf_naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["nacionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
                                </span>
                        <?php if( $value1["nivel_andamento"] != NULL ){ ?>

                        <span class="card-text">Ensino <?php echo htmlspecialchars( $value1["nivel_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> incompleto, iniciou em <?php echo htmlspecialchars( $value1["ano_inicio_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                        <br>
                        <?php } ?>

                        <?php if( $value1["nivel_conclusao"] != NULL ){ ?>

                        <span class="card-text">
                                Ensino <?php echo htmlspecialchars( $value1["nivel_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> completo, concluido em <?php echo htmlspecialchars( $value1["ano_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                                <br>
                                </span>
                        <?php } ?>

                        <?php if( $value1["curso"] != NULL ){ ?>

                        <span class="card-text">
                                 <?php if( $value1["nivel_andamento"] == 'Superior' ){ ?>

                                     Cursando <?php echo htmlspecialchars( $value1["curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                                 <?php }else{ ?>

                                 <?php echo htmlspecialchars( $value1["tipo_graduacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> em <?php echo htmlspecialchars( $value1["curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                                 <?php } ?>

                                 </span>
                        <?php } ?>

                        <?php if( $value1["deficiencia_existe"] == 'Sim' ){ ?>

                        <hr>
                        <p class="card-text"><b>PCD(Pessoa Com Deficiência)</b></p>
                        <i class="fa fa-wheelchair" aria-hidden="true"></i> Tipo de Deficiência: <?php echo htmlspecialchars( $value1["tipo_deficiencia"], ENT_COMPAT, 'UTF-8', FALSE ); ?>


                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo site('root'); ?>/curriculum/<?php echo htmlspecialchars( $value1["cod_curriculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="btn btn-primary btn-sm" target="_blank"> Abrir Curriculo</a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<br>
<?php } ?>

<hr>
<ul class="pagination justify-content-center">
    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

    <li  class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    <?php } ?>

</ul>
<?php } ?>

