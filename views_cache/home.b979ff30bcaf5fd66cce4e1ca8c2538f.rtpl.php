<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navebar_home");?>
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
                <a href="" class="link_options">
                <svg width="140" height="140"><img src="/views/assets/images/check.png"  width="80" height="80"alt="Support"></svg>
                <h2 class="text-center">Facilidade</h2>
                </a>
                <p class="text_home">Cadastro rápido! Em poucos cliques<br>
                    você terá seu currículo pronto<br>
                    para trabalho</p>
            </div>
            <div class="col-lg-4">
                <a href="" class="link_options">
                <svg width="140" height="140"><img src="/views/assets/images/list.png"  width="80" height="80"alt="Support"></svg>
                <h2 class="text-center">Informações</h2>
                </a>
                <p class="text_home">As informações do seu currículo todas <br> em um clique</p>
            </div>
            <div class="col-lg-4">
                <a href="" class="link_options">
                <svg width="140" height="140"><img src="/views/assets/images/support.png"  width="80" height="80"alt="Support"></svg>
                <h2 class="text-center">Buscar Curriculos</h2>
                </a>
                <p class="text_home">Empresario, encontre seu funcionário <br> aqui. Busque por currículos</p>
            </div>
        </div>
    </section>
    <section>
        <div id="oque" class="jumbotron">
            <div class="container">
            <h1><u>O que é o <?php echo site("name_complete"); ?>?</u></h1>
            <p>
                Mussum Ipsum, cacilds vidis litro abertis. Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.<br>
                Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Tá deprimidis, eu conheço uma cachacis que pode alegrar sua vidis. <br>
                Viva Forevis aptent taciti sociosqu ad litora torquent. Mussum Ipsum, cacilds vidis litro abertis. Nec orci ornare consequat. Praesent<br>
                lacinia ultrices consectetur. Sed non ipsum felis. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Tá deprimidis, eu conheço <br>
                uma cachacis que pode alegrar sua vidis. Viva Forevis aptent taciti sociosqu ad litora torquent.
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
        <a class="link_footer" href="#">Sobre nós</a>
        <span class="offset-1"></span>
        <a class="link_footer" href="#">Contato</a>
    </p>
    <p class="text-muted"><b>Versão</b> <?php echo site("version"); ?>,  &copy; <?php echo site("name_complete"); ?> <?php echo date('Y'); ?></p>
</footer>
<?php require $this->checkTemplate("footer");?>
