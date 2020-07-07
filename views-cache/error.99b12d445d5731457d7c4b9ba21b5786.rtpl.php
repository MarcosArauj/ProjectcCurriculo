<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo site("name"); ?> | Erro <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href=<?php echo asset("bootstrap4/dist/css/bootstrap.min.css"); ?> />
    <!-- Style-->
    <link rel="stylesheet" href=<?php echo asset("css/style.min.css"); ?> />
    <!-- Ionicons -->
    <link rel="stylesheet" href=<?php echo asset("font-awesome-4.7.0/css/font-awesome.min.css"); ?> />
</head>
<body>

<div class="page_error">
    <h1 style="text-align: center">Ooooops Error <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>! :(</h1>
    <p><b>Desculpe pelo incomodo, Caso o problema prescista <br> entre em contato com nosso Suporte!
    </b></p>
    <p><a class="btn btn-danger" href="/" title="Registrar"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar ao Ínicio</a></p>

</div>

</body>
</html>