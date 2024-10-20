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
        <h2 class="titreH_F_AE"><span>F</span>or <span>W</span>ommen</h2>
        <div class="bottomBordertitre"></div>
        <section id="S2">
            <div class="containerH_F_AE">
                <?php
                foreach ($affiche_fm as $card_fm) {
                ?>
                    <div class="card">
                        <article>
                            <a href="produit.php?id=<?= $card_fm['id_produit'] ?>"><?= $card_fm['name_produit'] ?></a>
                            <figure>
                                <img src="image/imgproduit/<?= $card_fm['number_produit'] ?>" alt="">
                                <figcaption>
                                    <small><?= $card_fm['marque_produit'] ?></small>
                                    <small><?= $card_fm['price_produit'] . " " . "€" ?></small>
                                    <br>
                                    <div class="shop_icon">
                                        <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                                        <a href=""><i class="fa-regular fa-heart"></i></a>
                                        <a href=""><i class="fa-solid fa-share-nodes"></i></a>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
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