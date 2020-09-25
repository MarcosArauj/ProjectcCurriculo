<?php
ob_start();


header("Pragma: no-cache");
header("Cache: no-cache");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 25 Jan 2020 05:00:00 GMT"); // Date in the past
// Rotas
require __DIR__.'/source/routes.php';


