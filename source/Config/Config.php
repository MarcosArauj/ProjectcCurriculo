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
//    "hostname" => "185.201.11.230",
//    "username" => "u655389713_wc",
//    "password" => "Cruz2517",
//    "dbname" => "u655389713_tb_curriculo"
//]);

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

define("MAIL_SUPPORT", [
    "host" => "smtp.gmail.com",
    "port" => "587",
    "user" => "webcurriculo.web@gmail.com",
    "passwd" => "WebCurriculo2517",
    "from_name" => "Web Curriculo",
    "from_email" => "webcurriculo.web@gmail.com"

]);

/*
 *  SITE MINIFY
 */

if($_SERVER["SERVER_NAME"] == "127.0.0.1") {
    require __DIR__ . "/Minify.php";
}



