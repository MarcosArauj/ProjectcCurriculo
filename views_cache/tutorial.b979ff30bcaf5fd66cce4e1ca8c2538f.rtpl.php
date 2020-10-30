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
            <h5 class="text-center text-success">1 - Para Iniciar o seu cadastro, insira um E-mail e crie uma senha. Clique em <b>"Criar Conta"</b></h5>
            <img src="/views/assets/images/tutorial/criar_usuario.png" class="img-fluid" alt="Cirar Usuario">
            <hr>
            <h5 class="text-center text-success">2 - Nessa tela clique em <b>"Iniciar"</b> para começar a criação do seu Curriculo ou clique em <b>"Sair"</b> para
            sair do Sistema.</h5>
            <img src="/views/assets/images/tutorial/iniciar.png" class="img-fluid" alt="Iniciar">
            <hr>
            <h5 class="text-center text-success">3 - Insira seus dados pessoais, clique em <b>"Próximo"</b> para registrar.</h5>
            <img src="/views/assets/images/tutorial/dados_pessoais.png" class="img-fluid" alt="Dados Pessoais">
            <hr>
            <h5 class="text-center text-success">4 - Insira seus enderço e contato, clique em <b>"Próximo"</b> para registrar.</h5>
            <img src="/views/assets/images/tutorial/contato.png" class="img-fluid" alt="Contato">
            <hr>
            <h5 class="text-center text-success">5 - a). Se tive algum tipo de deficiência insira os dados, clique em <b>"Próximo"</b> para registrar.</h5>
            <img src="/views/assets/images/tutorial/deficiencia_sim.png" class="img-fluid" alt="Deficiencia Sim"><br>
            <h5 class="text-center text-success">5 - b). Se tive não, clique em <b>"Próximo"</b> para ir ao próximo registro.</h5>
            <img src="/views/assets/images/tutorial/deficiencia_nao.png" class="img-fluid" alt="Deficiencia Não">
            <hr>
            <h5 class="text-center text-success">6 - Insira sua formação acadêmica, clique em <b>"Próximo"</b> para registrar.</h5>
            <img src="/views/assets/images/tutorial/formacao_academica.png" class="img-fluid" alt="Formacao Academica">
            <hr>
            <h5 class="text-center text-success">7 - Se fez algum outro curso insira os dados, clique em <b>"Adicionar"</b> para adicionar um registro ou em <b>"Próximo"</b> para ir a próxima tela de registro.
                Clique em <b>"Listar"</b> para listar os cursos inseridos. </h5>
            <img src="/views/assets/images/tutorial/cursos.png" class="img-fluid" alt="Outros Cursos"><br>
            <hr>
            <h5 class="text-center text-success">8 - a). Se fala ou tem conhecimento algum outro idioma insira os dados, clique em <b>"Adicionar"</b> para adicionar um registro ou em <b>"Próximo"</b>
                para ir a próxima tela de registro. Clique em <b>"Listar"</b> para listar os cursos inseridos. </h5>
            <img src="/views/assets/images/tutorial/idioma_sim.png" class="img-fluid" alt="Idiomas Sim"><br>
            <h5 class="text-center text-success">8 - b). Se não encontrou o idioma que você fala ou tem conhecimento, responda a pergunta <b>"Encontrou o Idioma"</b> selecionando <b>"Não"</b> para inserir um novo Idioma.</h5>
            <img src="/views/assets/images/tutorial/idioma_nao.png" class="img-fluid" alt="Idiomas Não"><br>
            <hr>
            <h5 class="text-center text-success">9 - Se tem experiência profissional selecione  <b>"Emprego Atual"</b> para o emprego que você está no momento ou
                <b>"Emprego Anterior"</b>para empregos anteriores e insirar os dados, clique em <b>"Adicionar"</b> para adicionar um registro ou em <b>"Próximo"</b> para ir
                a próxima tela do sistema. Clique em <b>"Listar"</b> para listar as experiências profissionais inseridas.
            </h5>
            <img src="/views/assets/images/tutorial/profissional_atual.png" class="img-fluid" alt="Profissional Atual"><br>
            <hr>
            <h5 class="text-center text-success">10 - Clique em <b>"Finalizar"</b> para finalizar seu curriculo ou em <b>"Voltar"</b> para voltar as páginas de registro. </h5>
            <img src="/views/assets/images/tutorial/finalizar_curriculo.png" class="img-fluid" alt="Finalizar Curriculo"><br>
            <hr>
            <h5 class="text-center text-success">11 - Essa é sua area de trabalho depois de finalizar seu curriculo. </h5>
            <img src="/views/assets/images/tutorial/area_trabalho.png" class="img-fluid" alt="Area de Trabalho"><br>
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
        <a class="link_footer" href="#">Sobre nós</a>
        <span class="offset-1"></span>
        <a class="link_footer" href="#">Contato</a>
    </p>
    <p class="text-muted"><b>Versão</b> <?php echo site("version"); ?>,  &copy; <?php echo site("name_complete"); ?> <?php echo date('Y'); ?></p>
</footer>
<?php require $this->checkTemplate("footer");?>
