<?php
class CategorieModel
{
    public function findAll(): array
    {
        $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
        $username = "root";
        $password = "";
        try {
            $dbn = new PDO($dsn, $username, $password);
            $sql = "SELECT * FROM categorie ";
            $stm = $dbn->query($sql);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }
    public function save(string $categorie): int
    {
        $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
        $username = "root";
        $password = "";
        try {
            $dbn = new PDO($dsn, $username, $password);
            // $type = $articles['libelle'];
            $sql = "INSERT INTO `categorie` (`nomCategorie`) VALUES (:categorie)";
            $stmt = $dbn->prepare($sql);
            $stmt->bindParam(':categorie', $categorie);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

}
?>