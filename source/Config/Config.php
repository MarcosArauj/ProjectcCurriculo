<?php

date_default_timezone_set('America/Sao_Paulo');

define("SITE", [
    "name" => "WC",
    "name_complete" =>"Web Curriculo",
    "desc" => "Sistema Web Controle de  Curriculo",
   // "domain" => "curriculotcc.com.br",
    "domain" => "wcurriculo.cruzm.com.br",
    "locale" => "pt_BR",
    //"root" => "http://curriculotcc.com.br",
    "root" => "https://wcurriculo.cruzm.com.br",
    "version"=>"1.0"
]);

//define("DB", [
//    "hostname" => "localHost",
//    "username" => "root",
//    "password" => "",
//    "dbname" => "db_curriculo"
//]);

define("DB", [
    "hostname" => "127.0.0.1",
    "username" => "u655389713_wc",
    "password" => "Cruz2517",
    "dbname" => "u655389713_tb_curriculo"
]);


define("MAIL_RECOVER", [
    "host" => "smtp.hostinger.com.br",
    "port" => "587",
    "user" => "webcurriculo@cruzm.com.br",
    "passwd" => "Web251723",
    "from_name" => "Web Curriculo",
    "from_email" => "webcurriculo@cruzm.com.br"

]);

/*
 *  SITE MINIFY
 */

if($_SERVER["SERVER_NAME"] == "127.0.0.1") {
    require __DIR__ . "/Minify.php";
}



