<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Registro - Outros Cursos <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

<div class="alert_message">
    <?php echo flash(); ?>

</div>
<form class="form" action="/curriculum/other_courses/create" method="post" autocomplete="off">
    <div  class="card border-success">
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nome_curso"><strong class="obrigatorio">*</strong><b>Curso</b></label>
                            <input type="text" class="form-control form-control-sm" id="nome_curso" name="nome_curso" placeholder="Ex: Nome do Curso" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="carga_horaria"><strong class="obrigatorio">*</strong><b>Carga Horária</b></label>
                            <input type="text" class="form-control form-control-sm" id="carga_horaria" name="carga_horaria" placeholder="Ex: 2010"  onkeypress="format('#####',this)"  maxlength="4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="termino"><strong class="obrigatorio">*</strong><b>Conclusão</b></label>
                            <input type="date" class="form-control form-control-sm" id="termino" name="termino" >
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group col-md-12">
                        <label for="instituicao"><strong class="obrigatorio">*</strong><b>Instituição de Ensino</b></label>
                        <input type="text" class="form-control form-control-sm" id="instituicao" name="instituicao" placeholder="Ex: Instituição de Ensino">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="compentencias"><strong class="obrigatorio">*</strong><b>Compentências</b></label>
                        <textarea class="form-control form-control-sm" id="compentencias" name="compentencias" placeholder="Descreva um pouco das competências aprendidas no curso"  rows="4"></textarea>
                    </div>
                </div>
           </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
               <button class="btn btn-md btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Curso</button>
               <a class="btn btn-primary" href="/user/languages/create" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
            </div>
        </div>
    </div>
</form>

<!-- Lista de Cursos -->
<?php require $this->checkTemplate("table_other_courses");?>

<?php require $this->checkTemplate("footer");?>




