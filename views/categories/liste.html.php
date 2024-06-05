<div class="container mb-5">
    <div class="card mt-5 w-75-m-auto">
        <div class="card-header">
            Liste des Categories d'Articles
        </div>
        <div class="card-body">
            <form action="<?= WEBROOT ?>" method="post">
                <div class="mb-2">
                    <label for="NomCategorie" class="form-label">Nom Categorie</label>
                    <input name="nomCategorie" type="text" class="form-control" id="NomCategorie" aria-describedby="emailHelp" required>
                </div>
                <div class="d-flex justify-content-end mb-5">
                    <input type="hidden" name="action" value="save-categorie">
                    <input type="hidden" name="controller" value="categorie">
                    <button type="submit" class="btn btn-outline-dark btn-sm">Enregister</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom Categorie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categories as $categorie):
                            ?>
                            <tr class="">
                                <td><?php echo $categorie["id"] ?></td>
                                <td><?= $categorie["nomCategorie"] ?></td>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>