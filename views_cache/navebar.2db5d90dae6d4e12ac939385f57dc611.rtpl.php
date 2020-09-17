<?php if(!class_exists('Rain\Tpl')){exit;}?><header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="brand" href="/user">
        <?php if( getPhotoUser() != NULL ){ ?>

        <img class="img_brand" src="<?php echo getPhotoUser(); ?>" alt="Photo">
        <?php }else{ ?>

        <img class="img_brand" src="/views/assets/images/user/user.png"  alt="Photo">
        <?php } ?>

        <?php echo getNameUser(); ?>

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <br>

        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav mr-auto link_navebar">
            <li class="nav-item ">
                <a class="nav-link" href="/user/start"><img src="/views/assets/images/logo_brand.png" alt=""></a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <a class="btn btn-danger link_btn" data-toggle="modal" data-target="#ModalSair" href=""><b><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</b></a>
        </div>
    </div>
</nav>
<?php if( checkCurriculum() ){ ?>

    <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/user/formation/update">
                        <span> Formação Acadêmica </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/other_courses">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span> Outros Cursos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/languages">
                        <span> Idiomas </span>
                    </a>
                </li>
                <?php if( existDeficiency() ){ ?>

                <li class="nav-item">
                    <a class="nav-link" href="/user/deficiency/update">
                        <span> Deficiência </span>
                    </a>
                </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="/user/professional_experience">
                        <span> Experiencia Profissional </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/password/update">
                        <span> Alterar Senha</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    </div>
<?php } ?>

</header>

    <!-- Modal Sair -->
    <div class="modal fade" id="ModalSair" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="titulo_home"><b><?php echo site("name"); ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p><b><?php echo getNameUser(); ?>, certeza que deseja sair do Sistema?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <a href="/user/logout" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i><strong> Sair</strong></a>
                </div>
            </div>
        </div>
    </div>
