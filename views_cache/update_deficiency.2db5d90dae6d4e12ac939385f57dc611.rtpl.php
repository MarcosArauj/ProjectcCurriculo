<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<section class="col-md-10 cad">
<form class="form" action="/curriculum/deficiency/create" method="post" autocomplete="off">
<div class="alert_message">
    <?php echo flash(); ?>

</div>
<div class="card bg-dark">
    <div class="card-header">
        <h4 class="h2">Deficiência</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <b>Você possui algum tipo de Deficiência? </b> <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="nao_deficiencia" name="deficiencia_existe" value="Não"  <?php if( $user["deficiencia_existe"] == 'Não' ){ ?> checked <?php } ?> >
                    <label class="custom-control-label" for="nao_deficiencia">Não</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="sim_deficiencia" name="deficiencia_existe" value="Sim"  <?php if( $user["deficiencia_existe"] == 'Sim' ){ ?> checked <?php } ?>>
                    <label class="custom-control-label" for="sim_deficiencia">Sim</label>
                </div>
            </div>
            <div class="success-enabled col-md-8">
            </div>
            <div class="form-group col-md-12">
            <hr>
            </div>
            <!-- Coluna 1 -->
            <div class="col deficiencia">
                <div class="row">
                    <div class="form-group col-md-8">
                        <label><strong class="obrigatorio">*</strong><b>Tipo de Deficiência</b></label>
                        <select class="form-control form-control-sm" name="tipo_deficiencia" id="tipo_deficiencia" required>
                            <option value="<?php echo htmlspecialchars( $user["tipo_deficiencia"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $user["tipo_deficiencia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <option value="Auditiva">Auditiva</option>
                            <option value="Fisica">Fisica</option>
                            <option value="Mental">Mental</option>
                            <option value="Multipla">Multipla</option>
                            <option value="Visual">Visual</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cid"><b>CID</b></label>
                        <input type="text" class="form-control form-control-sm" id="cid" name="cid" placeholder="Ex:M17,3" value="<?php echo htmlspecialchars( $user["cid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="especificacao"><strong class="obrigatorio">*</strong><b>Especifique sua Deficiência</b></label>
                        <textarea class="form-control form-control-sm" id="especificacao" name="especificacao_deficiencia" rows="3" required><?php echo htmlspecialchars( $user["especificacao_deficiencia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                    </div>
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="regime_cota" id="regime_cota" value="Não" <?php if( $user["regime_cota"] == 'Sim' ){ ?> checked <?php } ?>>
                    <label class="custom-control-label" for="regime_cota"><b>Já trabalhou pelo regime de <a
                            href="https://www2.camara.leg.br/legin/fed/lei/1991/lei-8213-24-julho-1991-363650-publicacaooriginal-1-pl.html" target="_blank">Lei de Cotas 8213/91</a>?</b></label>
                </div>
            </div>
            <!-- Coluna 2 -->
            <div class="col deficiencia">
                <div class="row">
                    <div class="form-group  col-md-12">
                    <strong class="obrigatorio">*</strong><b>Possúi veículo adaptado ?</b>&nbsp;<br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="simveículo" name="veiculo_adaptado" class="custom-control-input" value="Sim" <?php if( $user["veiculo_adaptado"] == 'Sim' ){ ?> checked <?php } ?>>
                        <label class="custom-control-label" for="simveículo">Sim</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="naoveículo" name="veiculo_adaptado" class="custom-control-input" value="Não" <?php if( $user["veiculo_adaptado"] == 'Não' ){ ?> checked <?php } ?>>
                        <label class="custom-control-label" for="naoveículo">Não</label>
                    </div>
                    <br>
                    <strong class="obrigatorio">*</strong><b>Independente no transporte coletivo ?</b><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="simtransporte" name="transporte" class="custom-control-input" value="Sim" <?php if( $user["transporte"] == 'Sim' ){ ?> checked <?php } ?>>
                        <label class="custom-control-label" for="simtransporte">Sim</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="naotransporte" name="transporte" class="custom-control-input" value="Não" <?php if( $user["transporte"] == 'Não' ){ ?> checked <?php } ?>>
                        <label class="custom-control-label" for="naotransporte">Não</label>
                    </div>
                    <br>
                    <strong class="obrigatorio">*</strong><b>Necessita de acompanhantes ou cão-guia ?</b><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="simacompanhantes" name="acompanhantes" class="custom-control-input" value="Sim" <?php if( $user["acompanhantes"] == 'Sim' ){ ?> checked <?php } ?>>
                        <label class="custom-control-label" for="simacompanhantes">Sim</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="naoacompanhantes" name="acompanhantes" class="custom-control-input" value="Não" <?php if( $user["acompanhantes"] == 'Não' ){ ?> checked <?php } ?>>
                        <label class="custom-control-label" for="naoacompanhantes">Não</label>
                    </div>
                    <br>
                    <strong class="obrigatorio">*</strong><b>Necessita de adaptações no ambiente de trabalho ?</b><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="simadaptacoes" name="adaptacoes_trabalho" class="custom-control-input" value="Sim" <?php if( $user["adaptacoes_trabalho"] == 'Sim' ){ ?> checked <?php } ?>>
                        <label class="custom-control-label" for="simadaptacoes">Sim</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="naoadaptacoes" name="adaptacoes_trabalho" class="custom-control-input" value="Não" <?php if( $user["adaptacoes_trabalho"] == 'Não' ){ ?> checked <?php } ?> >
                        <label class="custom-control-label" for="naoadaptacoes">Não</label>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 adaptacao">
                        <label for="especificacao_nessecidade"><b>Especifique a Necessidade</b></label>
                        <textarea class="form-control form-control-sm" id="especificacao_nessecidade" name="especificacao_trabalho" placeholder="Digite no espaço acima as adaptações necessárias no ambiente de trabalho."  rows="2" ><?php echo htmlspecialchars( $user["especificacao_trabalho"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
       </div>
       <div class="card-footer">
           <?php if( !checkCurriculum() ){ ?>

                <?php if( $user["id_contato"] == NULL ){ ?>

                <a class="btn btn-danger" href="/user/contact/create" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
                <?php }else{ ?>

                <a class="btn btn-danger" href="/user/contact/update" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
                <?php } ?>

           <?php } ?>

           <div class="form-inline float-right">
           <button class="btn btn-md btn-success deficiencia"><i class="fa fa-edit"></i> Atualizar</button>&nbsp;
               <?php if( !checkCurriculum() ){ ?>

                   <?php if( $user["id_formacao"] == NULL ){ ?>

                    <a class="btn btn-primary" href="/user/formation/create" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                    <?php }else{ ?>

                    <a class="btn btn-primary" href="/user/formation/update" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                    <?php } ?>

               <?php } ?>

           </div>
       </div>
</div>
</form>
</section>
</main>
<?php require $this->checkTemplate("footer");?>



