
jQuery(document).ready(function($) {

//------------------ Valida Email no Formulário ------------------- ///
    $('#campo_email').on("input", function (e) {
        e.preventDefault();
        let email = $('#campo_email').val();
        let validarEmail = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;

        if(validarEmail.test(email) == false) {
            $('#email').attr("class"," has-error");
            $('#upemail').attr("class"," has-error col-md-6");
            $('#mesmeail').attr("class", "error-enabled");
        } else {
            $('#email').attr("class","has-success");
            $('#upemail').attr("class","has-success col-md-6");
            $('#mesmeail').attr("class", "error-disabled");
        }
    });

//------------------------- Verifica campo Email e Confirma Email--------------------- ///
    $("#cad_email").on("input", function (e) {
        e.preventDefault();
        let campo_email = $('#campo_email').val();
        let confirmaemail = $('#confirmaemail').val();

        if(campo_email == confirmaemail) {
            $('#email').attr("class","has-success");
            $('#confirma_email').attr("class", "has-success");
            $('#mesmeail_conf').attr("class", "error-disabled");
        } else {
            $('#confirma_email').attr("class", "has-error");
            $('#mesmeail_conf').attr("class", "error-enabled");
        }
    });

//------------------------- Verifica campo Senhas--------------------- ///

    $("#cad_senha").on("input", function (e) {
        e.preventDefault();
        let senha = $('#senha').val();
        let confirma_senha = $('#confirma_senha').val();
        let atual_senha = $('#senhatual').val();

        if(senha == confirma_senha) {
            $('#div_confsenha').attr("class","has-success");
            $('#div_senha').attr("class", "has-success");
            $('#mesenha_conf').attr("class", "error-disabled");
        } else {
            $('#div_confsenha').attr("class","has-error");
            $('#div_senha').attr("class", "has-error");
            $('#mesenha_conf').attr("class", "error-enabled");
        }

        if(senha != atual_senha) {
            $('#mesenha_atual').attr("class", "error-disabled");

        } else {
            $('#mesenha_atual').attr("class", "error-enabled");
        }

    });

});
