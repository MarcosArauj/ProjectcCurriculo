<?php


namespace Source\App;


use Source\App\Pages\PageError;

class ErrorController extends Controller {

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function error(array $data):void{


        $error = filter_var($data["errcode"],FILTER_VALIDATE_INT);

        $head = $this->seo->optimize(
            "Erro {$error} |". site("name"),
            site("desc"),
            $this->router->route("error.error", ["errcode" =>$error]),
            routeImage($error)
        )->render();

        echo $this->view->render("theme/error/error",[
            "head" =>$head,
            "error" => $error
        ]);

    }
}