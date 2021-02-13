<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar_register");?>
<main role="main" style="background-color: #ccdddd;">
<section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id="titulo_home">
            <a href="/">
                <b><?php echo site("name"); ?> - <?php echo site("desc"); ?></b>
            </a>
        </h1>
    </div>
</section>
<section class="container col-md-8" >
    <div class="card" style="color: black;">
        <div class="card-body">
            <h5 class="text-center text-success">1 - Para Iniciar o seu cadastro, digite seu E-mail e crie uma senha. Clique em <b>"Criar Conta".</b></h5>
            <img src="/views/assets/images/tutorial/criar_usuario.png" class="img-fluid" alt="Cirar Usuario">
            <hr>
            <h5 class="text-center text-success">2 - Nessa tela clique em <b>"Iniciar"</b> para começar a criação do seu Curriculo ou clique em <b>"Sair"</b> para
            sair do Sistema.</h5>
            <img src="/views/assets/images/tutorial/iniciar.png" class="img-fluid" alt="Iniciar">
            <hr>
            <h5 class="text-center text-success">3 - Digite seus dados pessoais, clique em <b>"Próximo"</b> para registrar.</h5>
            <img src="/views/assets/images/tutorial/dados_pessoais.png" class="img-fluid" alt="Dados Pessoais">
            <hr>
            <h5 class="text-center text-success">4 - Digite seu endereço e contato, clique em <b>"Próximo"</b> para registrar.</h5>
            <img src="/views/assets/images/tutorial/contato.png" class="img-fluid" alt="Contato">
            <hr>
            <h5 class="text-center text-success">5 - a). Se tiver algum tipo de deficiência digite os dados, clique em <b>"Próximo"</b> para registrar.</h5>
            <img src="/views/assets/images/tutorial/deficiencia_sim.png" class="img-fluid" alt="Deficiencia Sim"><br>
            <h5 class="text-center text-success">5 - b). Se não tiver, clique em <b>"Próximo"</b> para ir a próxima tela de registro.</h5>
            <img src="/views/assets/images/tutorial/deficiencia_nao.png" class="img-fluid" alt="Deficiencia Não">
            <hr>
            <h5 class="text-center text-success">6 - Digite sua formação acadêmica, clique em <b>"Próximo"</b> para registrar.</h5>
            <img src="/views/assets/images/tutorial/formacao_academica.png" class="img-fluid" alt="Formacao Academica">
            <hr>
            <h5 class="text-center text-success">7 - Se você fez algum outro curso digite os dados, clique em <b>"Adicionar"</b> para adicionar um novo registro
                ou em <b>"Próximo"</b> para ir a próxima tela de registro. Clique em <b>"Listar"</b> para listar os cursos inseridos. </h5>
            <img src="/views/assets/images/tutorial/cursos.png" class="img-fluid" alt="Outros Cursos"><br>
            <hr>
            <h5 class="text-center text-success">8 - a). Se você fala ou tem conhecimento em algum outro idioma digite os dados, clique em <b>"Adicionar"</b>
                para adicionar um novo registro ou em <b>"Próximo"</b> para ir a próxima tela de registro. Clique em <b>"Listar"</b> para listar os idiomas inseridos. </h5>
            <img src="/views/assets/images/tutorial/idioma_sim.png" class="img-fluid" alt="Idiomas Sim"><br>
            <h5 class="text-center text-success">8 - b). Se não encontrou o idioma que você fala ou tem conhecimento, responda a pergunta <b>"Encontrou o Idioma?"</b> selecionando
                <b>"Não"</b> digite um Idioma e clique em <b>"Novo Idioma"</b>.</h5>
            <img src="/views/assets/images/tutorial/idioma_nao.png" class="img-fluid" alt="Idiomas Não"><br>
            <hr>
            <h5 class="text-center text-success">9 - Se tem experiência profissional selecione  <b>"Emprego Atual"</b> para o emprego que você está no momento ou
                <b>"Emprego Anterior"</b> para empregos anteriores e digite os dados, clique em <b>"Adicionar"</b> para adicionar um novo registro ou em <b>"Finalizar"</b> para ir
                a próxima tela do sistema. Clique em <b>"Listar"</b> para listar as experiências profissionais inseridas.
            </h5>
            <img src="/views/assets/images/tutorial/profissional_atual.png" class="img-fluid" alt="Profissional Atual"><br>
            <hr>
            <h5 class="text-center text-success">10 - Clique em <b>"Finalizar"</b> para finalizar seu curriculo ou em <b>"Voltar"</b> para voltar as páginas de registro. </h5>
            <img src="/views/assets/images/tutorial/finalizar_curriculo.png" class="img-fluid" alt="Finalizar Curriculo"><br>
            <hr>
            <h5 class="text-center text-success">11 - Essa é sua area de trabalho depois de finalizar seu curriculo. </h5>
            <img src="/views/assets/images/tutorial/area_trabalho.png" class="img-fluid" alt="Area de Trabalho"><br>
            <hr>
            <div class="text-center">
                <a class="btn btn-danger" href="/" title="Voltar ao Início"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar ao Início</a>
            </div>
        </div>
    </div>
</section>
<br>
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
