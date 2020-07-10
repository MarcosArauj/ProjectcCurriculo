<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>
<main role="main" class="col-md-7 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Registro - Idiomas <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

<div class="alert">
    <?php echo flash(); ?>
</div>
<form class="form" action="/curriculum/languages" method="post" autocomplete="off">
    <div  class="card border-success">
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="idioma"><strong class="obrigatorio">*</strong><b>Idioma</b></label>
                            <input type="text" class="form-control form-control-sm" id="idioma" name="idioma" placeholder="Ex:Idioma" >
                        </div>
                        <div class="form-group col-md-3">
                            <label  for="nivel"><strong class="obrigatorio">*</strong><b>Nivél de Conhecimento</b></label>
                            <select class="form-control form-control-sm" name="nivel_conhecimento" id="nivel" >
                                <option value="">Selecione</option>
                                <option value="iniciante">Iniciante</option>
                                <option value="basico">Básico</option>
                                <option value="elementar">Elementar</option>
                                <option value="intermediario">Intermediário</option>
                                <option value="avancado">Avançado</option>
                                <option value="fluente">Fluente</option>
                                <option value="academico">Acadêmico</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="col-md-12">
                            <div class="success-enabled" >

                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <div class="card-footer">
              <a class="btn btn-danger float-left" href="/user/other_courses" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a>
            <div class="float-right">
               <button class="btn btn-md btn-success">Adionar Curso</button>
               <a class="btn btn-primary" href="#" title="Próximo"> Próximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
            </div>
        </div>

    </div>
</form>

    <!-- Lista de Idiomas -->
        <?php if( $languages ){ ?>
<div  class="card border-success">
<table class="table table-striped border-success">
    <thead>
        <tr>
            <th>Idiomas</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter1=-1;  if( isset($languages) && ( is_array($languages) || $languages instanceof Traversable ) && sizeof($languages) ) foreach( $languages as $key1 => $value1 ){ $counter1++; ?>
        <tr>
            <td><?php echo htmlspecialchars( $value1["idioma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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
    <h5>Nenhum idioma cadastrato</h5>
</div>
<?php } ?>



