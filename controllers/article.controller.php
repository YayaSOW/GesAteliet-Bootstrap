<?php

require_once ("../model/article.model.php");
require_once ("../model/categorie.model.php");
require_once ("../model/type.model.php");
require_once ("../core/Controller.php");
class ArticleController extends Controller
{
    private ArticleModel $articleModel;
    private TypeModel $typeModel;
    private CategorieModel $categorieModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel;
        $this->typeModel = new TypeModel;
        $this->categorieModel = new CategorieModel;
        $this->load();
    }
    public function load()
    {
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste-article") {
                $this->listerArticle();
            } elseif ($_REQUEST["action"] == "form-article") {
                $this->chargerFormulaire();
            } elseif ($_REQUEST["action"] == "save-article") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["btnSave"]);
                $this->store($_REQUEST);
                $this->redirectToRoute("controller=article&action=liste-article");
            } elseif ($_REQUEST["action"] == "modifier-article") {
                $articles = $this->articleModel->findById($_REQUEST["id"]);
                extract($articles);
                // var_dump($articles);
                $categories = $this->categorieModel->findAll();
                $types = $this->typeModel->findAll();
                require_once ("../views/articles/update.html.php");
            } elseif ($_REQUEST["action"] == "valide-update-article") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["btnSave"]);
                var_dump($_REQUEST);
                $this->change(intval($_REQUEST["id_article"]), $_REQUEST);
                $this->redirectToRoute("controller=article&action=liste-article");
            } elseif ($_REQUEST["action"] == "supprimer-article") {
                $this->supprimer($_REQUEST["id"]);
                $this->redirectToRoute("controller=article&action=liste-article");
            }
        } else {
            $this->listerArticle();
        }
    }
    private function listerArticle(): void
    {
        $this->renderView(
            "../views/articles/liste",
            ["articles" => $this->articleModel->findAll()]
        );
    }
    private function chargerFormulaire(): void
    {
        $this->renderView("../views/articles/form", [
            "categories" => $this->categorieModel->findAll(),
            "types" => $this->typeModel->findAll()
        ]);
    }

    private function store(array $articles): void
    {
        $this->articleModel->save($articles);
    }

    private function change(int $id, array $articles)
    {
        // $this->renderView("../views/articles/update",
        // ["articles"=> $this->articleModel->findById($id)]);
        $this->articleModel->update1($id, $articles);

    }
    private function supprimer(int $id)
    {
        $this->articleModel->delete($id);
    }
}

?>