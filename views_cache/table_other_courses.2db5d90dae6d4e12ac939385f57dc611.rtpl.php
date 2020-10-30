<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $courses ){ ?>

<div class="card-body">
<table class="table table-striped">
        <thead>
        <tr>
            <th >Cursos</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter1=-1;  if( isset($courses) && ( is_array($courses) || $courses instanceof Traversable ) && sizeof($courses) ) foreach( $courses as $key1 => $value1 ){ $counter1++; ?>

        <tr>
            <td><?php echo htmlspecialchars( $value1["nome_curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td class="float-right">
                <a href="/user/<?php echo htmlspecialchars( $value1["id_cursos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/other_courses/detail" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> Detalhar</a>
                <a href="/user/<?php echo htmlspecialchars( $value1["id_cursos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/other_courses/update" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalExcluir" href=""><i class="fa fa-trash"></i> Excluir</a>
                <!-- Modal Excluir -->
                <div class="modal fade" id="ModalExcluir" role="dialog">
                    <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <p><b>Deseja realmente excluir este Curso?</b></p>
                            </div>
                            <div class="modal-footer">
                                <form class="form" action="/curriculum/<?php echo htmlspecialchars( $value1["id_cursos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/other_courses/delete" method="post">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sim</button>
                                </form>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<?php }else{ ?>

<div  class="text-center text-danger">
    <h2>Nenhum curso cadastrato</h2>
</div>
<?php } ?>

