<?php


namespace Source\App;

use Source\App\Pages\PageWeb;
use Source\Models\User;

/**
 * Class WebController
 * @package Source\App
 */
class WebController extends Controller {

    public function __construct($router)
    {
        parent::__construct($router);


    }

    /**
     *
     */
    public function home():void{


        $page = new PageWeb();

        $page->setTpl("home", array(

        ));

    }

    public function register():void{

        $page = new PageWeb();

        $page->setTpl("create_user", array(

        ));

    }
    public function login():void{

        $page = new PageWeb();

        $page->setTpl("login", array(

        ));

    }





}