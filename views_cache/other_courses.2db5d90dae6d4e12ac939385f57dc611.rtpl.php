<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navbar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<section class="container col-md-8">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Outros Cursos</h4>
    </div>
<div class="alert_message">
    <?php echo flash(); ?>

</div>

<div class="card border-success">
    <div class="row">
        <div class="col">
            <?php require $this->checkTemplate("table_other_courses");?>

            <div class="card-footer">
                <?php if( checkCurriculum() ){ ?>

                <a class="btn btn-danger" href="/user" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                <?php }else{ ?>

                <a class="btn btn-danger" href="/other_courses/create" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                <?php } ?>

                <div class="float-right">
                    <a class="btn btn-primary" href="/user/other_courses/create" title="Adicionar Curso"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Novo Curso </a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</main>
<?php require $this->checkTemplate("footer");?>





