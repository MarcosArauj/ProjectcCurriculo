<?php if(!class_exists('Rain\Tpl')){exit;}?><nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/user/start"><?php echo site("name_complete"); ?></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" data-toggle="modal" data-target="#ModalSair" href=""><b><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</b></a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
               <?php if( checkCurriculum() ){ ?>

                <li class="nav-item">
                    <a class="nav-link active" href="/user">
                        <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                        Inicio - <?php echo getNameUser(); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/formation/update">
                        <span> Formação Acadêmica </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/other_courses">
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
                <?php } ?>

            </ul>
        </div>
    </nav>

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
