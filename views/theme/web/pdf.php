{include="header"}
<section class="container">
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id="titulo_home">
            <a href="/">
                <b>{#site("name")#} - {#site("desc")#}</b>
            </a>
        </h1>
    </div>
</section>
{if="$curriculum"}
<section class="container col-md-8">
    <div class="card border-success">
        <div class="card-header text-success text-center">
            {if="$curriculum.nome_social_uso == 'Sim'"}
            <h1>{$curriculum.nome_social}</h1>
            {else}
            <h1>{$curriculum.primeiro_nome} {$curriculum.sobrenome}</h1>
            {/if}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <img class="img-circle" src="{$curriculum.foto_usuario}" alt="Photo">
                </div>
                <div class="col-9">
                    <!-- Dados Pessoais -->
                    <div class="row">
                        <h5><u>Dados Pessoais</u> </h5>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label><b>Idade: </b></label>&nbsp;
                            <span>{function="calculateAge($curriculum.nascimento)"};</span>
                            <span class="offset-1"></span>
                            <label><b>Data de Nascimento: </b></label>&nbsp;
                            <span>{function="formatDate($curriculum.nascimento)"};</span>
                        </div>
                        <div class="row">
                            <label><b>Sexo: </b></label>&nbsp;
                            <span>{$curriculum.genero}</span>
                            <span class="offset-1"></span>
                            <label><b>Cor/Raça: </b></label>&nbsp;
                            <span>{$curriculum.cor_raca}</span>
                        </div>
                        <div class="row">
                            <label><b>Naturalidade: </b></label>&nbsp;
                            <span>{$curriculum.naturalidade}/{$curriculum.uf_naturalidade} </span>
                            <span class="offset-2"></span>
                            <label><b>Nacionalidade: </b></label>&nbsp;
                            <span>{$curriculum.nacionalidade} </span>
                        </div>
                    </div>
                    <hr>
                    <!-- Contato -->
                    <div class="row">
                        <h5><u>Contato</u> </h5>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label><b>Celular: </b></label>&nbsp;
                            <span>{$curriculum.celular} </span>
                            <span class="offset-2"></span>
                            {if="$curriculum.telefone != NULL"}
                            <label><b>Telefone: </b></label>&nbsp;
                            <span>{$curriculum.telefone} </span>
                            {/if}
                        </div>
                        <div class="row">
                            <label><b>E-mail: </b></label>&nbsp;
                            <span>{$curriculum.email} </span>
                        </div>
                    </div>
                    <hr>
                    <!-- Endereço -->
                    <div class="row">
                        <h5><u>Endereço</u> </h5>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label><b>Rua/Av: </b></label>&nbsp;
                            <span>{$curriculum.endereco}</span>
                            <span class="offset-2"></span>
                            <label><b>Nº: </b></label>&nbsp;
                            <span>{$curriculum.numero}</span>
                        </div>
                        <div class="row">
                            <label><b>CEP: </b></label>&nbsp;
                            <span>{$curriculum.cep}</span>
                            <span class="offset-3"></span>
                            <label><b>Bairro: </b></label>&nbsp;
                            <span>{$curriculum.bairro}</span>
                        </div>
                        <div class="row">
                            <label><b>Cidade: </b></label>&nbsp;
                            <span>{$curriculum.cidade} - {$curriculum.estado}</span>
                            <span class="offset-2"></span>&nbsp;&nbsp;
                            <label><b>Pais: </b></label>&nbsp;
                            <span>{$curriculum.pais}</span>
                        </div>
                    </div>
                    <!-- Deficiência -->
                    {if="$curriculum.deficiencia_existe == 'Sim'"}
                    <hr>
                    <div class="row">
                        <h5><u>Deficiência</u> </h5>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label><b>Tipo: </b></label>&nbsp;
                            <span>{$curriculum.tipo_deficiencia}</span>
                            <span class="offset-2"></span>&nbsp;&nbsp;
                            {if="$curriculum.cid != NULL"}
                            <label><b>CID: </b></label>&nbsp;
                            <span>{$curriculum.cid}</span>
                            {/if}
                        </div>
                        <div class="row">
                            <label><b>Detalhamento da Deficiência: </b></label>&nbsp;
                            <span>{$curriculum.especificacao_deficiencia}</span>
                        </div>
                        <div class="row">
                            {if="$curriculum.regime_cota == 'Sim'"}
                            <label><b>* Já trabalhou pelo regime de <a href="https://www2.camara.leg.br/legin/fed/lei/1991/lei-8213-24-julho-1991-363650-publicacaooriginal-1-pl.html" target="_blank">Lei de Cotas 8213/91</a></b></label>
                            {/if}
                        </div>
                        <div class="row">
                            {if="$curriculum.veiculo_adaptado == 'Sim'"}
                            <label><b>* Possúi veículo adaptado</b></label>
                            {/if}
                        </div>
                        <div class="row">
                            {if="$curriculum.transporte == 'Sim'"}
                            <label><b>* Independente no transporte coletivo</b></label>
                            {else}
                            <label><b>* Necessita de ajuda no transporte coletivo</b></label>
                            {/if}
                        </div>
                        <div class="row">
                            {if="$curriculum.acompanhantes == 'Sim'"}
                            <label><b>* Necessita de acompanhantes ou cão-guia</b></label>
                            {/if}
                        </div>
                        <div class="row">
                            {if="$curriculum.adaptacoes_trabalho == 'Sim'"}
                            {if="$curriculum.especificacao_trabalho != NULL"}
                            <label><b>* Detalhamento da Adaptação Necessaria: </b></label>&nbsp;
                            <span>{$curriculum.especificacao_trabalho}</span>
                            {/if}
                            {/if}
                        </div>
                    </div>
                    {/if}
                    <hr>
                    <!-- Formação Acadêmica -->
                    <div class="row">
                        <h5><u>Formação Acadêmica</u> </h5>
                    </div>
                    <div class="col">
                        {if="$curriculum.nivel_conclusao != NULL"}
                        <div class="row">
                            <label><b>Formação Concluida: </b></label>&nbsp;
                            <span>{$curriculum.nivel_conclusao}</span>
                            <span class="offset-2"></span>&nbsp;&nbsp;
                            <label><b>Início: </b></label>&nbsp;
                            <span>{$curriculum.ano_inicio_conclusao}</span>
                            <span class="offset-1"></span>
                            <label><b>Conclusão: </b></label>&nbsp;
                            <span>{$curriculum.ano_conclusao}</span>
                        </div>
                        <div class="row">
                            <label><b>Instituição de Conclusão: </b></label>&nbsp;
                            <span>{$curriculum.instituicao_conclusao}</span>
                        </div>
                        {/if}
                        <div class="row">
                            <label><b>Formação em Andamento: </b></label>&nbsp;
                            <span>{$curriculum.nivel_andamento}</span>
                            <span class="offset-1"></span>&nbsp;&nbsp;
                            <label><b>Início: </b></label>&nbsp;
                            <span>{$curriculum.ano_inicio_andamento}</span>
                        </div>
                        <div class="row">
                            <label><b>Instituição: </b></label>&nbsp;
                            <span>{$curriculum.instituicao_andamento}</span>
                        </div>
                        <div class="row">
                            {if="$curriculum.curso != NULL"}
                            <label><b>Curso: </b></label>&nbsp;
                            <span>{$curriculum.curso}</span>
                            <span class="offset-5"></span>
                            <label><b>Tipo de Graduação: </b></label>&nbsp;
                            <span>{$curriculum.tipo_graduacao}</span>
                            {/if}
                        </div>
                    </div>
                    <!-- Outros Cursos -->
                    {if="$courses"}
                    <hr>
                    <div class="row">
                        <h6><u>Outros Cursos</u> </h6>
                    </div>
                    {loop="$courses"}
                    <div class="col">
                        <div class="row">
                            <label><b>Curso: </b></label>&nbsp;
                            <span>{$value.nome_curso}</span>
                            <span class="offset-2"></span>&nbsp;&nbsp;&nbsp;
                            <label><b>Carga Horária: </b></label>&nbsp;
                            <span>{$value.carga_horaria} horas</span>
                        </div>
                        <div class="row">
                            <label><b>Instituicão: </b></label>&nbsp;
                            <span>{$value.instituicao}</span>
                            <span class="offset-md-2"></span>
                            <label><b>Conclusão: </b></label>&nbsp;
                            <span>{function="formatDate($value.termino)"}</span>
                        </div>
                        <div class="row">
                            <label><b>Compentências: </b></label>&nbsp;
                            <span>{$value.compentencias}</span>
                        </div>
                    </div>
                    {/loop}
                    {/if}
                    <!-- Idiomas -->
                    {if="$languages"}
                    <hr>
                    <div class="row">
                        <h5><u>Idiomas</u> </h5>
                    </div>
                    {loop="$languages"}
                    <div class="row">
                        <div class="col-5">
                            <label><b>Idioma: </b></label>&nbsp;
                            <span>{$value.idioma}</span>
                        </div>
                        <div class="col">
                            <label><b>Nivel Conhecimento: </b></label>&nbsp;
                            <span>{$value.nivel_conhecimento}</span>
                        </div>
                    </div>
                    {/loop}
                    {/if}
                    <!-- Experiência Profissional -->
                    {if="$professional"}
                    <hr>
                    <div class="row">
                        <h5><u>Experiência Profissional</u> </h5>
                    </div>
                    {loop="$professional"}
                    {if="$value.registro == 'inativo' && $value.empresa_anterior != NULL"}
                    <div class="row">
                        <div class="col-5">
                            <label><b>Empresa: </b></label>&nbsp;
                            <span>{$value.empresa_anterior}</span>
                        </div>
                        <div class="col">
                            <label><b>Cargo: </b></label>&nbsp;
                            <span>{$value.cargo_anterior}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label><b>Admissão: </b></label>&nbsp;
                            <span>{$value.data_admissao}</span>
                        </div>
                        <div class="col">
                            <label><b>Demissão: </b></label>&nbsp;
                            <span>{$value.data_demissao}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label><b>Atividade Exercida: </b></label>&nbsp;
                            <span>{$value.atividade}</span>
                        </div>
                    </div>
                    {/if}
                    {if="$value.registro == 'ativo' && $value.empresa_atual != NULL"}
                    <div class="row">
                        <div class="col-5">
                            <label><b>Empresa Atual: </b></label>&nbsp;
                            <span>{$value.empresa_atual}</span>
                        </div>
                        <div class="col">
                            <label><b>Cargo: </b></label>&nbsp;
                            <span>{$value.cargo_atual}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label><b>Admissão: </b></label>&nbsp;
                            <span>{$value.data_admissao}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label><b>Atividade Exercida: </b></label>&nbsp;
                            <span>{$value.atividade}</span>
                        </div>
                    </div>
                    {/if}
                    {/loop}
                    {/if}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary float-right" href="/curriculum/get_curriculum" title="Gerar PDF">Gerar PDF <i class="fa fa-clipboard" aria-hidden="true"></i> </a>
        </div>
    </div>
</section>
{else}
<div  class="alert alert-danger">
    <h3 class="text-center">Curriculo não Existe</h3>
</div>
{/if}
</div>
{include="footer"}