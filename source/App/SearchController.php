<?php


namespace Source\App;


use Source\App\Pages\PageWeb;
use Source\Models\Curriculum;
use Source\Models\Formation;
use Source\Models\Search;
use Source\Models\User;

class SearchController extends Controller {

    private $data_curriculum;
    private $search_curriculo;
    private $formation;

    public function __construct($router)
    {
        parent::__construct($router);

        $this->data_curriculum = new Curriculum();
        $this->search_curriculo = new Search();
        $this->formation = new Formation();
    }

    public function searchCurriculum():void{

        $pageSearch = new PageWeb();

        $pagination = null;
        $pages = array();

        $search = (isset($_GET['search'])) ? $_GET['search'] : "";
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        if ($search) {
                $pagination = $this->search_curriculo->getPageSearch($search,$_GET['filter'], $page);

            for ($cont = 0; $cont < $pagination['pages']; $cont++) {
                array_push($pages, array(
                    'href' => '/search/curriculum?' . http_build_query(array(
                            'page' => $cont + 1,
                            'search' => $search
                        )),
                    'text' => $cont + 1
                ));
            }

            if (!$pagination['data']) {
                $this->router->redirect("web.searchErrorCurriculum");
            }

        }

        $pageSearch->setTpl("search_curriculum", array(
            "title"=> site("name_complete"),
            "lang_cad"=>$this->formation->languages(),
            "curriculum" => $pagination['data'],
            "search" => $search,
            "pages" => $pages
        ));
    }

    public function searchErrorCurriculum():void{

        $page = new PageWeb();

        $page->setTpl("error_search", array(
            "title" => site("name") ." | Erro na busca",
        ));
    }

}