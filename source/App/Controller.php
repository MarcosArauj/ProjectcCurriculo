<?php


namespace Source\App;


use CoffeeCode\Router\Router;
use CoffeeCode\Optimizer\Optimizer;


/**
 * Class Controller
 * @package Source\App
 */
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