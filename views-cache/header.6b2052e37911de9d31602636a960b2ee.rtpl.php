<?php if(!class_exists('Rain\Tpl')){exit;}?><head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo site("name"); ?> <?php echo getNameUser(); ?></title>
    <!--Icone-->
    <link rel="shortcut icon" href=<?php echo asset("images/wc.ico"); ?> />
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href=<?php echo asset("bootstrap4/dist/css/bootstrap.min.css"); ?> />
    <!-- Style-->
    <link rel="stylesheet" href=<?php echo asset("css/style.min.css"); ?> />
    <!-- Ionicons -->
    <link rel="stylesheet" href=<?php echo asset("font-awesome-4.7.0/css/font-awesome.min.css"); ?> />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src=<?php echo asset("js/mascara.js"); ?> > </script>



    </head>
    <body>
    <div class="ajax_load">
        <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <div class="ajax_load_box_title">Aguarde, carrengando...</div>
    </div>
    </div>
    <main class="container-fluid">