<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Lista de Idiomas -->
<?php if( $languages ){ ?>

<div class="card border-success">
<table class="table table-striped border-success">
        <thead>
        <tr>
            <th>Idiomas</th>
            <th>Nível de Conhecimento</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter1=-1;  if( isset($languages) && ( is_array($languages) || $languages instanceof Traversable ) && sizeof($languages) ) foreach( $languages as $key1 => $value1 ){ $counter1++; ?>

        <tr>
            <td><?php echo htmlspecialchars( $value1["idioma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["nivel_conhecimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td class="float-right">
                <a href="/user/<?php echo htmlspecialchars( $value1["id_idiomac"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/languages/update" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
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
        <?php } ?>

        </tbody>
    </table>
</div>
<?php }else{ ?>

<div  class="alert alert-danger">
    <h5>Nenhum idioma cadastrato</h5>
</div>
<?php } ?>