<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="alert alert-primary" role="alert">

    <div style="text-align: center">

        <h2><?php echo site("desc"); ?></h2>
        <p class="alert_message"> <?php echo flash(); ?></p>
        <form class="form" action="/curriculum/curriculum/create" method="post" autocomplete="off">
        <p><button class="btn btn-md btn-success"><i class="fa fa-check" aria-hidden="true"></i>  Finalizar Curriculo</button></p>&nbsp;
        </form>
    </div>

</div>
