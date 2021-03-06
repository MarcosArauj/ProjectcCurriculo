<?php

$minCSS = new \MatthiasMullie\Minify\CSS();
$minCSS->add(dirname(__DIR__,2).'/views/assets/bootstrap4/dist/css/bootstrap.min.css');
$minCSS->add(dirname(__DIR__,2).'/views/assets/css/load.css');
$minCSS->add(dirname(__DIR__,2).'/views/assets/css/message.css');
$minCSS->add(dirname(__DIR__,2).'/views/assets/css/style.css');
$minCSS->add(dirname(__DIR__,2).'/views/assets/css/dashboard.css');
$minCSS->add(dirname(__DIR__,2).'/views/assets/css/dashboard.css');
//$minCSS->add(dirname(__DIR__,2).'/views/assets/select2/dist/css/select2.min.css');
$minCSS->minify(dirname(__DIR__,2).'/views/assets/css/style.min.css');

$minJS = new \MatthiasMullie\Minify\JS();
$minJS->add(dirname(__DIR__,2).'/views/assets/js/jquery.js');
$minJS->add(dirname(__DIR__,2).'/views/assets/js/jquery-ui.js');
$minJS->add(dirname(__DIR__,2).'/views/assets/js/usefulFunctions.js');
$minJS->add(dirname(__DIR__,2).'/views/assets/js/validation.js');
$minJS->add(dirname(__DIR__,2).'/views/assets/js/mask.js');
//$minJS->add(dirname(__DIR__,2).'/views/assets/select2/dist/js/select2.min.js');
$minJS->minify(dirname(__DIR__,2).'/views/assets/js/scripts.min.js');

