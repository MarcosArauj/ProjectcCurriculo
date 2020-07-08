//------------------ Verifica Validade do CPF --------------- ///
function verifica_cpf(cpf){

    var numeros, soma, digitos, i, resultado, digitos_iguais;
    digitos_iguais = 1;

    cpf = removeMascara(cpf,".");
    cpf = removeMascara(cpf, "-");

    if (cpf.length < 11)
        return false;
    for (i = 0; i < cpf.length - 1; i++)
        if (cpf.charAt(i) != cpf.charAt(i + 1)) {
            digitos_iguais = 0;
            break;
        }
    if (!digitos_iguais) {

        numeros = cpf.substring(0,9);
        digitos = cpf.substring(9);


        soma = 0;
        for (i = 10; i > 1; i--)
            soma += numeros.charAt(10 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;
        numeros = cpf.substring(0,10);
        soma = 0;
        for (i = 11; i > 1; i--)
            soma += numeros.charAt(11 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;
        return true;
    }
    else
        return false;
}

jQuery(document).ready(function($) {

    //---------- Valida CPF no Formulario ------------------ ///
    $('#camp_cpf').on("input", function (e) {
        e.preventDefault();
        let cpf = $('#camp_cpf').val();

        if(verifica_cpf(cpf)) {
            $('#cpf').attr("class"," has-success col-md-4");
            $('#mescpf').attr("class", "error-disabled");
        } else {
            $('#cpf').attr("class","has-error col-md-4");
            $('#mescpf').attr("class", "error-enabled");
        }
    });

//------------------ Valida Email no Formulário ------------------- ///
    $('#campo_email').on("input", function (e) {
        e.preventDefault();
        let email = $('#campo_email').val();
        let validarEmail = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;

        if(validarEmail.test(email) == false) {
            $('#email').attr("class"," has-error col-md-12");
            $('#mesmeail').attr("class", "error-enabled");
        } else {
            $('#email').attr("class","has-success col-md-12");
            $('#mesmeail').attr("class", "error-disabled");
        }
    });

//------------------------- Verifica campo Email e Confirma Email--------------------- ///
    $("#cad_email").on("input", function (e) {
        e.preventDefault();
        let campo_email = $('#campo_email').val();
        let confirmaemail = $('#confirmaemail').val();

        if(campo_email == confirmaemail) {
            $('#email').attr("class","has-success col-md-12");
            $('#confirma_email').attr("class", "has-success col-md-12");
            $('#mesmeail_conf').attr("class", "error-disabled");
        } else {
            $('#confirma_email').attr("class", "has-error col-md-12");
            $('#mesmeail_conf').attr("class", "error-enabled");
        }
    });

//------------------------- Verifica campo Senhas--------------------- ///

    $("#cad_senha").on("input", function (e) {
        e.preventDefault();
        let senha = $('#senha').val();
        let confirma_senha = $('#confirma_senha').val();

        if(senha == confirma_senha) {
            $('#div_confsenha').attr("class","has-success");
            $('#div_senha').attr("class", "has-success");
            $('#mesenha_conf').attr("class", "error-disabled");
        } else {
            $('#div_confsenha').attr("class","has-error");
            $('#div_senha').attr("class", "has-error");
            $('#mesenha_conf').attr("class", "error-enabled");
        }

    });

});