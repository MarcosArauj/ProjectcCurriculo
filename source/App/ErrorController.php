<?php


namespace Source\App;


use Source\App\Pages\PageError;

class ErrorController extends Controller {

    public function __construct($router)
    {
        parent::__construct($router);

        if (!empty($_SESSION["user"])) {
            $this->router->redirect("curriculum.web");
        }
    }

    public function error(array $data):void{

        $error = filter_var($data["errcode"],FILTER_VALIDATE_INT);

        $page = new PageError(
            [
                "header"=>false,
                "footer"=>false
            ]
        );

        $page->setTpl("error", array(
            "error"=> $data["errcode"]
        ));

    }
}