<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<main role="main">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-3">
        <h2 id="titulo_home" class="text-center">Suporte - <?php echo site('name_complete'); ?></h2>
    </div>
    <section class="container col-md-6" style="top: 40%; text-align: center">
        <div class="alert alert-success">
            <h4 class="alert-heading">Solicitação enviada Com Sucesso!</h4>
            <h5><b>Você terá retorno em Até 2 dias.</b></h5>
            <a class="btn btn-danger" href="/" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar ao início</a>
        </div>
    </section>
</main>
<?php require $this->checkTemplate("footer");?>

