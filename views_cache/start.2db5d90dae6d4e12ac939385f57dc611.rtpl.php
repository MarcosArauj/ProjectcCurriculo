<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<main role="main">
    <section class="section-dashboard">
        <div class="dashboard-text">

            <h2>Seja muito bem vindo(a)!</h2>
            <h1><?php echo site("desc"); ?></h1>
            <br>
            <h4>Vamos iniciar o cadastro do seu Curriculo!</h4>
            <br>
            <p> <a class="btn btn-danger begin" href="/user/logout" title="Voltar"><i class="fa fa-arrow-left" aria-hidden="true"></i> Sair </a>
                <a class="btn btn-primary begin" href="/user/personal_data/create" title="Iniciar">Iniciar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </p>
        </div>
    </section>
    <span  class="alert_message">  <?php echo flash(); ?></span>
</main>
<?php require $this->checkTemplate("footer");?>