<?php

use Source\Models\Login;
use Source\Models\StatesCity;

function saudacao() {

    return "Bem Vindo";
}


function getNameUser() {

    $user = Login::getFromSession();

    $name_user = $user->getprimeiro_nome();

    if ($name_user == null ){

        return " - " . saudacao();
    } else {
        return $user->getprimeiro_nome();
    }


}

function getCitsStates() {

    $results = StatesCity::listCitys($_POST['id_estado']);

    foreach ($results as $citys) {
        echo '<option>' . $citys["id_cidade"] . '</option>';
    }

}

function formatDate($data){

    return date('d/m/Y',strtotime($data));

}

function formatCpf($cpf){

    $parte_um     = substr($cpf, 0, 3);
    $parte_dois   = substr($cpf, 3, 3);
    $parte_tres   = substr($cpf, 6, 3);
    $parte_quatro = substr($cpf, 9, 2);

    $cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";

    return $cpf;

}

