<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main">
        <section class="section-dashboard">
             <div class="dashboard-text">
                <h2><?php echo site("desc"); ?></h2>
                <form class="form" action="/curriculum/curriculum/create" method="post" autocomplete="off">
                        <p><button class="btn btn-md btn-success hover"><i class="fa fa-check" aria-hidden="true"></i>  Finalizar Curriculo</button></p>&nbsp;
                </form>
            </div>
        </section>
        <span  class="alert_message">  <?php echo flash(); ?></span>
</main>
<?php require $this->checkTemplate("footer");?>