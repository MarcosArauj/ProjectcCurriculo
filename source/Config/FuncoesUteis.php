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
        return " - " . $user->getprimeiro_nome();
    }


}

function getCitsStates() {

    $results = StatesCity::listCitys($_POST['id_estado']);

    foreach ($results as $citys) {
        echo '<option>' . $citys["id_cidade"] . '</option>';
    }


}

