<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navbar");?>

<main role="main">
        <div class="dashboard-text">
             <div class="container col-md-8">
                 <span  class="alert_message">  <?php echo flash(); ?></span>
                <h2><?php echo site("desc"); ?></h2>
                 <h4>Finalize seu Curriculo!</h4>
                <form class="form" action="/curriculum/curriculum/create" method="post" autocomplete="off">
                    <p>
                    <a class="btn btn-danger begin" href="/user/professional_experience/create" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                    <button class="btn btn-success begin"><i class="fa fa-check" aria-hidden="true"></i>  Finalizar</button></p>&nbsp;
                </form>
            </div>
        </div>
</main>
<?php require $this->checkTemplate("footer");?>