<?php if(!class_exists('Rain\Tpl')){exit;}?><nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
    <a class="brand col-md-3 col-lg-2 mr-0 px-3" href="/user">
        <?php if( getPhotoUser() != NULL ){ ?>

        <img class="img_brand" src="<?php echo getPhotoUser(); ?>" alt="Photo">
        <?php }else{ ?>

        <img class="img_brand" src="/views/assets/images/user/user.png"  alt="Photo">
        <?php } ?>

        <?php echo getNameUser(); ?>

    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-auto">
        <li class="nav-item">
            <a class="nav-link active" href="/user/start">
                <img src="/views/assets/images/logo_brand.png" alt="Brand">
            </a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="btn link_btn btn-danger" data-toggle="modal" data-target="#ModalSair" href="">
                <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span>&nbsp; <b>Sair</b></span>
            </a>
        </li>
    </ul>
</nav>
<?php if( checkCurriculum() ){ ?>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/user/dashboard">
                            <i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>
                            <span>&nbsp; Area de Trabalho</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/formation/update">
                            <i class="fa fa-graduation-cap fa-fw" aria-hidden="true"></i>
                            <span>&nbsp; Formação Acadêmica</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/other_courses">
                            <i class="fa fa-book fa-fw" aria-hidden="true"></i>
                            <span>&nbsp; Outros Cursos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/languages">
                            <i class="fa fa-language fa-fw" aria-hidden="true"></i>
                            <span>&nbsp; Idiomas</span>
                        </a>
                    </li>
                    <?php if( existDeficiency() ){ ?>

                    <li class="nav-item">
                        <a class="nav-link" href="/user/deficiency/update">
                            <i class="fa fa-wheelchair fa-fw" aria-hidden="true"></i>
                            <span>&nbsp; Deficiência</span>
                        </a>
                    </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="/user/professional_experience">
                            <i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i>
                            <span>&nbsp; Experiencia Profissional</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/password/update">
                            <i class="fa fa-unlock fa-fw" aria-hidden="true"></i>
                            <span>&nbsp; Alterar Senha</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#ModalSair" href="">
                            <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span>&nbsp; <b>Sair</b></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php } ?>

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
