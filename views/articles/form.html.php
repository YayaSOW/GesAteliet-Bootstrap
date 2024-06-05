<div class="container mb-5">
    <div class="card mt-5 w-75-m-auto">
        <div class="card-header">
            Nouvelle Article
        </div>
        <div class="card-body">
            <form action="<?=WEBROOT?>" method="post">
                <div class="mb-2">
                    <label for="Libelle" class="form-label">Libelle</label>
                    <input name="libelle" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-2">
                    <label for="QteStock" class="form-label">Qte Stock</label>
                    <input name="qteStock" type="number" class="form-control" id="QteStock" aria-describedby="emailHelp">
                </div>
                <div class="mb-2">
                    <label for="Prix" class="form-label">Prix</label>
                    <input name="prixAppro" type="number" class="form-control" id="Prix" aria-describedby="emailHelp">
                </div>
                <div class="mb-2">
                    <label for="Prix" class="form-label">Type</label>
                    <select name="typeId" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                        <option selected>...</option>
                        <?php
                        foreach ($types as $type) :
                    ?>
                        <option value="<?=$type['id']?>"><?=$type["nomType"]?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="Prix" class="form-label">Categorie</label>
                    <select name="categorieId" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                        <option selected>...</option>
                        <?php
                        foreach ($categories as $categorie) :
                    ?>
                        <option value="<?=$categorie['id']?>"><?=$categorie["nomCategorie"]?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <input type="hidden" name="action" value="save-article">
                <input type="hidden" name="controller" value="article">
                <button type="submit" name="btnSave" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>