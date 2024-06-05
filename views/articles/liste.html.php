<div class="container mb-5">
    <div class="card mt-5 w-75-m-auto">
        <div class="card-header">
            Liste des articles
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-2">
                <a id="" class="btn btn-outline-dark btn-sm"
                    href="<?= WEBROOT ?>/?controller=article&action=form-article" role="button">Nouveau</a>
            </div>
            <div class="table-responsive">
                <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Libelle</th>
                            <th scope="col">Qte Stock</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($articles as $article):
                            ?>
                            <tr class="">
                                <td><?php echo $article["libelle"] ?></td>
                                <td><?= $article["qteStock"] ?></td>
                                <td><?= $article["prixAppro"] ?></td>
                                <td><?= $article["nomCategorie"] ?></td>
                                <td><?= $article["nomType"] ?></td>
                                <form action="<?= WEBROOT ?>" method="post">
                                    <td>
                                        <form action="<?= WEBROOT ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="action" value="modifier-article">
                                            <button type="submit"name="id" value="<?= $article["id_article"] ?>">Edit</button>
                                        </form>
                                        <form action="<?= WEBROOT ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="action" value="supprimer-article">
                                            <button type="submit"name="id" value="<?= $article["id_article"] ?>">Delete</button>
                                        </form>
                                    </td>
                                </form>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>