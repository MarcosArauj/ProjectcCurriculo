<?php


namespace Source\App;


use Mpdf\Mpdf;
use Source\App\Pages\PageWeb;
use Source\Models\Curriculum;
use Source\Models\Formation;
use Source\Models\Professional;
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

    public function pdfCurriculum($data):void {

        $page = new PageWeb();

        $curriculum = new Curriculum();
        $formation = new Formation();
        $professional = new Professional();

        $curriculum->getCurriculumCod($data['cod_curriculo']);

        $page->setTpl("pdf", array(
            "title" => site("name"). " | " . $curriculum->getprimeiro_nome(),
            "curriculum" => $curriculum->getValues(),
            "courses"=>$formation->getOtherCoursesUser($curriculum->getid_usuario()),
            "languages"=>$formation->getLanguagesUser($curriculum->getid_usuario()),
            "professional"=>$professional->getExProfessionalUser($curriculum->getid_usuario())

        ));
    }

    public function generatePdfCurriculum($data):void {

        $pdf = new \Mpdf\Mpdf(["orientation" => "P"]);

        $curriculum = new Curriculum();

        $curriculum->getCurriculumCod($data['cod_curriculo']);

        $html = file_get_contents($this->router->route("web.pdfCurriculum" , ["cod_curriculo" => $data['cod_curriculo']]));

        $pdf->WriteHTML($html);

        $pdf->Output("curruculo_". strtolower($curriculum->getprimeiro_nome()).".pdf","D");
        return;

      //  $pdf->Output();

    }

}