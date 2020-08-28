<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navebar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 text-center">
        <h2><?php echo site("desc"); ?></h2>
        <p class="alert_message"> <?php echo flash(); ?></p>
        <form class="form" action="/curriculum/curriculum/create" method="post" autocomplete="off">
        <p><button class="btn btn-md btn-success"><i class="fa fa-check" aria-hidden="true"></i>  Finalizar Curriculo</button></p>&nbsp;
        </form>
<?php require $this->checkTemplate("footer");?>