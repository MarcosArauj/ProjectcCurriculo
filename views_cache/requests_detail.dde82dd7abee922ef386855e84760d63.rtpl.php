<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar");?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<section class="container col-md-8">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Solicitação</h4>
    </div>
    <div class="alert_message">
        <?php echo flash(); ?>
    </div>
    <div class="card" style="color: black;">
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <div class="row">
                        <div class="form-inline col-md-7">
                            <label><b>Usuário solicitante: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $solicitacao["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $solicitacao["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <div class="form-inline col-md-5">
                            <label><b>Data da Solicitação: </b></label>&nbsp;
                            <span><?php echo formatDate('$solicitacao.dtregistro'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-inline col-md-7">
                            <label><b>Assunto: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $solicitacao["assunto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                        <div class="form-inline col-md-5">
                            <label><b>Situação: </b></label>&nbsp;
                            <span><?php echo htmlspecialchars( $solicitacao["situacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label><b>Detalhes da Solicitação: </b></label><br>
                            <span><?php echo htmlspecialchars( $solicitacao["descricao_solicitacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form class="form" action="/admin/<?php echo htmlspecialchars( $solicitacao["id_solicitacoes"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/requests/finish" method="post" autocomplete="off">
            <a class="btn btn-danger float-left" href="/admin/requests" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
            <div class="float-right">
                <button class="btn btn-md btn-success">
                    <?php if( $solicitacao["situacao"] == 'pendente' ){ ?>
                    Finalizar Solicitação &nbsp;&nbsp;
                    <?php }else{ ?>
                    Abrir Solicitação &nbsp;&nbsp;
                    <?php } ?>
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                </button>
            </div>
        </form>
        </div>
    </div>
</section>
</main>
<?php require $this->checkTemplate("footer");?>




