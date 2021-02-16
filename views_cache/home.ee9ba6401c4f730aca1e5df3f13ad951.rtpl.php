<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar_home");?>
<main id="home" role="main">
    <section class="section-banner">
        <img src="/views/assets/images/fundo_home.jpg" class="banner-img" alt="main-banner">
        <div class="banner-text">
            <div class="banner-group-1">
                <h1 class="banner-title"> <b>SUAS COMPETÊNCIAS EM UM CLIQUE</b></h1>
            </div>
            <div class="banner-group-2">
                <h3 class="banner-subtitle"><b>Crie seu Currículo de Uma Forma simples e rápida!</b></h3>
                <p><a  class="link_start link_btn" href="/register" title="COMEÇAR">COMEÇAR</a></p>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="/tutorial" class="link_options">
                <svg width="140" height="140"><img src="/views/assets/images/check.png"  width="80" height="80"alt="Check"></svg>
                <h2 class="text-center">Facilidade</h2>
                </a>
                <p class="text_home">Cadastro rápido! Em poucos cliques<br>
                    o seu currículo pronto.<br>
                    Aprenda com Usar</p>
            </div>
            <div class="col-lg-4">
                <a href="/search/curriculum" class="link_options">
                    <svg width="140" height="140"><img src="/views/assets/images/search.png"  width="80" height="80"alt="Search"></svg>
                    <h2 class="text-center">Buscar Curriculos</h2>
                </a>
                <p class="text_home">Empresario, encontre seu funcionário <br> aqui. Busque por currículos</p>
            </div>
            <div class="col-lg-4">
                <a href="/support/solicitation_create" class="link_options">
                <svg width="140" height="140"><img src="/views/assets/images/support.png"  width="80" height="80"alt="Support"></svg>
                <h2 class="text-center">Suporte</h2>
                </a>
                <p class="text_home">Suporte rápido e confiável para <br>resolver problemas e dúvidas <br> sobre o sistema</p>
            </div>
        </div>
    </section>
    <section>
        <div id="oque" class="jumbotron">
            <div class="container">
            <h1><u>O que é o <?php echo site("name_complete"); ?>?</u></h1><br>
            <p>
                Web Curriculo é um sistema de gerenciamento e compartilhamento de curriculos.<br>
                Para quem buscar se colocar no mercado de trabalho. Terá seu curriculo pronto para compartinhar com quem desejar de forma rápida e fácil.<br>
                Para que busca um profissional, em poucos clique encontrará o funcionário que deseja.<br>
            </p>
            </div>
        </div>
    </section>
    <section id="usar">
        <div class="container">
            <h1><u>Como funciona?</u></h1>
            <hr class="my-5">
            <div style="text-align: center">
            <img id="fluxo" src="/views/assets/images/fluxo.png" alt="Fluxo">
            </div>
        </div>
    </section>
    <br>
    <span  class="alert_message">  <?php echo flash(); ?></span>
</main>
<footer class="footer mt-auto py-3 bg-dark text-center">

    <p class="brand"><strong> <?php echo site("name_complete"); ?></strong> Todos os direitos reservados. </p>
    <p>
        <a class="link_footer" href="/">Ínicio</a>
        <span class="offset-1"></span>
        <a class="link_footer"  data-toggle="modal" data-target="#ModalContato" href="">Contato</a>
    </p>
    <p class="text-muted"><b>Versão</b> <?php echo site("version"); ?>,  &copy; <?php echo site("name_complete"); ?> <?php echo date('Y'); ?></p>
</footer>
<!-- Modal Compartilhamento de Link do Curriculo -->
<div class="modal fade" id="ModalContato" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4><b>Nossos Contatos</b></h4>
            </div>
            <div class="modal-body">
                <p><b>E-mail:</b> webcurriculo.support@cruzm.com.br</p>
                <p><b>Telefones:</b> (34)98428-9394</p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php require $this->checkTemplate("footer");?>
