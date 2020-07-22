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
 * Rotas para Telas Usuarios Não Logado
 */
$router->group(null);
$router->get("/", "WebController:home","web.home");
$router->get("/register", "WebController:register","web.register");
$router->get("/login", "WebController:login","web.login");
$router->get("/forgot", "WebController:forgot","web.forgot");
$router->get("/sent", "WebController:sent","web.sent");
$router->get("/reset", "WebController:reset","web.reset");
$router->get("/reset_success","WebController:resetSuccess","web.resetSuccess");

/**
 * Auth
 */
$router->group(null);
$router->post("/register", "AuthController:register","auth.register");
$router->post("/login", "AuthController:login","auth.login");
$router->post("/forgot", "AuthController:forgot","auth.forgot");
$router->post("/reset", "AuthController:reset","auth.reset");

/**
 * - ------------------Rotas para Telas Usuarios Logado------------------------------
 */

//------ Area de Trabalho -----------------//
$router->group("/user");
$router->get("", "AppController:start","app.start");
$router->get("/dashboard", "AppController:dashboard","app.dashboard");

//------ Cadastro Usuario/Curriculo -----------------//
$router->get("/personal_data", "AppController:savePersonalData","app.savePersonalData");
$router->get("/personal_data_update", "AppController:updatePersonalData","app.updatePersonalData");
$router->get("/contact", "AppController:saveContact","app.saveContact");
$router->get("/deficiency", "AppController:saveDeficiency","app.saveDeficiency");
$router->get("/formation", "AppController:saveAcademicFormation","app.saveAcademicFormation");
$router->get("/other_courses", "AppController:saveOtherCourses","app.saveOtherCourses");
$router->get("/languages", "AppController:saveLanguages","app.saveLanguages");
$router->get("/professional_experience", "AppController:saveProfessional","app.saveProfessional");
$router->get("/curriculum", "AppController:saveCurriculum","app.saveCurriculum");

//------ Logout -----------------//
$router->get("/logout", "AppController:logout","app.logout");

/**
 * Rotas de Cadastro Usuario/Curriculo
 */
$router->group("/curriculum");
$router->post("/personal_data", "PersonalDataController:savePersonalData","personal.savePersonalData");
$router->post("/personal_data_update", "PersonalDataController:updatePersonalData","personal.updatePersonalData");
$router->post("/contact", "PersonalDataController:saveContact","personal.saveContact");
$router->post("/deficiency", "PersonalDataController:saveDeficiency","personal.saveDeficiency");
$router->post("/formation", "FormationController:saveAcademicFormation","formation.saveAcademicFormation");
$router->post("/other_courses", "FormationController:saveOtherCourses","formation.saveOtherCourses");
$router->post("/languages", "FormationController:saveLanguages","formation.saveLanguages");
$router->post("/new_languages", "FormationController:createLanguage","formation.createLanguage");
$router->post("/professional_experience", "ProfessionalController:saveProfessional","professional.saveProfessional");
$router->post("/curriculum", "CurriculumController:saveCurriculum","curriculum.saveCurriculum");
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