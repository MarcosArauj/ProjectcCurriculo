<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Experiência Profissional <?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

<div class="alert_message col-md-8">
    <?php echo flash(); ?>

</div>
<div class="col-md-8">
<div  class="card border-success">
    <div class="card-body">
    <div class="row">
        <!-- Coluna 1 -->
        <div class="form-group col-md-12">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="sim_emprego" name="registro" class="custom-control-input" value="ativo" <?php if( $professional["registro"] == 'ativo' ){ ?> checked <?php } ?>>
                <label class="custom-control-label" for="sim_emprego">Emprego Atual</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="nao_emprego" name="registro" class="custom-control-input" value="inativo" <?php if( $professional["registro"] == 'inativo' ){ ?> checked <?php } ?>>
                <label class="custom-control-label" for="nao_emprego">Empregos Anterior</label>
            </div>
            <hr>
        </div>
        <div class="col">
          <div class="row">
            <div class="form-inline col-md-12">
                <label><b>Empresa: </b></label>&nbsp;
                <span class="professional_atual"><?php echo htmlspecialchars( $professional["empresa_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                <span class="professional_anterior"><?php echo htmlspecialchars( $professional["empresa_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </div>
            <div class="form-inline col-md-12">
                <label><b>Cargo:  </b></label>&nbsp;
                <span class="professional_atual"><?php echo htmlspecialchars( $professional["cargo_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                <span class="professional_anterior"><?php echo htmlspecialchars( $professional["cargo_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </div>
              <div class="form-inline col-md-12">
                  <label><b>Data de Admissão: </b></label>&nbsp;
                  <span><?php echo formatDate($professional["data_admissao"]); ?></span>
              </div>
              <div class="professional_anterior">
                  <div class="form-inline col-md-12">
                      <label><b>Data de Demissão: </b></label>&nbsp;
                      <span><?php echo formatDate($professional["data_demissao"]); ?></span>
                  </div>
              </div>
          </div>
        </div>
        <!-- Coluna 2 -->
        <div class="col">
            <div class="col-md-12">
                <label><b>Atividade Exercida: </b></label>
                <span><?php echo htmlspecialchars( $professional["atividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </div>
        </div>
    </div>
    </div>
    <div class="card-footer">
          <a class="btn btn-danger float-left" href="/user/professional_experience" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
        <div class="float-right">
            <a class="btn btn-primary" href="/user/<?php echo htmlspecialchars( $professional["id_profissional"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/professional_experience/update" title="Editar"> Editar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
        </div>
    </div>
</div>
</div>
