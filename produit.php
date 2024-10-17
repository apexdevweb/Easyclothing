<?php
require("backend/afficheProduit.php");
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
    ?>
    <main>
        <?php
        foreach ($affiche_prod as $sale_prod) {
            if ($_GET['id'] == $sale_prod['id_produit']) {

        ?>
                <div class="container">
                    <div class="A"><img src="image/imgproduit/<?= $sale_prod['number_produit'] ?>"></div>
                    <div class="E"><img src="image/cb7d558bf73f4b40b44baf29ee52b793.webp"></div>
                    <div class="F"><img src="image/cb7d558bf73f4b40b44baf29ee52b793.webp"></div>
                    <div class="G"><img src="image/cb7d558bf73f4b40b44baf29ee52b793.webp"></div>
                </div>
        <?php
            }
        }
        ?>
        <br>
        <div class="shop_icon_produit">
            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
            <a href=""><i class="fa-regular fa-heart"></i></a>
            <a href=""><i class="fa-solid fa-share-nodes"></i></a>
        </div>
        <br>
        <div class="retour_wrapper">
            <a href="index.php"><i class="fa-solid fa-arrow-left"></i><span>R</span>etour</a>
        </div>
    </main>
    <?php
    include("includes/footer.php");
    include("includes/scriptAddon.php");
    ?>
</body>

</html>