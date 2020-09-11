<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Outros Cursos <?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

<div class="alert_message col-md-8">
    <?php echo flash(); ?>

</div>
<div class="col-md-8">
<div  class="card border-success">
    <div class="card-body">
    <div class="row">
        <div class="col">
          <div class="row">
            <div class="form-inline col-md-12">
                <label><b>Curso: </b></label>&nbsp;
                <span><?php echo htmlspecialchars( $courses["nome_curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </div>
            <div class="form-inline col-md-12">
                <label><b>Carga Horária:  </b></label>&nbsp;
                <span><?php echo htmlspecialchars( $courses["carga_horaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Horas</span>
            </div>
              <div class="form-inline col-md-12">
                  <label><b>Instituição de Ensino: </b></label>&nbsp;
                  <span><?php echo htmlspecialchars( $courses["instituicao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
              </div>
              <div class="form-inline col-md-12">
                  <label><b>Data de Conclusão: </b></label>&nbsp;
                  <span><?php echo formatDate($courses["termino"]); ?></span>
              </div>
          </div>
        </div>
        <!-- Coluna 2 -->
        <div class="col">
            <div class="col-md-12">
                <label><b>Compentências aprendidas no curso: </b></label>
                <span><?php echo htmlspecialchars( $courses["compentencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </div>
        </div>
    </div>
    </div>
    <div class="card-footer">
          <a class="btn btn-danger float-left" href="/user/other_courses" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
        <div class="float-right">
            <a class="btn btn-primary" href="/user/<?php echo htmlspecialchars( $courses["id_cursos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/other_courses/update" title="Editar"> Editar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
        </div>
    </div>
</div>
</div>
<?php require $this->checkTemplate("footer");?>