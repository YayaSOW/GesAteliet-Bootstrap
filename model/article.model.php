<?php
class ArticleModel
{
    public function findAll(): array
    {
        //Connecter a la BD
        $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
        $username = "root";
        $password = "";
        try {
            $dbn = new PDO($dsn, $username, $password);
            $sql = "SELECT * FROM `article` a, type t, categorie c WHERE a.typeId=t.id and a.categorieId=c.id";
            // use the connection here
            $stm = $dbn->query($sql);
            // fetch all rows into array, by default PDO::FETCH_BOTH is used
            // $rows = $stm->fetch(PDO::FETCH_NUM);
            // $rows = $stm->fetch(PDO::FETCH_ASSOC);
            // $rows = $stm->fetch(PDO::FETCH_BOTH);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
        //PDO
        //Executer la requete
        //Recuperer les donnees
    }

    //     public function save(array $articles): int
// {
//     $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
//     $username = "root";
//     $password = "";
//     try {
//         $dbn = new PDO($dsn, $username, $password);
//         $libelle = $articles['libelle'];
//         $qteStock = $articles['qteStock'];
//         $prixAppro = $articles['prixAppro'];
//         $typeId = $articles['typeId'];
//         $categorieId = $articles['categorieId'];
//         // Vérifier si typeId existe dans la table type
//         // $stmt = $dbn->prepare("SELECT COUNT(*) FROM type WHERE id = :typeId");
//         // $stmt->bindParam(':typeId', $typeId);
//         // $stmt->execute();
//         // if ($stmt->fetchColumn() == 0) {
//         //     throw new Exception("typeId $typeId does not exist in the type table.");
//         // }
//         // // Vérifier si categorieId existe dans la table categorie    
//         // $stmt = $dbn->prepare("SELECT COUNT(*) FROM categorie WHERE id = :categorieId");
//         // $stmt->bindParam(':categorieId', $categorieId);
//         // $stmt->execute();
//         // if ($stmt->fetchColumn() == 0) {
//         //     throw new Exception("categorieId $categorieId does not exist in the categorie table.");
//         // }
//         $sql = "INSERT INTO `article` (`libelle`, `qteStock`, `prixAppro`, `typeId`, `categorieId`) VALUES (:libelle, :qteStock, :prixAppro, :typeId, :categorieId)";
//         $stmt = $dbn->prepare($sql);
//         $stmt->bindParam(':libelle', $libelle);
//         $stmt->bindParam(':qteStock', $qteStock);
//         $stmt->bindParam(':prixAppro', $prixAppro);
//         $stmt->bindParam(':typeId', $typeId);
//         $stmt->bindParam(':categorieId', $categorieId);
//         return $stmt->execute();
//     } catch (PDOException $e) {
//         echo "Erreur de Connexion: " . $e->getMessage();
//     } catch (Exception $e) {
//         echo "Erreur: " . $e->getMessage();
//     }
// }
    public function save(array $articles): int
    {
        //Connecter a la BD
        $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
        $username = "root";
        $password = "";
        try {
            $dbn = new PDO($dsn, $username, $password);
            extract($articles);
            var_dump($articles);
            var_dump($libelle);
            $sql = "INSERT INTO `article` (`libelle`, `qteStock`, `prixAppro`, `typeId`, `categorieId`) VALUES (:libelle, :qteStock, :prixAppro, :typeId, :categorieId)";
            $stmt = $dbn->prepare($sql);
            $stmt->bindParam(':libelle', $libelle);
            $stmt->bindParam(':qteStock', $qteStock);
            $stmt->bindParam(':prixAppro', $prixAppro);
            $stmt->bindParam(':typeId', $typeId);
            $stmt->bindParam(':categorieId', $categorieId);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
        //PDO
        //Executer la requete
        //Recuperer les donnees
    }
    public function findById(int $id): array
    {
        //Connecter a la BD
        $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
        $username = "root";
        $password = "";
        try {
            $dbn = new PDO($dsn, $username, $password);
            $sql = "SELECT a.*, c.nomCategorie, t.nomType
                    FROM article a
                    JOIN categorie c ON a.categorieId = c.id
                    JOIN type t ON a.typeId = t.id  
                    WHERE a.id_article = :id";
            $stm = $dbn->prepare($sql);
            $stm->bindParam(':id', $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }
    // public function findById(int $id):array
    // {
    //     //Connecter a la BD
    //     $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    //     $username = "root";
    //     $password = "";
    //     try {
    //         $dbn = new PDO($dsn, $username, $password);
    //         // extract($articles);
    //         // var_dump($articles);
    //         // var_dump($libelle);
    //         $sql = "SELECT * FROM `article` WHERE `id_article` = $id";
    //         // $sql = "SELECT * FROM `article` a, type t, categorie c WHERE $id=t.id and $id=c.id";
    //         $stm = $dbn->query($sql);
    //         $articles = $stm->fetchAll(PDO::FETCH_ASSOC);
    //         // var_dump($articles);
    //         // $articles = [
    //         //     'id_article' => $articles[0]['id_article'],
    //         //     'libelle' => $articles[0]['libelle'],
    //         //     'qteStock' => $articles[0]['qteStock'],
    //         //     'prixAppro' => $articles[0]['prixAppro'],
    //         //     'typeId' => $articles[0]['typeId'],
    //         //     'categorieId' => $articles[0]['categorieId']
    //         // ];
    //         // extract($articles);
    //         var_dump($articles);
    //         return $articles;
    //     } catch (PDOException $e) {
    //         echo "Erreur de Connexion: " . $e->getMessage();
    //     }
    // }

    public function update(int $id,array $articles)
    {
        //Connecter a la BD
        $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
        $username = "root";
        $password = "";
        try {
            $dbn = new PDO($dsn, $username, $password);
            extract($articles);
            // var_dump($articles);
            var_dump($libelle);
            $sql = "UPDATE `article` SET `libelle` = ':libelle', `qteStock` = ':qteStock',`prixAppro` = ':prixAppro', `typeId` = ':typeId', `categorieId` = ':categorieId' WHERE `article`.`id_article` = :id";
            $stmt = $dbn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':libelle', $libelle);
            $stmt->bindParam(':qteStock', $qteStock);
            $stmt->bindParam(':prixAppro', $prixAppro);
            $stmt->bindParam(':typeId', $typeId);
            $stmt->bindParam(':categorieId', $categorieId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }
    public function update1(int $id, array $articles)
{
    //Connecter a la BD
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        extract($articles);
        // var_dump($articles);
        $sql = "UPDATE `article` SET `libelle` = :libelle, `qteStock` = :qteStock, `prixAppro` = :prixAppro, `typeId` = :typeId, `categorieId` = :categorieId WHERE `article`.`id_article` = :id";
        $stmt = $dbn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':qteStock', $qteStock);
        $stmt->bindParam(':prixAppro', $prixAppro);
        $stmt->bindParam(':typeId', $typeId);
        $stmt->bindParam(':categorieId', $categorieId);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}
    public function delete(int $id): int{
        $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
        $username = "root";
        $password = "";
        try {
            $dbn = new PDO($dsn, $username, $password);
            $sql = "DELETE FROM article WHERE `article`.`id_article` = $id";
            $stmt = $dbn->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }
}
?>