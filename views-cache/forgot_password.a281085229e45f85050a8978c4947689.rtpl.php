<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id="titulo_home">
            <a href="/">
                <b><?php echo site("name"); ?> - <?php echo site("desc"); ?></b>
            </a>
        </h1>
    </div>
</section>

<section class="container col-md-4">
    <div class="alert_message">
        <?php echo flash(); ?>
    </div>

    <form class="form" action="/forgot" method="post" autocomplete="off">
        <div class="card border-success ">
            <div class="card-header text-success text-left">
                <h5><strong>Esqueceu a Senha?</strong></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div id="email" class="form-group col-md-12">
                                <label for="email">
                                    <strong id="mesmeail" class="error-disabled" >E-mail inválido!!!</strong>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >@</span>
                                    </div>
                                    <input type="email" class="form-control " placeholder="Ex: exemplo@exemplo.com"  id="campo_email" name="email" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <button class="btn btn-block btn-success">&nbsp;&nbsp;Recuperar minha Senha&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary float-right" href="/login" title="Login"><strong>Voltar ao Login</strong> </a>
            </div>

        </div>
    </form>
</section>

</div>
