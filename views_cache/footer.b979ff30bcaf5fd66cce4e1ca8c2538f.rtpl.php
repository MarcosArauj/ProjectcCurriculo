<?php if(!class_exists('Rain\Tpl')){exit;}?><footer class="web_footer mt-auto">
    <p class="brand"><strong> <?php echo site("name_complete"); ?></strong> Todos os direitos reservados. </p>
    <p>
        <a class="link_footer" href="/">Ínicio</a>
        <span class="offset-1"></span>
        <a class="link_footer" href="#">Sobre nós</a>
        <span class="offset-1"></span>
        <a class="link_footer" href="#">Contato</a>
    </p>
    <p class="text-muted"><b>Versão</b> <?php echo site("version"); ?>,  &copy; <?php echo site("name_complete"); ?> <?php echo date('Y'); ?></p>
</footer>

<script  src=<?php echo asset("js/scripts.min.js"); ?> > </script>
<script  src=<?php echo asset("bootstrap4/dist/js/bootstrap.min.js"); ?> > </script>
<script  src=<?php echo asset("js/form.js"); ?> > </script>

</body>
</html>