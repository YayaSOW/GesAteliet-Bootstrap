<?php
require_once ("../model/categorie.model.php");
require_once ("../core/Controller.php");
class CategorieController extends Controller
{
    private CategorieModel $categorieModel;
    public function __construct(){
        $this->categorieModel = new CategorieModel;
        $this->load();
    }
    public function load()
    {
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste-categorie") {
                $this->listerCategorie();
            } elseif ($_REQUEST["action"] == "save-categorie") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                // var_dump($_REQUEST["nomCategorie"]);
                $this->store($_REQUEST["nomCategorie"]);
                $this->redirectToRoute("controller=categorie&action=liste-categorie");
            }
        } else {
            $this->listerCategorie();
        }
    }
    private function listerCategorie(): void
    {
        // require_once("../model/article.model.php"); views\categories\liste.html.php
        // Appel Model pour charger les donnees de la table article
        // $categories = $this->categorieModel->findAll();
        // require_once ("../views/categories/liste.html.php");
        $this->renderView("../views/categories/liste",
        ["categories"=> $this->categorieModel->findAll()]);


    }

    private function store(string $categorie): void
    {
        $this->categorieModel->save($categorie);
    }
}
?>