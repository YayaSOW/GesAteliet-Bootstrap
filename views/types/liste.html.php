<div class="container mb-5">
    <div class="card mt-5 w-75-m-auto">
        <div class="card-header">
            Liste des Categories d'Articles
        </div>
        <div class="card-body">
            <form action="<?= WEBROOT ?>" method="post">
                <div class="mb-2">
                    <label for="NomType" class="form-label">Nom Type</label>
                    <input name="nomType" type="text" class="form-control" id="NomType" aria-describedby="emailHelp" required>
                </div>
                <div class="d-flex justify-content-end mb-5">
                    <input type="hidden" name="action" value="save-type">
                    <input type="hidden" name="controller" value="type">
                    <button type="submit" class="btn btn-outline-dark btn-sm">Enregister</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($types as $type):
                            ?>
                            <tr class="">
                                <td><?php echo $type["id"] ?></td>
                                <td><?= $type["nomType"] ?></td>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>