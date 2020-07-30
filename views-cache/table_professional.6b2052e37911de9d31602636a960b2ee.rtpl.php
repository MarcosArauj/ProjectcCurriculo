<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $professional ){ ?>

<table class="table table-striped border-success">
        <thead>
        <tr>
            <th>Cargo</th>
            <th>Empresa</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter1=-1;  if( isset($professional) && ( is_array($professional) || $professional instanceof Traversable ) && sizeof($professional) ) foreach( $professional as $key1 => $value1 ){ $counter1++; ?>

        <tr>
            <?php if( $value1["registro"] == 'ativo' ){ ?>

            <td><?php echo htmlspecialchars( $value1["cargo_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["empresa_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="color: #00cc00;"> <b>Emprego Atual</b> </td>
            <?php }else{ ?>

            <td><?php echo htmlspecialchars( $value1["cargo_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["empresa_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td></td>
            <?php } ?>

            <td class="float-right">
                <a href="/user/<?php echo htmlspecialchars( $value1["id_profissional"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/professional_experience/detail" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> Detalhar</a>
                <a href="/user/<?php echo htmlspecialchars( $value1["id_profissional"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/professional_experience/update" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalExcluir" href=""><i class="fa fa-trash"></i> Excluir</a>
                <!-- Modal Excluir -->
                <div class="modal fade" id="ModalExcluir" role="dialog">
                    <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <p><b>Deseja realmente excluir esta Experiência Profissional?</b></p>
                            </div>
                            <div class="modal-footer">
                                <a href="/curriculum/<?php echo htmlspecialchars( $value1["id_profissional"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/professional_experience/delete"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sim</a>
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
<?php }else{ ?>

<div  class="alert alert-danger">
    <h5>Nenhum idioma cadastrato</h5>
</div>
<?php } ?>