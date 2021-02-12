
// ---------- Remover Mascara ---------------------- ///
function removeMascara(str, sub) {

    let i = str.indexOf(sub);
    let r = "";

    if (i === -1) return str;
    {
        r += str.substring(0,i) + removeMascara(str.substring(i + sub.length), sub);
    }

    return r;
}
//---------- Carregar endereço buscando pelo CEP --------------------//
$('#cep').blur(function () {

    var cep = $('#cep').val();

    cep = removeMascara(cep, ".");
    cep = removeMascara(cep, "-");

    // console.log(cep);
    var url = "http://viacep.com.br/ws/" + cep + "/json"

    pesquisarCEP(url);

});

function pesquisarCEP(endereco) {
    $.ajax({
        type:"GET",
        url:endereco,
        async:false

    }).done(function (data) {
        console.log(data);
        $('#bairro').val(data.bairro);
        $('#endereco').val(data.logradouro);
        $('#cidade').val(data.localidade);
        $('#estado').val(data.uf);
    }).fail(function () {
        console.log("Erro");
    });
}

//-------------------- Carrega cidades de acordo com estado selecionado----------------------------///

jQuery(document).ready(function($) {

    $('#estado').on('change',function(){
        if( $(this).val() ) {
            $('.carregando').show();
            $.getJSON(
                '/user/personal_data/search_uf_city?search=', {uf: $(this).val(), ajax: 'true'}, function(j){
                    var options = '<option value="">Selecione uma cidade</option>';

                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i].nome_cidade + '">' + j[i].nome_cidade + '</option>';
                    }
                    $('#cidade').attr('disabled', false);
                    $('#cidade').css('background-color' ,'#1C1F27')
                    $('#cidade').focus();
                    $('#cidade').html(options).show();
                    $('.carregando').hide();
                });
        } else {
            $('#cidade').html('<option value="">-- Selecione um estado --</option>');
        }
    });
});

// ------------------- Mostrar e ocultar senhas --------------- ///
jQuery(document).ready(function($) {

    $('#mostrar_senha').on("click", function(e) {
        e.preventDefault();
        if ( $('#senha').attr('type') === 'password') {
            $('#senha').attr('type', 'text');
            $('#mostrar_senha').attr('class', 'fa fa-eye');
        } else {
            $('#senha').attr('type', 'password');
            $('#mostrar_senha').attr('class', 'fa fa-eye-slash');
        }

    });

    $('#mostrar_confirma_senha').on("click", function(e) {
        e.preventDefault();
        if ( $('#confirma_senha').attr('type') === 'password') {
            $('#confirma_senha').attr('type', 'text');
            $('#mostrar_confirma_senha').attr('class', 'fa fa-eye');
        } else {
            $('#confirma_senha').attr('type', 'password');
            $('#mostrar_confirma_senha').attr('class', 'fa fa-eye-slash');
        }

    });

    $('#mostrar_senha_alterar').on("click", function(e) {
        e.preventDefault();
        if ( $('#senha').attr('type') === 'password' || $('#confirma_senha').attr('type') === 'password' ||
            $('#senhatual').attr('type') === 'password' ) {

            $('#senhatual').attr('type', 'text');
            $('#senha').attr('type', 'text');
            $('#confirma_senha').attr('type', 'text');
            $('#mostrar_senha_alterar').val('Ocultar Senhas');
        } else {
            $('#senhatual').attr('type', 'password');
            $('#senha').attr('type', 'password');
            $('#confirma_senha').attr('type', 'password');
            $('#mostrar_senha_alterar').val('Mostrar Senhas');
        }

    });

});

// ------------------ Verificação Check Box-------------------------- //
$(document).ready(function () {
    // $('input[type=radio]').on('change',function() {
    //     $('input[type=radio]:checked').not(this).prop('checked', false);
    // });

    // Nome Social
    $('#sim').on('click',function () {
        $('#nome_social').attr('disabled', false);
        $('#nome_social').css('background-color', '#1C1F27');
        $('#mens_social').attr("class", "success-enabled");

    });
    $('#nao').on('click',function () {
        $('#nome_social').attr('disabled', true);
        $('#nome_social').css('background-color', '#4b4b4b');
        $('#mens_social').attr("class", "success-disabled");
    });

    // Novo Idioma
    $('#nao_idioma').on('click',function () {
        $('#novo_idioma').css("display" ,"block");

    });
    $('#sim_idioma').on('click',function () {
        $('#novo_idioma').css("display", "none");
    });

    // Nova Experiencia Profissional
    $('#sim_emprego').on('click',function () {
        $('.professional_atual').css("display" ,"block");
        $('.professional_anterior').css("display" ,"none");

    });
    $('#nao_emprego').on('click',function () {
        $('.professional_atual').css("display" ,"none");
        $('.professional_anterior').css("display" ,"block");
    });

    if($('#sim_emprego').prop("checked")) {
        $('.professional_atual').css("display" ,"block");
        $('.professional_anterior').css("display" ,"none");

    } else if($('#nao_emprego').prop("checked")) {
        $('.professional_atual').css("display" ,"none");
        $('.professional_anterior').css("display" ,"block");
    }

    // Deficiência
    $('#sim_deficiencia').on('click',function () {
        $('.deficiencia').css("display" ,"block");
        $('.deficiencia_nao').css("display" ,"none");
        $('.success-enabled').css("display" ,"block");

    });
    $('#nao_deficiencia').on('click',function () {
        $('.deficiencia').css("display" ,"none");
        $('.deficiencia_nao').css("display" ,"block");
        $('.success-enabled').css("display" ,"none");
    });

    if($('#sim_deficiencia').prop("checked")) {
        $('.deficiencia').css("display" ,"block");
        $('.success-enabled').css("display" ,"block");

    } else if($('#nao_deficiencia').prop("checked")) {
        $('.deficiencia').css("display" ,"none");
        $('.success-enabled').css("display" ,"none");
    }

    // Adaptações Deficiência
    $('#simadaptacoes').on('click',function () {
        $('.adaptacao').css("display" ,"block");

    });
    $('#naoadaptacoes').on('click',function () {
        $('.adaptacao').css("display" ,"none");
    });

    if($('#simadaptacoes').prop("checked")) {
        $('.adaptacao').css("display" ,"block");

    } else if($('#naoadaptacoes').prop("checked")) {
        $('.adaptacao').css("display" ,"none");
    }

});

//--------------- Descrição do nivel de conhecimento dos Idiomas e Tipo de Deficiência-----------------------//
$(document).ready(function () {

    // Seleção de  Nível de Conheciemento de Idioma
    $('#nivel').on("change", function () {
        let nivel = $('#nivel').val();
        var view;

        if(nivel === "Iniciante") {
             view = '<div>*Iniciante:</br>Você não tem conhecimento algum do idioma, mas em breve você poderá dar os primeiros passos rumo ao progresso.</div>';

        } else if (nivel === "Basico") {
             view = '<div>*Básico:</br>Você já poderá formar e entender questões simples.</div>';

        } else if (nivel === "Elementar") {
            view = '<div>*Elementar:</br>Você poderá entender simples artigos de jornal. Escrever cartas e fazer declarações espontâneas não são problemas.</div>';

        } else if (nivel === "Intermediario") {
           view = '<div>*Intermediário:</br>Você já terá conhecimento prévio detalhado de gramática e vocabulário.</div>';

        } else if (nivel === "Avancado") {
            view = '<div>*Avançado:</br>Você tem um conhecimento grande do idioma. Você poderá apresentar tópicos específicos e conversar em quase quaisquer assuntos.</div>';

        } else if (nivel === "Fluente") {
            view = '<div>*Fluente:</br>Você terá técnicas especiais de vocabulário e gramática. Você poderá se comunicar em alto nível.</div>';

        } else if (nivel === "Academico") {
            view = '<div>*Acadêmico:</br>Você terá o perfeito conhecimento de vocabulário e gramática. Você poderá se comunicar quase como um falante nativo.</div>';

        } else {
            view = '<div></div>';
            $(".success-disabled").html(view);
        }
        $(".success-enabled").html(view);

    });


    // Seleção de Tipo de Deficiência
    $('#tipo_deficiencia').on("change", function () {
        let tipo_deficiencia = $('#tipo_deficiencia').val();
        var view;

        if(tipo_deficiencia === "Auditiva") {
            view = '<div>*Deficiência Auditiva:</br>' +
                'Deficiência auditiva (perda auditiva) é quando a habilidade auditiva da pessoa é reduzida. Deficiência auditiva faz com que a ' +
                'pessoa tenha dificuldade de ouvir diálogos e outros sons.  As causas mais comuns de deficiência auditiva (perda auditiva) são ruídos e envelhecimento.' +
                '</div>';

        } else if (tipo_deficiencia === "Fisica") {
            view = '<div>*Deficiência Fisica:</br>' +
                'São complicações que levam à limitação da mobilidade e da coordenação geral, podendo também afetar a fala, em diferentes graus. As causas são variadas - desde lesões neurológicas e neuromusculares' +
                ' até má-formação congênita - ou condições adquiridas, como hidrocefalia (acúmulo de líquido na caixa craniana) ou paralisia cerebral.' +
                '</div>';

        } else if (tipo_deficiencia === "Mental") {
            view = '<div>*Deficiência Mental:</br>' +
                'Segundo a AAMR (Associação Americana de Deficiência Mental) e DSM-IV (Manual Diagnóstico e Estatístico de Transtornos Mentais), pode-se definir deficiência mental como o estado de redução notável do ' +
                'funcionamento intelectual inferior à média, associado a limitações pelo menos em dois aspectos do funcionamento adaptativo: comunicação, cuidados pessoais, competência domésticas, ' +
                'habilidades sociais, utilização dos recursos comunitários, autonomia, saúde e segurança, aptidões escolares, lazer e trabalho.</div>';

        } else if (tipo_deficiencia === "Multipla") {
            view = '<div>*Deficiência Multipla:</br>' +
                'A associação de duas ou mais deficiências caracteriza uma pessoa com essa condição. A deficiência múltipla pode ser tanto mental, ' +
                'física ou sensorial, que combinadas acarretam em atrasos na capacidade adaptativa e no desenvolvimento global do indivíduo. Essa definição ' +
                'é da Política Nacional de Educação Especial do Ministério da Educação, que está cada vez mais engajado para fazer valer os direitos das pessoas com deficiência..</div>';

        } else if (tipo_deficiencia === "Visual") {
            view = '<div>*Deficiência Visual:</br>' +
                'É o comprometimento parcial (de 40 a 60%) ou total da visão. Não são deficientes visuais pessoas com doenças como miopia, astigmatismo ou hipermetropia, ' +
                'que podem ser corrigidas com o uso de lentes ou em cirurgias.Segundo critérios estabelecidos pela Organização Mundial da Saúde (OMS)' +
                ' os diferentes graus de deficiência visual podem ser classificados em: Baixa visão (leve, moderada ou profunda), Próximo à cegueira e Cegueira' +
                '</div>';

        } else if (tipo_deficiencia === "Outros") {
            view = '<div>*Outros:</br>Autismo ou Reabilitado do INSS</div>';

        } else {
            view = '<div></div>';
            $(".success-disabled").html(view);
        }
        $(".success-enabled").html(view);

    });

});


// ------------ Copiar link para compartilhamento do Curriculo -------------//
$(document).ready(function () {
    $(function(){
        // Executa o evento click no button
        $('#btncopia').click(function(){
            // Seleciona o conteúdo do input
            $('#link').select();
            // Copia o conteudo selecionado
            var copy = document.execCommand('copy');
            // Verifica se foi copia e retona mensagem
            if(copy){
                view = '<h6 class="message success"> Sucesso ao Copiar Link </h6>';
                $(".alert_copy").html(view);
                $(".message").effect("bounce");
                return;
            } else {
                 view = '<h6 class="message error"> Erro ao copiar, seu navegador pode não ter suporte a essa função.</h6>';
                $(".alert_copy").html(view);
                $(".message").effect("bounce");
            }
            // Cancela a execução do formulário
            return false;
        });
    });
});


// -----------------------Seleção dos filtros da busca ------------------------//
$(document).ready(function () {

    $('#filtro').on("change", function () {
        let filtro = $('#filtro').val();

        if (filtro === "Formação") {
            $('#busca').attr('placeholder','Digite a formação acadêmica desejada');
            $('#busca').attr('disabled', false);

        } else if (filtro === "Sexo") {
            $('#busca').attr('placeholder','Digite um Sexo');
            $('#busca').attr('disabled', false);

        } else if (filtro === "PCD") {
            $('#busca').attr('placeholder','Digite o tipo de deficiência desejado');
            $('#busca').attr('disabled', false);

        } else if (filtro === "Conhecimento") {
            $('#busca').attr('placeholder','Digite area de conhecimento desejada');
            $('#busca').attr('disabled', false);

        } else if (filtro === "Idioma") {
            $('#busca').attr('placeholder','Digite um Idioma');
            $('#busca').attr('disabled', false);

        } else if (filtro === "") {
            $('#busca').val('');
            $('#busca').attr('disabled', true);

        }
    });
});

