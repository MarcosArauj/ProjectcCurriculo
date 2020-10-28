<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Lista de Usuario -->
<?php if( $users ){ ?>

<div class="card">
<div class="card-body">
<table class="table table-striped border-success">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Naturalidade</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>

        <form class="form" action="/admin/userResetPassword/<?php echo htmlspecialchars( $value1["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" autocomplete="off">
        <tr>
            <td><?php echo htmlspecialchars( $value1["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["genero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["uf_naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td class="float-right">
                <a href="/admin/<?php echo htmlspecialchars( $value1["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/detail" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> Detalhar</a>
                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Resetar Senha</button>
                <input type="hidden" name="email" value="<?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalExcluir" href=""><i class="fa fa-trash"></i> Excluir</a>
                <!-- Modal Excluir -->
                <div class="modal fade" id="ModalExcluir" role="dialog">
                    <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <p><b>Deseja realmente excluir este Idioma?</b></p>
                            </div>
                            <div class="modal-footer">
                                <a href="/curriculum/<?php echo htmlspecialchars( $value1["id_idiomac"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/languages/delete"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sim</a>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        </form>
        <?php } ?>

        </tbody>
    </table>
</div>
<div class="card-footer">
    <ul class="pagination justify-content-end">
        <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

        <li  class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>

    </ul>
</div>
</div>
<?php } ?>