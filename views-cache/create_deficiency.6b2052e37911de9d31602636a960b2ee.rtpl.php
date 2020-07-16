<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Registro - Deficiência <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

    <div class="alert_message">
        <?php echo flash(); ?>
    </div>
<form class="form" action="/curriculum/deficiency" method="post" autocomplete="off">
    <div class="card border-success ">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <b>Você possui algum tipo de Deficiência? </b> <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="nao_deficiencia" name="deficiencia" class="custom-control-input" autofocus>
                        <label class="custom-control-label" for="nao_deficiencia">Não</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sim_deficiencia" name="deficiencia" class="custom-control-input">
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
                                <option value="">Selecione</option>
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
                            <input type="text" class="form-control form-control-sm" id="cid" name="cid" placeholder="Ex: M17.0 ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="especificacao"><strong class="obrigatorio">*</strong><b>Especifique sua Deficiência</b></label>
                            <textarea class="form-control form-control-sm" id="especificacao" name="especificacao_deficiencia" placeholder="Descreva sua Deficiência"  rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="regime_cota" id="regime_cota" value="Não">
                        <label class="custom-control-label" for="regime_cota"><b>Já trabalhou pelo regime de <a
                                href="https://www2.camara.leg.br/legin/fed/lei/1991/lei-8213-24-julho-1991-363650-publicacaooriginal-1-pl.html" target="_blank">Lei de Cotas 8213/91</a>?</b></label>
                    </div>
                </div>
                <!-- Coluna 2 -->
                <div class="col deficiencia">
                    <div class="row">
                        <div class="form-group  col-md-12">
                        <strong class="obrigatorio">*</strong><b>Possúi veículo adaptado ?</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="offset-md-4"></span>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="simveículo" name="veiculo_adaptado" class="custom-control-input" value="Sim">
                            <label class="custom-control-label" for="simveículo">Sim</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="naoveículo" name="veiculo_adaptado" class="custom-control-input" value="Não">
                            <label class="custom-control-label" for="naoveículo">Não</label>
                        </div>
                        <br>
                        <strong class="obrigatorio">*</strong><b>Independente no transporte coletivo ?</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="offset-md-2"></span>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="simtransporte" name="transporte" class="custom-control-input" value="Sim">
                            <label class="custom-control-label" for="simtransporte">Sim</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="naotransporte" name="transporte" class="custom-control-input" value="Não">
                            <label class="custom-control-label" for="naotransporte">Não</label>
                        </div>
                        <br>
                        <strong class="obrigatorio">*</strong><b>Necessita de acompanhantes ou cão-guia ?</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="offset-md-1"></span>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="simacompanhantes" name="acompanhantes" class="custom-control-input" value="Sim">
                            <label class="custom-control-label" for="simacompanhantes">Sim</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="naoacompanhantes" name="acompanhantes" class="custom-control-input" value="Não">
                            <label class="custom-control-label" for="naoacompanhantes">Não</label>
                        </div>
                        <br>
                        <strong class="obrigatorio">*</strong><b>Necessita de adaptações no ambiente de trabalho ?</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="simadaptacoes" name="adaptacoes_trabalho" class="custom-control-input" value="Sim">
                            <label class="custom-control-label" for="simadaptacoes">Sim</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="naoadaptacoes" name="adaptacoes_trabalho" class="custom-control-input" value="Não">
                            <label class="custom-control-label" for="naoadaptacoes">Não</label>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="especificacao_nessecidade"><b>Especifique a Necessidade</b></label>
                            <textarea class="form-control form-control-sm" id="especificacao_nessecidade" name="especificacao_trabalho" placeholder="Digite no espaço acima as adaptações necessárias no ambiente de trabalho."  rows="4" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
           </div>
           <div class="card-footer">
               <a class="btn btn-danger float-left" href="/user/contact" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
               <div class="row float-right">
               <button class="btn btn-md btn-success deficiencia"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Adicionar Deficiência</button>&nbsp;
               <a class="btn btn-primary " href="/user/formation" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
               </div>
           </div>
    </div>
    </form>



