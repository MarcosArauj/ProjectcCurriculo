<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <h4 style="text-align: center">
        Registro de Curriculo  de <?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </h4>

</section>

<section class="container-fluid col-md-8">
    <div class="alert">
        <?php echo flash(); ?>
    </div>
    <form class="form" action="/curriculum/other_courses" method="post" autocomplete="off">
    <div  class="card border-success">
        <div class="card-header text-success">
            <h4>Outros Cursos</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome_curso"><strong class="obrigatorio">*</strong><b>Curso</b></label>
                            <input type="text" class="form-control form-control-sm" id="nome_curso" name="nome_curso" placeholder="Ex: Nome do Curso" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="carga_horaria"><strong class="obrigatorio">*</strong><b>Carga Horária</b></label>
                            <input type="text" class="form-control form-control-sm" id="carga_horaria" name="carga_horaria" placeholder="Ex: 2010"  onkeypress="formatar('#####',this)"  maxlength="4">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="termino"><strong class="obrigatorio">*</strong><b>Conclusão</b></label>
                            <input type="date" class="form-control form-control-sm" id="termino" name="termino" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="instituicao"><strong class="obrigatorio">*</strong><b>Instituição de Ensino</b></label>
                            <input type="text" class="form-control form-control-sm" id="instituicao" name="instituicao" placeholder="Ex: Instituição de Ensino">
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <div class="card-footer">
              <a class="btn btn-danger float-left" href="/user/formation" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a></p>
            <div class="float-right">
               <button class="btn btn-md btn-success">Adionar Curso</button>
               <a class="btn btn-primary" href="#" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a></p>
            </div>
        </div>

    </div>
    </form>

    <!-- Lista de Cursos -->
        <?php if( $courses ){ ?>
        <div  class="card border-success">
        <table class="table table-striped border-success">
            <thead>
                <tr>
                    <th style="width: 260px">Curso</th>
                    <th>Carga Horária</th>
                    <th>Término</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter1=-1;  if( isset($courses) && ( is_array($courses) || $courses instanceof Traversable ) && sizeof($courses) ) foreach( $courses as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                    <td><?php echo htmlspecialchars( $value1["nome_curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["carga_horaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>:00 Horas</td>
                    <td><?php echo formatDate($value1["termino"]); ?></td>
                    <td class="float-right">
                        <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> Detalhar</a>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        <?php }else{ ?>
        <div  class="alert alert-danger">
            <h5>Nenhum curso cadastrato</h5>
        </div>
        <?php } ?>

</section>

</div>

