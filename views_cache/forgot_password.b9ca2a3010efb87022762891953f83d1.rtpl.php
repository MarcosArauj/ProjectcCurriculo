<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<?php require $this->checkTemplate("navbar_forgot");?>

<main role="main" id="fundo_login">
    <section class="container col-md-4" style="top: 30%">
        <div class="alert_message">
            <?php echo flash(); ?>

        </div>
        <div  class="card bg-dark" style="color: white">
            <div class="card-body">
                <div class="card-header-forgot">
                    <span class="card-title">Esqueceu sua Senha?</span>
                </div>
                <br>
                <form class="form" action="/forgot" method="post" autocomplete="off">
                    <div id="email" class="form-group">
                        <label for="email"><strong id="mesmeail" class="error-disabled"><span class="h6">E-mail inválido!!!</span></strong></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >@</span>
                            </div>
                            <input type="email" class="form-control " placeholder="Ex: exemplo@exemplo.com"  id="campo_email" name="email" autofocus>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success">&nbsp;&nbsp;Recuperar minha Senha&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</main>

<?php require $this->checkTemplate("footer");?>


