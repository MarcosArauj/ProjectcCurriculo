<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id="titulo_home">
            <a href="/">
                <b><?php echo site("name"); ?> - <?php echo site("desc"); ?></b>
            </a>
        </h1>
    </div>
</section>

<section class="container col-md-6">
    <div class="alert_message">
        <?php echo flash(); ?>
    </div>
    <div class="alert alert-success">
        <h4 class="alert-heading">E-mail enviado!</h4>
        <p>Verifique seu e-mail e siga as instruções para recuperar a sua senha. Verifique também a caixa de Span.</p><br>
        <a class="btn btn-primary" href="/login" title="Login"><strong>Voltar ao Login</strong> </a>
        <div class="float-right">
            <a class="btn cor_windows" href="https://outlook.live.com/owa/" target="_blank">
                <span class="fa fa-windows"></span>
            </a>
            <a class="btn cor_google" href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" target="_blank">
                <span class="fa fa-google"></span>
            </a>
            <a class="btn cor_yahoo" style="" href="https://login.yahoo.com/" target="_blank">
                <span class="fa fa-yahoo"></span>
            </a>
        </div>
    </div>
</section>


