<?php


namespace Source\App;


use CoffeeCode\Router\Router;
use CoffeeCode\Optimizer\Optimizer;


abstract class Controller {

    /* @var Router */
    protected $router;

    /* @var Optimizer */
    protected $seo;

    /**
     * Controller constructor.
     * @param $router
     */
    public function __construct($router){
        $this->router = $router;

        $this->seo = new Optimizer();
        $this->seo->openGraph(site("name"),site("locale"),"article")
            ->publisher(SOCIAL["facebook_page"], SOCIAL["facebook_author"])
            ->twitterCard(SOCIAL["twitter_creator"],SOCIAL["twitter_site"],SITE["domain"])
            ->facebook(SOCIAL["facebook_appId"]);
    }

    /**
     * @param string $param
     * @param array $values
     * @return string
     */
    public function ajaxResponse(string $param, array $values):string {
        return json_encode([$param => $values]);
    }


}