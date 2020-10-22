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
$router->get("/search/curriculum", "SearchController:searchCurriculum","web.searchCurriculum");
$router->get("/search/curriculum/error", "SearchController:searchErrorCurriculum","web.searchErrorCurriculum");
$router->get("/curriculum/{cod_curriculo}", "WebController:shareCurriculum","web.shareCurriculum");
$router->get("/curriculum/pdf/{cod_curriculo}", "SearchController:pdfCurriculum","web.pdfCurriculum");
$router->get("/curriculum/{cod_curriculo}/generate_pdf", "SearchController:generatePdfCurriculum","web.generatePdfCurriculum");


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
$router->get("", "AppController:profile","app.profile");
$router->get("/dashboard", "AppController:dashboard","app.dashboard");
$router->get("/start", "AppController:start","app.start");
//------ Password -----------------//
$router->get("/password/update", "AppController:updatePassword","app.updatePassword");
$router->post("/password/update", "PersonalDataController:updatePassword","personal.updatePassword");
//------ Logout -----------------//
$router->get("/logout", "AppController:logout","app.logout");

//------ Cadastro Usuario/Curriculo -----------------//
$router->get("/personal_data/create", "AppController:savePersonalData","app.savePersonalData");
$router->get("/personal_data/update", "AppController:updatePersonalData","app.updatePersonalData");

$router->get("/contact/create", "AppController:saveContact","app.saveContact");
$router->get("/contact/update", "AppController:updateContact","app.updateContact");

$router->get("/deficiency/create", "AppController:saveDeficiency","app.saveDeficiency");
$router->get("/deficiency/update", "AppController:updateDeficiency","app.updateDeficiency");

$router->get("/formation/create", "AppController:saveAcademicFormation","app.saveAcademicFormation");
$router->get("/formation/update", "AppController:updateAcademicFormation","app.updateAcademicFormation");

$router->get("/other_courses", "AppController:otherCourses","app.otherCourses");
$router->get("/other_courses/create", "AppController:saveOtherCourses","app.saveOtherCourses");
$router->get("/{id_cursos}/other_courses/update", "AppController:updateOtherCourses","app.updateOtherCourses");
$router->get("/{id_cursos}/other_courses/detail", "AppController:detailOtherCourses","app.detailOtherCourses");

$router->get("/languages", "AppController:languages","app.languages");
$router->get("/languages/create", "AppController:saveLanguages","app.saveLanguages");
$router->get("/{id_idiomac}/languages/update", "AppController:updateLanguages","app.updateLanguages");

$router->get("/professional_experience", "AppController:professional","app.professional");
$router->get("/professional_experience/create", "AppController:saveProfessional","app.saveProfessional");
$router->get("/{id_profissional}/professional_experience/update", "AppController:updateProfessional","app.updateProfessional");
$router->get("/{id_profissional}/professional_experience/detail", "AppController:detailProfessional","app.detailProfessional");

$router->get("/curriculum/create", "AppController:saveCurriculum","app.saveCurriculum");
$router->get("/curriculum/check", "AppController:checkCurriculum","app.checkCurriculum");


/**
 * Rotas de Cadastro Usuario/Curriculo
 */
$router->group("/curriculum");
$router->post("/personal_data/create", "PersonalDataController:savePersonalData","personal.savePersonalData");
$router->post("/personal_data/update", "PersonalDataController:updatePersonalData","personal.updatePersonalData");
$router->post("/personal_data/photo", "PersonalDataController:savePhoto","personal.savePhoto");

$router->post("/contact/create", "PersonalDataController:saveContact","personal.saveContact");
$router->post("/contact/update", "PersonalDataController:updateContact","personal.updateContact");

$router->post("/deficiency/create", "PersonalDataController:saveDeficiency","personal.saveDeficiency");

$router->post("/formation/create", "FormationController:saveAcademicFormation","formation.saveAcademicFormation");

$router->post("/other_courses/create", "FormationController:saveOtherCourses","formation.saveOtherCourses");
$router->post("/{id_cursos}/other_courses/update", "FormationController:updateOtherCourses","formation.updateOtherCourses");
$router->get("/{id_cursos}/other_courses/delete", "FormationController:deleteOtherCourses","formation.deleteOtherCourses");

$router->post("/languages/create", "FormationController:saveLanguages","formation.saveLanguages");
$router->post("/{id_idiomac}/languages/update", "FormationController:updateLanguages","formation.updateLanguages");
$router->get("/{id_idiomac}/languages/delete", "FormationController:deleteLanguages","formation.deleteLanguages");
$router->post("/new_languages", "FormationController:createLanguage","formation.createLanguage");

$router->post("/professional_experience/create", "ProfessionalController:saveProfessional","professional.saveProfessional");
$router->post("/{id_profissional}/professional_experience/update", "ProfessionalController:updateProfessional","professional.updateProfessional");
$router->get("/{id_profissional}/professional_experience/delete", "ProfessionalController:deleteProfessional","professional.deleteProfessional");

$router->post("/curriculum/create", "CurriculumController:saveCurriculum","curriculum.saveCurriculum");
$router->get("/curriculum/delete", "CurriculumController:deleteCurriculum","curriculum.deleteCurriculum");
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