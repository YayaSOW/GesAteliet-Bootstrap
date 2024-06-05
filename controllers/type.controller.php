<?php
require_once ("../model/type.model.php");
require_once ("../core/Controller.php");
class TypeController extends Controller
{
    private TypeModel $typeModel;
    public function __construct()
    {
        $this->typeModel = new TypeModel();
        $this->load();
    }
    public function load()
    {
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste-type") {
                $this->listerType();
            } elseif ($_REQUEST["action"] == "save-type") {
                unset($_REQUEST["action"]);
                // var_dump($_REQUEST["nomType"]);
                $this->store($_REQUEST["nomType"]);
                $this->redirectToRoute("controller=type&action=liste-type");
            }
        } else {
            $this->listerType();
        }
    }
    private function listerType(): void
    {
        // require_once("../model/article.model.php");
        // Appel Model pour charger les donnees de la table article
        // $types = $this->typeModel->findAllType();
        // require_once ("../views/types/liste.html.php");
        $this->renderView("../views/types/liste",
        ["types"=> $this->typeModel->findAll()]);

    }
    private function store(string $type): void
    {
        $this->typeModel->save($type);
    }
}
?>