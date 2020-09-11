<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="brand" href="/"><?php echo site("name_complete"); ?></a>
        <span class="offset-7"></span>
        <ul class="navbar-nav mr-auto link_navebar">
            <li class="nav-item">
                <a class="nav-link" href="#oque">O que é?</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#usar">Como Usar?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Suporte</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <a id="link_login" class="btn btn-primary" href="/login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Login&nbsp;&nbsp;</a>
        </div>
    </div>
    </div>

</nav>
<main id="home" role="main">

    <div id="fundo_home" class="home">
        <h1 class="text-muted"> <b>SUAS COMPETÊNCIAS EM UM CLIQUE</b></h1>
        <br>
        <h3 class="text-muted"><b>Crie seu Currículo de Uma Forma simples e rápida!</b></h3>
        <div style="line-height: 270px">
         <p><a  id="link_register" href="/register" title="COMEÇAR">COMEÇAR</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <svg width="140" height="140"><img src="/views/assets/images/check.png"  width="100" height="100"alt="Support"></svg>
                <h2 class="text-center">Facilidade</h2>
                <p class="text_home">Cadastro rápido! Em poucos cliques<br>
                    você terá seu currículo pronto<br>
                    para trabalho</p>
            </div>
            <div class="col-lg-4">
                <svg width="140" height="140"><img src="/views/assets/images/list.png"  width="100" height="100"alt="Support"></svg>
                <h2 class="text-center">Informações</h2>
                <p class="text_home">As informações do seu currículo todas <br> em um clique</p>
            </div>
            <div class="col-lg-4">
                <svg width="140" height="140"><img src="/views/assets/images/support.png"  width="100" height="100"alt="Support"></svg>
                <h2 class="text-center">Buscar Curriculos</h2>
                <p class="text_home">Empresario, encontre seu funcionário <br> aqui. Busque por currículos</p>
            </div>
        </div>
    </div>
    <div>
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
    </div>
    <div id="usar">
        <div class="container">
            <h1><u>Como funciona?</u></h1>
            <hr class="my-5">
            <div style="text-align: center">
            <img id="fluxo" src="/views/assets/images/fluxo.png" alt="Fluxo">
            </div>
        </div>
    </div>
</main>
<footer class="container_footer bg-dark">
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
