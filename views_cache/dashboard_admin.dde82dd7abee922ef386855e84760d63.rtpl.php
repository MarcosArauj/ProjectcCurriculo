<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar");?>
<main role="main">
    <div class="dashboard-text">
        <div class="container col-md-8">
            <span  class="alert_message">  <?php echo flash(); ?></span>
            <h1><?php echo site("desc"); ?></h1>
            <h3>Olá -  <?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $user["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
            <br>
        </div>
    </div>

</main>
<?php require $this->checkTemplate("footer");?>
