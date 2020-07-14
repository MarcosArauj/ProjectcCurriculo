
// ---------- Remover Mascara ---------------------- ///
function removeMascara(str, sub) {

    var i = str.indexOf(sub);
    var r = "";

    if (i == -1) return str;
    {
        r += str.substring(0,i) + removeMascara(str.substring(i + sub.length), sub);
    }

    return r;
}

//---------- Carregar endereço buscando pelo CEP --------------------//
$('#cep').blur(function (e) {

    // console.log("saiu");

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
        if ( $('#novasenha').attr('type') === 'password' || $('#confirmasenha').attr('type') === 'password' ||
            $('#senhatual').attr('type') === 'password' ) {

            $('#senhatual').attr('type', 'text');
            $('#novasenha').attr('type', 'text');
            $('#confirmasenha').attr('type', 'text');
            $('#mostrar_senha_alterar').val('Ocultar Senhas');
        } else {
            $('#senhatual').attr('type', 'password');
            $('#novasenha').attr('type', 'password');
            $('#confirmasenha').attr('type', 'password');
            $('#mostrar_senha_alterar').val('Mostrar Senhas');
        }

    });

});

// $('#uf').on("change", function (e) {
//     console.log($(this).val());
//     var idUf = $(this).val();
//
//     $.ajax({
//         type:"GET",
//         data: "id_estado=" + idUf,
//         url: "/getCitsStates",
//         async:false
//     }).done(function (data) {
//         // console.log($.parseJSON(data));
//         var citys  = "";
//         $.each($.parseJSON(data), function (chave, valor) {
//             citys += '<option value="' + valor.id_cidade + '">' +
//                 valor.nome_cidade + '</option>';
//         });
//         $("#citys").html(citys);
//     }).fail(function () {
//
//     })
// });

$(document).ready(function () {
    $('input[type=radio]').on('change',function() {
        $('input[type=radio]:checked').not(this).prop('checked', false);
    });

    // Nome Social
    $('#sim').on('click',function () {
        $('#nome_social').attr('disabled', false);
        $('#mens_social').attr("class", "success-enabled");

    });
    $('#nao').on('click',function () {
        $('#nome_social').attr('disabled', true);
        $('#mens_social').attr("class", "success-disabled");
    });

    // Novo Idioma
    $('#nao_idioma').on('click',function () {
        $('#novo_idioma').css("display" ,"block");

    });
    $('#sim_idioma').on('click',function () {
        $('#novo_idioma').css("display", "none");
    });


    // Novo Experiencia Profissional
    $('#sim_emprego').on('click',function () {
        $('.professional_atual').css("display" ,"block");
        $('.professional_anterior').css("display" ,"none");

    });
    $('#nao_emprego').on('click',function () {
        $('.professional_atual').css("display" ,"none");
        $('.professional_anterior').css("display" ,"block");
    });

});


// Seleção de Idiomas
$(document).ready(function () {

    $('#nivel').on("change", function () {
        let nivel = $('#nivel').val();
        var view;


        if(nivel == "iniciante") {
             view = '<div>*Iniciante:</br>Você não tem conhecimento algum do idioma, mas em breve você poderá dar os primeiros passos rumo ao progresso.</div>';

        } else if (nivel == "basico") {
             view = '<div>*Básico:</br>Você já poderá formar e entender questões simples.</div>';

        } else if (nivel == "elementar") {
            view = '<div>*Elementar:</br>Você poderá entender simples artigos de jornal. Escrever cartas e fazer declarações espontâneas não são problemas.</div>';

        } else if (nivel == "intermediario") {
           view = '<div>*Intermediário:</br>Você já terá conhecimento prévio detalhado de gramática e vocabulário.</div>';

        } else if (nivel == "avancado") {
            view = '<div>*Avançado:</br>Você tem um conhecimento grande do idioma. Você poderá apresentar tópicos específicos e conversar em quase quaisquer assuntos.</div>';

        } else if (nivel == "fluente") {
            view = '<div>*Fluente:</br>Você terá técnicas especiais de vocabulário e gramática. Você poderá se comunicar em alto nível.</div>';

        } else if (nivel == "academico") {
            view = '<div>*Acadêmico:</br>Você terá o perfeito conhecimento de vocabulário e gramática. Você poderá se comunicar quase como um falante nativo.</div>';

        } else {
            view = '<div></div>';
            $(".success-disabled").html(view);
        }
        $(".success-enabled").html(view);

    });

});


$('#uf').on('change', function () {
    var idUf = $('#uf').val();

    var url = "<?php echo getCitsStates(); ?>";

    console.log(idUf);
    $.ajax({
        url: url,
        type: 'POST',
        data: "id_estado=" + idUf,
        beforeSend: function () {

            $('#city').html('carregando...');
        },
        success: function (data) {

            console.log(data);
            $('#city').html(data);
        },
        error: function (data) {
            $('#city').html('Erro ao carregar!');
        }


    });


});