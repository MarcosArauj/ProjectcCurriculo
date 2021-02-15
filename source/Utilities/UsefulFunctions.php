<?php

use Source\Models\Login;
use Source\Models\User;
use Source\Models\Contact;

function saudacao() {

    return "Bem Vindo";
}


function checkCurriculum() {

    $user = Login::getFromSession();

    $curriculum = new \Source\Models\Curriculum();

    return $curriculum->checkCurriculum($user->getid_usuario());

}

function getCodCurriculum() {

    $user = Login::getFromSession();

    $curriculum = new \Source\Models\Curriculum();

    $curriculum->getCurriculum($user->getid_usuario());

    return $curriculum->getcod_curriculo();

}

function formatDate($date){

    return date('d/m/Y',strtotime($date));

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

    $final_data = date("Y-m-d");

    $difference = strtotime($final_data) - strtotime($initial_date);
    $days = floor($difference / (60 * 60 * 24));

    return $days;
}

function lateDays($initial_date){

    return daysDates($initial_date) -2;
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



