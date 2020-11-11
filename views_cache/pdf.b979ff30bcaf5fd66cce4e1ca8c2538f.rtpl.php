<?php if(!class_exists('Rain\Tpl')){exit;}?><head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> </title>
    <style>
        body {
            font-family: "Times New Roman";
            background-color: white;
            color: black;
        }

        h1 {
            text-align: center;
        }

        img {
            width: 100px;
            height: inherit;
            padding: 4px;
            max-width: 100%;
            padding: 0.80rem 1.35rem
        }

        .space {
            padding-right: 10px;
        }

    </style>
</head>
<body>
<main role="main">
    <?php if( $curriculum ){ ?>

    <section>
        <?php if( $curriculum["foto_usuario"] != NULL ){ ?>

        <img  src="<?php echo htmlspecialchars( $curriculum["foto_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
        <?php } ?>

            <?php if( $curriculum["nome_social_uso"] == 'Sim' ){ ?>

            <h1><?php echo htmlspecialchars( $curriculum["nome_social"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
            <?php }else{ ?>

            <h1><?php echo htmlspecialchars( $curriculum["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $curriculum["sobrenome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
            <?php } ?>

                <!-- Dados Pessoais -->
                <div>
                    <h3><u>Dados Pessoais</u> </h3>
                </div>
                <div>
                    <label><b>Idade: </b></label><?php echo calculateAge($curriculum["nascimento"]); ?> anos;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><b>Data de Nascimento: </b></label><?php echo formatDate($curriculum["nascimento"]); ?>;
                    <br>
                    <label><b>Sexo: </b></label><?php echo htmlspecialchars( $curriculum["genero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><b>Cor/Raça: </b></label><?php echo htmlspecialchars( $curriculum["cor_raca"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <br>
                    <label><b>Naturalidade: </b></label><?php echo htmlspecialchars( $curriculum["naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $curriculum["uf_naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><b>Nacionalidade: </b></label><?php echo htmlspecialchars( $curriculum["nacionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                </div>
                <hr>
                <!-- Contato -->
                <div>
                    <h3><u>Contato</u> </h3>
                </div>
                <div>
                    <label><b>Celular: </b></label><?php echo htmlspecialchars( $curriculum["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if( $curriculum["telefone"] != NULL ){ ?>

                    <label><b>Telefone: </b></label><?php echo htmlspecialchars( $curriculum["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <?php } ?>

                    <br>
                    <label><b>E-mail: </b></label><?php echo htmlspecialchars( $curriculum["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                </div>
                <hr>
                <!-- Endereço -->
                <div>
                    <h3><u>Endereço</u> </h3>
                </div>
                <div>
                    <label><b>Rua/Av: </b></label><?php echo htmlspecialchars( $curriculum["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;
                    <label><b>Nº: </b></label><?php echo htmlspecialchars( $curriculum["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <label><b>CEP: </b></label><?php echo htmlspecialchars( $curriculum["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <br>
                    <label><b>Bairro: </b></label><?php echo htmlspecialchars( $curriculum["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;
                    <label><b>Cidade: </b></label><?php echo htmlspecialchars( $curriculum["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $curriculum["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;
                    <label><b>Pais: </b></label><?php echo htmlspecialchars( $curriculum["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                </div>
                <!-- Deficiência -->
                <?php if( $curriculum["deficiencia_existe"] == 'Sim' ){ ?>

                <hr>
                <div>
                    <h3><u>Deficiência</u> </h3>
                </div>
                <div>
                    <label><b>Tipo: </b></label><?php echo htmlspecialchars( $curriculum["tipo_deficiencia"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;
                    <?php if( $curriculum["cid"] != NULL ){ ?>

                     <label><b>CID: </b></label><?php echo htmlspecialchars( $curriculum["cid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    <?php } ?>

                    <br>
                     <label><b>Detalhamento da Deficiência: </b></label><?php echo htmlspecialchars( $curriculum["especificacao_deficiencia"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <br>
                    <?php if( $curriculum["regime_cota"] == 'Sim' ){ ?>

                     <label><b>* Já trabalhou pelo regime de <a href="https://www2.camara.leg.br/legin/fed/lei/1991/lei-8213-24-julho-1991-363650-publicacaooriginal-1-pl.html" target="_blank">Lei de Cotas 8213/91;</a></b></label>
                    <?php } ?>

                    <br>
                    <?php if( $curriculum["veiculo_adaptado"] == 'Sim' ){ ?>

                      <label><b>* Possúi veículo adaptado;</b></label>
                    <?php } ?>

                    <br>
                    <?php if( $curriculum["transporte"] == 'Sim' ){ ?>

                     <label><b>* Independente no transporte coletivo;</b></label>
                    <?php }else{ ?>

                      <label><b>* Necessita de ajuda no transporte coletivo;</b></label>
                    <?php } ?>

                    <br>
                    <?php if( $curriculum["acompanhantes"] == 'Sim' ){ ?>

                      <label><b>* Necessita de acompanhantes ou cão-guia;</b></label>
                    <?php } ?>

                    <br>
                    <?php if( $curriculum["adaptacoes_trabalho"] == 'Sim' ){ ?>

                    <?php if( $curriculum["especificacao_trabalho"] != NULL ){ ?>

                      <label><b>* Detalhamento da Adaptação Necessaria: </b></label><?php echo htmlspecialchars( $curriculum["especificacao_trabalho"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <?php } ?>

                    <?php } ?>

                </div>
                <?php } ?>

                <hr>
                <!-- Formação Acadêmica -->
                <div>
                    <h3><u>Formação Acadêmica</u> </h3>
                </div>
                <div>
                    <?php if( $curriculum["nivel_conclusao"] != NULL ){ ?>

                    <label><b>Formação Concluida: </b></label><?php echo htmlspecialchars( $curriculum["nivel_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><b>Início: </b></label><?php echo htmlspecialchars( $curriculum["ano_inicio_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;
                    <label><b>Conclusão: </b></label><?php echo htmlspecialchars( $curriculum["ano_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;
                     <br>
                    <label><b>Instituição de Conclusão: </b></label><?php echo htmlspecialchars( $curriculum["instituicao_conclusao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <?php } ?>

                     <br>
                    <br>
                    <?php if( $curriculum["nivel_andamento"] != NULL ){ ?>

                    <label><b>Formação em Andamento: </b></label><?php echo htmlspecialchars( $curriculum["nivel_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><b>Início: </b></label><?php echo htmlspecialchars( $curriculum["ano_inicio_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <br>
                    <label><b>Instituição: </b></label><?php echo htmlspecialchars( $curriculum["instituicao_andamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <?php } ?>

                    <?php if( $curriculum["curso"] != NULL ){ ?>

                    <br>
                    <label><b>Curso: </b></label><?php echo htmlspecialchars( $curriculum["curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                     <br>
                    <label><b>Tipo de Graduação: </b></label><?php echo htmlspecialchars( $curriculum["tipo_graduacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                    <?php } ?>

                </div>
                <!-- Outros Cursos -->
                <?php if( $courses ){ ?>

                <hr>
                <div>
                    <h3><u>Outros Cursos</u> </h3>
                </div>
                <?php $counter1=-1;  if( isset($courses) && ( is_array($courses) || $courses instanceof Traversable ) && sizeof($courses) ) foreach( $courses as $key1 => $value1 ){ $counter1++; ?>

                <div>
                   <label><b>Curso: </b></label><?php echo htmlspecialchars( $value1["nome_curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;&nbsp;
                   <label><b>Carga Horária: </b></label><?php echo htmlspecialchars( $value1["carga_horaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> horas;
                    <br>
                   <label><b>Instituicão: </b></label><?php echo htmlspecialchars( $value1["instituicao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;
                   <label><b>Conclusão: </b></label><?php echo formatDate($value1["termino"]); ?>;
                    <br>
                    <label><b>Compentências: </b></label><?php echo htmlspecialchars( $value1["compentencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </div>
                <br>
                <?php } ?>

                <?php } ?>

                <!-- Idiomas -->
                <?php if( $languages ){ ?>

                <hr>
                <div>
                    <h3><u>Idiomas</u> </h3>
                </div>
                <?php $counter1=-1;  if( isset($languages) && ( is_array($languages) || $languages instanceof Traversable ) && sizeof($languages) ) foreach( $languages as $key1 => $value1 ){ $counter1++; ?>

                <div>
                    <label><b>* </b></label><?php echo htmlspecialchars( $value1["idioma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nivel_conhecimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </div>
                <?php } ?>

                <?php } ?>

            <!-- Experiência Profissional -->
            <?php if( $professional ){ ?>

            <hr>
            <div>
                <h3><u>Experiência Profissional</u> </h3>
            </div>
           <div>
            <?php $counter1=-1;  if( isset($professional) && ( is_array($professional) || $professional instanceof Traversable ) && sizeof($professional) ) foreach( $professional as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $value1["registro"] == 'inativo' && $value1["empresa_anterior"] != NULL ){ ?>

                <label><b>Empresa: </b></label><?php echo htmlspecialchars( $value1["empresa_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;
                <label><b>Cargo: </b></label><?php echo htmlspecialchars( $value1["cargo_anterior"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                <br>
                <label><b>Admissão: </b></label><?php echo formatDate($value1["data_admissao"]); ?>;&nbsp;&nbsp;&nbsp;
                <label><b>Demissão: </b></label><?php echo formatDate($value1["data_demissao"]); ?>;
                <br>
                <label><b>Atividade Exercida: </b></label><?php echo htmlspecialchars( $value1["atividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

            <?php } ?>

            <?php if( $value1["registro"] == 'ativo' && $value1["empresa_atual"] != NULL ){ ?>

                <label><b>Empresa Atual: </b></label><?php echo htmlspecialchars( $value1["empresa_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;&nbsp;&nbsp;&nbsp;
                <label><b>Cargo: </b></label><?php echo htmlspecialchars( $value1["cargo_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                <br>
                <label><b>Admissão: </b></label><?php echo formatDate($value1["data_admissao"]); ?>;
                <br>
                <label><b>Atividade Exercida: </b></label><?php echo htmlspecialchars( $value1["atividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
               <br>
               <br>
            <?php } ?>

            <?php } ?>

           </div>
        <?php } ?>

    </section>
    <?php } ?>

</main>

</body>
</html>
