<?php

use Source\Models\Login;
use Source\Models\User;
use Source\Models\Contact;

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

    $user = Login::getFromSession();

    $name_user = $user->getprimeiro_nome();

    if ($name_user == null ){

        return " Olá ";
    } else {
        return $name_user;
    }


}

function checkCurriculum() {

    $user = Login::getFromSession();

    $curriculum = new \Source\Models\Curriculum();

    return $curriculum->checkCurriculum($user->getid_usuario());

}

function getCitsStates() {

    $results = Contact::listCitys($_POST['id_estado']);

    foreach ($results as $citys) {
        echo '<option>' . $citys["id_cidade"] . '</option>';
    }

}

function formatDate($date){

    return date('d/m/Y',strtotime($date));

}

function formatCpf($cpf){

    $parte_um     = substr($cpf, 0, 3);
    $parte_dois   = substr($cpf, 3, 3);
    $parte_tres   = substr($cpf, 6, 3);
    $parte_quatro = substr($cpf, 9, 2);

    $cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";

    return $cpf;

}

/**
 * DIAS ENTRE 02 DATAS
 * @author Norberto ALcântara
 * @copyright (c) Célula Nerd, 2019
 *
 * @param type $initial_date
 * @return type
 */
function daysDates($initial_date) {

    $final_data = date("d/m/Y");
    $difference = strtotime($final_data) - strtotime($initial_date);
    $days = floor($difference / (60 * 60 * 24));

    return $days;
}

//--- Calcula Idade
function calculateAge($birth_date){

    // separando yyyy, mm, ddd
    list($year_diff, $month_diff, $day_diff) = explode('-', $birth_date);

    // data atual
    $today = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $birth = mktime( 0, 0, 0, $month_diff, $day_diff, $year_diff);

    // cálculo
    $age = floor((((($today - $birth) / 60) / 60) / 24) / 365.25);

    return $age;
}



