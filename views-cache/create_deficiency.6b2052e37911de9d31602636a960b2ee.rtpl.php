<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Registro - Deficiência <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

    <div class="alert">
        <?php echo flash(); ?>
    </div>
<form class="form" action="/curriculum/deficiency" method="post" autocomplete="off">
    <div class="card border-success ">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <b>Selecione para realizar o Cadstro</b> <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="nao_deficiencia" name="nao_deficiencia" class="custom-control-input" autofocus>
                        <label class="custom-control-label" for="nao_deficiencia">Não</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sim_deficiencia" name="sim_deficiencia" class="custom-control-input">
                        <label class="custom-control-label" for="sim_deficiencia">Sim</label>
                    </div>
                    <hr>
                </div>

                <!-- Coluna 1 -->
                <div class="col deficiencia">
                    <div class="form-group col-md-12">
                        <label for="tipo_deficiencia"><strong class="obrigatorio">*</strong><b>Tipo de Deficiência</b></label>
                        <select class="form-control form-control-sm" name="tipo_deficiencia" id="tipo_deficiencia" >
                            <option value="">Selecione</option>
                            <option value="Auditiva">Auditiva</option>
                            <option value="Fisica">Fisica</option>
                            <option value="Mental">Mental</option>
                            <option value="Multipla">Multipla</option>
                            <option value="Visual">Visual</option>
                        </select>
                    </div>
                </div>
                <!-- Coluna 2 -->
                <div class="col deficiencia">
                    <div class="form-group col-md-12">
                        <label for="empresa_atual"><strong class="obrigatorio">*</strong><b>Empresa Atual </b></label>
                        <input type="text" class="form-control form-control-sm" id="" name="empresa_atual" placeholder="Ex:Empresa">
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-md btn-success float-right">Adicionar Deficiência</button>
                    </div>
                </div>
            </div>
           </div>
           <div class="card-footer">
               <a class="btn btn-primary float-right" href="/user/formation" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
            <a class="btn btn-danger float-left" href="/user/contact" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a></p>
        </div>
    </div>
    </form>



