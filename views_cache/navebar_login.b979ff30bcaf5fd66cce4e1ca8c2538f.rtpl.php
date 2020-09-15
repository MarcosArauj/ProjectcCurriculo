<?php if(!class_exists('Rain\Tpl')){exit;}?><header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="brand" href="/"><?php echo site("name_complete"); ?></a>
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav mr-auto link_navebar">
                <li class="nav-item">
                    <a class="nav-link" href="/">Início</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a  class="btn link_btn link_register" href="/register" title="Registre-se aqui">&nbsp;&nbsp;Registre-se aqui :)&nbsp;&nbsp;</a>
            </div>
        </div>
    </nav>
</header>