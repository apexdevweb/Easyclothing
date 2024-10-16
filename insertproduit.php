<?php
require("backend/administrator/insertProduitScript.php");
$product_number = mt_rand(1000, 50000);
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("includes/head.php");
?>

<body>
    <?php
    include("includes/logo.php");
    include("includes/header.php");
    if (isset($_SESSION['validAuthAdmin'])) {
    ?>
        <main>
            <section id="section_insertion_produit">
                <fieldset>
                    <legend>Mettre un produit en vente</legend>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="text" name="nomProduit" placeholder="nom du produit" maxlength="50">
                        <label for="numeroProduit">Numéro du produit(Généré automatiquement)</label>
                        <input type="number" name="numeroProduit" value="<?= (int)$product_number ?>" maxlength="5">
                        <select name="categorieProduit">
                            <option value="" selected>catégorie de produit</option>
                            <option value="pull">Pull</option>
                            <option value="pentalon">Pentalon</option>
                            <option value="chemise">Chemise</option>
                        </select>
                        <input type="text" name="marqueProduit" placeholder="Marque du produit" maxlength="50">
                        <input type="number" name="TarifProduit" placeholder="prix en €">
                        <div class="radioContainer">
                            <label for="Homme">Homme</label>
                            <input type="radio" name="genreProduit" value="Homme">
                            <label for="Femme">Femme</label>
                            <input type="radio" name="genreProduit" value="Femme">
                            <label for="Ados-Enfant">Ados-Enfant</label>
                            <input type="radio" name="genreProduit" value="Ados-Enfant">
                        </div>
                        <label for="imgProduit">Image du produit</label>
                        <input type="file" name="imgProduit">
                        <input type="submit" name="LoadProd" value="Mettre en ligne">
                    </form>
                </fieldset>
                <br>
                <div class="retour_wrapper">
                    <a href="index.php"><i class="fa-solid fa-arrow-left"></i><span>R</span>etour</a>
                    <h4><?= isset($succesMsg) ?></h4>
                </div>
            </section>
        </main>
    <?php
        include("includes/footer.php");
        include("includes/scriptAddon.php");
    }
    ?>
</body>

</html>