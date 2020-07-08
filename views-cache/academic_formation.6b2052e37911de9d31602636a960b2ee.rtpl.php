<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <h4 style="text-align: center">
        Registro de Curriculo <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </h4>

</section>

<section class="container-fluid col-md-9">
    <div class="alert">
        <?php echo flash(); ?>
    </div>
    <form class="form" action="/curriculum/formation" method="post" autocomplete="off">
    <div  class="card border-success">
        <div class="card-header text-success">
            <h4>Formação Acadêmica</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col">
                    <!-- Linha 1 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nivel_conclusao"><b>Formação Concluída</b></label>
                            <select class="form-control form-control-sm" id="nivel_conclusao" name="nivel_conclusao" autofocus>
                                <option value="">Selecione</option>
                                <option value="Fundamental 1(1º a 5º ano)">Fundamental 1(1º a 5º ano)</option>
                                <option value="Fundamental 2(6º a 9º ano)">Fundamental 2(6º a 9º ano)</option>
                                <option value="Médio">Médio</option>
                                <option value="Superior">Superior</option>
                                <option value="Pós-Graduação">Pós-Graduação</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Pós-Doutorado">Pós-Doutorado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ano_inicio_conclusao"><b>Início(Ano)</b></label>
                            <input type="text" class="form-control form-control-sm" id="ano_inicio_conclusao" name="ano_inicio_conclusao" placeholder="Ex: 19999" onkeypress="formatar('####',this)"  maxlength="4">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ano_conclusao"><b>Conclusão(Ano)</b></label>
                            <input type="text" class="form-control form-control-sm" id="ano_conclusao" name="ano_conclusao" placeholder="Ex: 2010"onkeypress="formatar('####',this)"  maxlength="4" >
                        </div>
                        <div class="form-group col-md-5">
                            <label for="instituicao_conclusao"><b>Instituição de Ensino (Conclusão)</b></label>
                            <input type="text" class="form-control form-control-sm" id="instituicao_conclusao" name="instituicao_conclusao" placeholder="Ex: IFTM">
                        </div>
                    </div>
                    <hr>
                    <!-- Linha 3 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nivel_andamento"><b>Formação em Andamento</b></label>
                            <select class="form-control form-control-sm" id="nivel_andamento" name="nivel_andamento">
                                <option value="">Selecione</option>
                                <option value="Fundamental 1(1º a 5º ano)">Fundamental 1(1º a 5º ano)</option>
                                <option value="Fundamental 2(6º a 9º ano)">Fundamental 2(6º a 9º ano)</option>
                                <option value="Médio">Médio</option>
                                <option value="Superior">Superior</option>
                                <option value="Pós-Graduação">Pós-Graduação</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Pós-Doutorado">Pós-Doutorado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ano_inicio_andamento"><b>Início(Ano)</b></label>
                            <input type="text" class="form-control form-control-sm" id="ano_inicio_andamento" name="ano_inicio_andamento" placeholder="Ex: 19999" onkeypress="formatar('####',this)"  maxlength="4">
                        </div>
                        <div class="form-group col-md-7">
                            <label for="instituicao_andamento"><b>Instituição de Ensino (Andamento)</b></label>
                            <input type="text" class="form-control form-control-sm" id="instituicao_andamento" name="instituicao_andamento" placeholder="Ex: IFTM" >
                        </div>
                    </div>
                    <hr>
                    <!-- Linha 3 -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="curso"><b>Curso</b></label>
                            <input type="text" class="form-control form-control-sm" id="curso" name="curso" placeholder="Ex: Analise de Desenvolvimento de Sistemas" >
                        </div>
                    </div>
                </div>

           </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-md btn-success float-right">Proximo <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            <a class="btn btn-danger float-left" href="/user/contact" title="Anterior"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior </a></p>
        </div>

    </div>
    </form>
</section>

</div>

