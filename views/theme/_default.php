<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $head; ?>
    <!--Icone-->
    <link rel="shortcut icon" href="<?= asset("images/wc.ico");?>" />
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="<?= asset("bootstrap4/dist/css/bootstrap.min.css");?>" />
    <!-- Style-->
    <link rel="stylesheet" href="<?= asset("css/style.min.css");?>" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= asset("font-awesome-4.7.0/css/font-awesome.min.css");?>" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="<?= asset("js/mascara.js");?>" > </script>

</head>
<body>
<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <div class="ajax_load_box_title">Aguarde, carrengando...</div>
    </div>
</div>

<?= $v->section("content"); ?>

<footer class="my-5 pt-5 text-muted text-center text-small">

    <p><strong>Copyright &copy; <?= date('Y');?> </strong> All rights
        reserved.</p>
    <p><b>Version</b> <?= site("version");?></p>
</footer>
</main>

<script src="<?= asset("js/scripts.min.js"); ?>"></script>
<script  src="<?= asset("bootstrap4/dist/js/bootstrap.min.js"); ?>" > </script>
<script src="<?= asset("js/form.js"); ?>"></script>

<?= $v->section("scripts"); ?>


</body>
</html>
