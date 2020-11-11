<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <section class="container col-md-12">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Solicitações</h4>
        </div>
        <div class="alert_message">
            <?php echo flash(); ?>
        </div>
        <?php if( $requests ){ ?>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Assunto</th>
                        <th>Situação</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter1=-1;  if( isset($requests) && ( is_array($requests) || $requests instanceof Traversable ) && sizeof($requests) ) foreach( $requests as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td><?php echo htmlspecialchars( $value1["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["assunto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["situacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                <?php if( daysDates($value1["dtregistro"]) == 2 && $value1["situacao"] == 'pendente' ){ ?>
                                <b style="color: orange"> Atenção!! Solicitação vence Hoje!</b>
                                <?php }elseif( daysDates($value1["dtregistro"]) > 2 && $value1["situacao"] == 'pendente' ){ ?>
                                   <b style="color: red"> SOLICITAÇÃO VENCIDA A <?php echo daysDates($value1["dtregistro"]); ?> DIAS!!!</b>
                                <?php } ?>
                            </td>
                            <td class="float-right">
                                <a href="/admin/<?php echo htmlspecialchars( $value1["id_solicitacoes"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/requests/detail" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> Detalhar</a>
                            </td>
                        </tr>
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
    </section>
</main>
<?php require $this->checkTemplate("footer");?>




