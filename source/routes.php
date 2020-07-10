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
$router->get("/personal_data", "AppController:savePersonalData","app.personalData");
$router->get("/contact", "AppController:saveContact","app.saveContact");
$router->get("/formation", "AppController:saveAcademicFormation","app.saveAcademicFormation");
$router->get("/other_courses", "AppController:saveOtherCourses","app.saveOtherCourses");
$router->get("/languages", "AppController:saveLanguages","app.saveLanguages");
$router->get("/logout", "AppController:logout","app.logout");

/**
 * Curriculo
 */

$router->group("/curriculum");
$router->post("/personal_data", "CurriculumController:savePersonalData","curriculum.savePersonalData");
$router->post("/contact", "CurriculumController:saveContact","curriculum.saveContact");
$router->post("/formation", "CurriculumController:saveAcademicFormation","curriculum.saveAcademicFormation");
$router->post("/other_courses", "CurriculumController:saveOtherCourses","curriculum.saveOtherCourses");
$router->post("/languages", "CurriculumController:saveLanguages","curriculum.saveLanguages");
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