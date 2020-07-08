<?php
ob_start();

session_start();

require __DIR__. '/../vendor/autoload.php';

use CoffeeCode\Router\Router;

$router  = new Router(site());
/**
 * Namespace APP
 */
$router->namespace("Source\App");

/**
 * Home
 */
$router->group(null);
$router->get("/", "WebController:home","web.home");
$router->get("/register", "WebController:register","web.register");
$router->get("/login", "WebController:login","web.login");

/**
 * Auth
 */

$router->group(null);
$router->post("/register", "AuthController:register","auth.register");
$router->post("/login", "AuthController:login","auth.login");

/**
 * User/Profile
 */

$router->group("/user");
$router->get("", "AppController:start","app.start");
$router->get("/personal_data", "AppController:personalDataSave","app.personalDataSave");
$router->get("/contact", "AppController:contactSave","app.contactSave");
$router->get("/formation", "AppController:academicFormation","app.academicFormation");
$router->get("/logout", "AppController:logout","app.logout");

/**
 * Curriculo
 */

$router->group("/curriculum");
$router->post("/personal_data", "CurriculumController:personalDataSave","curriculum.personalDataSave");
$router->post("/contact", "CurriculumController:contactSave","curriculum.contactSave");
$router->post("/formation", "CurriculumController:academicFormation","curriculum.academicFormation");
$router->get("/getCitsStates", "HelpersController:getCitsStates","curriculum.getCitsStates");


/**
 * ERROR
 */
$router->group("ops");
$router->get("/{errcode}", "ErrorController:error","error.error");

/**
 * ROUTE PROCESS
 */

$router->dispatch();

/**
 * ERROR PROCESS
 */
if ($router->error()) {
    $router->redirect("error.error", ["errcode" => $router->error()]);
}

ob_end_flush();