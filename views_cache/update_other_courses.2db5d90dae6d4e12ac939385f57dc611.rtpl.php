<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navbar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<section class="col-md-10 cad">
<form class="form" action="/curriculum/<?php echo htmlspecialchars( $courses["id_cursos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/other_courses/update" method="post" autocomplete="off">
<div class="alert_message">
    <?php echo flash(); ?>

</div>
<div  class="card bg-dark">
    <div class="card-body">
        <div class="card-header">
            <h4 class="h2">Outros Cursos</h4>
        </div>
        <div class="row">
            <!-- Coluna 1 -->
            <div class="col">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nome_curso"><strong class="obrigatorio">*</strong><b>Curso</b></label>
                        <input type="text" class="form-control form-control-sm" id="nome_curso" name="nome_curso" value="<?php echo htmlspecialchars( $courses["nome_curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="carga_horaria"><strong class="obrigatorio">*</strong><b>Carga Horária</b></label>
                        <input type="text" class="form-control form-control-sm" id="carga_horaria" name="carga_horaria" value="<?php echo htmlspecialchars( $courses["carga_horaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  onkeypress="format('#####',this)"  maxlength="4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="termino"><strong class="obrigatorio">*</strong><b>Conclusão</b></label>
                        <input type="date" class="form-control form-control-sm" id="termino" name="termino" value="<?php echo htmlspecialchars( $courses["termino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group col-md-12">
                    <label for="instituicao"><strong class="obrigatorio">*</strong><b>Instituição de Ensino</b></label>
                    <input type="text" class="form-control form-control-sm" id="instituicao" name="instituicao" value="<?php echo htmlspecialchars( $courses["instituicao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="compentencias"><strong class="obrigatorio">*</strong><b>Compentências</b></label>
                    <textarea class="form-control form-control-sm" id="compentencias" name="compentencias" placeholder="Descreva um pouco das competências aprendidas no curso"  rows="4"><?php echo htmlspecialchars( $courses["compentencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                </div>
            </div>
       </div>
    </div>
    <div class="card-footer">
          <a class="btn btn-danger float-left" href="/user/other_courses" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
        <div class="float-right">
           <button class="btn btn-md btn-success"><i class="fa fa-edit"></i> Atualizar</button>
        </div>
    </div>
</div>
</form>
</section>
</main>
<?php require $this->checkTemplate("footer");?>




