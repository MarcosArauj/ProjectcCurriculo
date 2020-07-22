<?php

use Source\Models\User;
use Source\Models\StatesCity;


function saudacao() {

    return "Bem Vindo";
}

function removeMaskCpf($cpf) {
    // Elimina possivel mascara
    $cpf = preg_replace("/[^0-9]/", "", $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    return $cpf;
}

function getNameUser() {

    $user = User::getFromSession();

    $name_user = $user->getprimeiro_nome();

    if ($name_user == null ){

        return " - " . saudacao();
    } else {
        return $user->getprimeiro_nome();
    }


}


function checkCurriculum() {

    $user = User::getFromSession();

    return \Source\Models\Curriculum::checkCurriculum($user->getid_usuario());

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

