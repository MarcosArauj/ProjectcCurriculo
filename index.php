<?php
ob_start();

date_default_timezone_set('America/Sao_Paulo');

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 25 Jan 2020 05:00:00 GMT"); // Date in the past
// Rotas
require __DIR__.'/source/routes.php';


