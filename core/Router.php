<?php
class Router{
    public static function run() {
        // $controller=null;
        if (isset($_REQUEST["controller"])) {
            if ($_REQUEST["controller"] == "article") {
        require_once("../controllers/article.controller.php");
        $controller = new ArticleController();
        } elseif ($_REQUEST["controller"] == "type") {
            require_once("../controllers/type.controller.php");
            $controller = new TypeController();
        }elseif ($_REQUEST["controller"] == "categorie") {
            require_once("../controllers/categorie.controller.php");
            $controller = new CategorieController();
        }
        } else {
            require_once("../controllers/article.controller.php");
            $controller = new ArticleController();
        }
    }
}
?>