
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

    $('#sim').on('click',function () {
        $('#nome_social').attr('disabled', false);
        $('#mens_social').attr("class", "success-enabled");

    });

    $('#nao').on('click',function () {
        $('#nome_social').attr('disabled', true);
        $('#mens_social').attr("class", "success-disabled");
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