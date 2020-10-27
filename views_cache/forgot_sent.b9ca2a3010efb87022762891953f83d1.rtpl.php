<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<main role="main" id="fundo_login">
    <section class="container col-md-6" style="top: 30%">
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
</main>
<?php require $this->checkTemplate("footer");?>


