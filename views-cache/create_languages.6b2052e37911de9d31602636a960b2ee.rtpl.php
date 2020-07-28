<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Registro - Idiomas <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

<div class="alert_message">
    <?php echo flash(); ?>
</div>

<div  class="card border-success">
    <div class="card-body">
    <div class="row">
        <!-- Coluna 1 -->
        <div class="col">
            <div  class="card border-success">
            <form class="form" action="/curriculum/languages/create" method="post" autocomplete="off">
            <div class="form-group col-md-12">
                <label for="idioma"><strong class="obrigatorio">*</strong><b>Idioma</b></label>
                <select class="form-control form-control-sm" name="idioma" id="idioma" autofocus>
                    <option value="">Selecione</option>
                    <?php $counter1=-1;  if( isset($lang_cad) && ( is_array($lang_cad) || $lang_cad instanceof Traversable ) && sizeof($lang_cad) ) foreach( $lang_cad as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["idioma_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idioma_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-5">
                <label  for="nivel"><strong class="obrigatorio">*</strong><b>Nivél de Conhecimento</b></label>
                <select class="form-control form-control-sm" name="nivel_conhecimento" id="nivel" required >
                    <option value="">Selecione</option>
                    <option value="Iniciante">Iniciante</option>
                    <option value="Basico">Básico</option>
                    <option value="Elementar">Elementar</option>
                    <option value="Intermediario">Intermediário</option>
                    <option value="Avancado">Avançado</option>
                    <option value="Fluente">Fluente</option>
                    <option value="Academico">Acadêmico</option>
                </select>
            </div>
            <div class="col-md-12">
                <div class="success-enabled">
                </div>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-md btn-success float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Idioma</button>
            </div>
            </form>
            </div>
        </div>
        <!-- Coluna 2 -->
        <div class="col">
            <div  class="card border-success">
                <div class="form-group col-md-12">
                        <b>Encontrou o idioma ?</b> <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sim_idioma" name="idioma" class="custom-control-input" >
                            <label class="custom-control-label" for="sim_idioma">Sim</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="nao_idioma" name="idioma" class="custom-control-input">
                            <label class="custom-control-label" for="nao_idioma">Não</label>
                        </div>
                    </div>
                    <form class="form" action="/curriculum/new_languages" method="post" autocomplete="off">
                        <div id="novo_idioma">
                            <div class="form-group col-md-12">
                                <label for="idioma_pt"><b>Digite o Idioma: </b></label>
                                <input type="text" class="form-control form-control-sm" id="idioma_pt" name="idioma_pt" placeholder="Ex:Idioma" >
                            </div>
                            <div class="form-group col-md-12">
                                <button class="btn btn-md btn-success float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Novo Idioma</button>
                            </div>
                        </div>
                  </form>
            </div>
        </div>
    </div>
    </div>
    <div class="card-footer">
          <a class="btn btn-danger float-left" href="/user/other_courses/create" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
        <div class="float-right">
           <a class="btn btn-primary" href="/user/professional_experience/create" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
        </div>
    </div>
</div>
<br>

<div class="card border-success">
<?php require $this->checkTemplate("table_languages");?>
</div>