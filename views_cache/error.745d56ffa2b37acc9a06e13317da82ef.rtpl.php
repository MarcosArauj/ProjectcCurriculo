<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo site("name"); ?> | Erro <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
    <!--Icone-->
    <link rel="shortcut icon" href=<?php echo asset("images/wc.ico"); ?> />
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href=<?php echo asset("bootstrap4/dist/css/bootstrap.min.css"); ?> />
    <!-- Style-->
    <link rel="stylesheet" href=<?php echo asset("css/style.min.css"); ?> />
    <!-- Ionicons -->
    <link rel="stylesheet" href=<?php echo asset("font-awesome-4.7.0/css/font-awesome.min.css"); ?> />
</head>
<body style="background-color: #ccdddd;">

<main role="main">
    <section class="section-forget">
        <div class="form-content">
            <div class="alert alert-danger">
                <div class="page_error">

                    <h1 style="text-align: center">Ooooops Error <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>! :(</h1>
                    <p><b>Desculpe pelo incomodo, Caso o problema prescista <br> entre em contato com nosso Suporte!
                    </b></p>
                    <p><a class="btn btn-danger" href="/" title="Registrar"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar ao Ínicio</a></p>

                </div>
            </div>
        </div>
        </div>
    </section>
    <span  class="alert_message">  <?php echo flash(); ?></span>
</main>

</body>
</html>