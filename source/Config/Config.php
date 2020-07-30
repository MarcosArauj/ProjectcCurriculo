<?php

date_default_timezone_set('America/Sao_Paulo');

define("SITE", [
    "name" => "WC",
    "name_complete" =>"Web Curriculo",
    "desc" => "Sistema WebController Curriculo",
    "domain" => "curriculotcc.com.br",
    "locale" => "pt_BR",
    "root" => "http://curriculotcc.com.br",
    "version"=>"1.0"
]);

/*
 *  SITE MINIFY
 */

if($_SERVER["SERVER_NAME"] == "localhost") {
    require __DIR__ . "/Minify.php";
}


define("MAIL_RECOVER", [
    "host" => "smtp.hostinger.com.br",
    "port" => "587",
    "user" => "webcurriculo@cruzm.com.br",
    "passwd" => "Web251723",
    "from_name" => "Web Curriculo",
    "from_email" => "webcurriculo@cruzm.com.br"

]);

/*
 * SOCIAL CONFIG
 */

define("SOCIAL",[
    "facebook_page" => "maraujocruz",
    "facebook_author" => "marcosaraujocruz2",
    "facebook_appId" => "123456789464",
    "twitter_creator" => "maraujocruz",
    "twitter_site" => "maraujocruz",
]);

/*
 * MAIL CONECT
 */
define("MAIL",[]);

/*
 * SOCIAL LOGIN: FACEBOOK
 */
define("FACEBOOK_LOGIN",[]);

/*
 * SOCIAL LOGIN: GOOGLE
 */
define("GOOGLE_LOGIN",[]);


