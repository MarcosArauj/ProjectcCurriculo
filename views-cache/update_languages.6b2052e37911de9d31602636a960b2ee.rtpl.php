<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Atualização - Idiomas </h4>
    </div>

<div class="alert_message col-md-8">
    <?php echo flash(); ?>
</div>
<form class="form" action="/curriculum/<?php echo htmlspecialchars( $languages["id_idiomac"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/languages" method="post" autocomplete="off">
<div class="col-md-8">
<div  class="card border-success">
    <div class="card-body">
    <div class="row">
        <!-- Coluna 1 -->
        <div class="col">
            <div class="form-group col-md-8">
                <label for="idioma"><strong class="obrigatorio">*</strong><b>Idioma</b></label>
                <select class="form-control form-control-sm" name="idioma" id="idioma" autofocus>
                    <option value="<?php echo htmlspecialchars( $languages["idioma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $languages["idioma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php $counter1=-1;  if( isset($lang_cad) && ( is_array($lang_cad) || $lang_cad instanceof Traversable ) && sizeof($lang_cad) ) foreach( $lang_cad as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["idioma_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idioma_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label  for="nivel"><strong class="obrigatorio">*</strong><b>Nivél de Conhecimento</b></label>
                <select class="form-control form-control-sm" name="nivel_conhecimento" id="nivel" required >
                    <option value="<?php echo htmlspecialchars( $languages["nivel_conhecimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $languages["nivel_conhecimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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
        </div>
    </div>
    </div>
    <div class="card-footer">
          <a class="btn btn-danger float-left" href="/user/languages" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
        <div class="float-right">
            <button class="btn btn-md btn-success float-right"> Atualizar Idioma</button>
        </div>
    </div>
</div>
</div>
</form>

