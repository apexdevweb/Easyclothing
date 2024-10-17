<?php
require("../backend/database.php");
$affiche_men = $bdd->prepare("SELECT * FROM produits WHERE genre_produit = :homme");
$affiche_men->execute(['homme' => 'homme']); // Associer le paramètre :homme à la valeur 'homme'
?>
<section id="card_container">
    <?php
    foreach ($affiche_men as $men_prod) {
    ?>
        <div class="card">
            <article>
                <a href="produit.php?id=<?= $men_prod['id_produit'] ?>"><?= $men_prod['name_produit'] ?></a>
                <figure>
                    <img src="image/imgproduit/<?= $men_prod['number_produit'] ?>" alt="">
                    <figcaption>
                        <small><?= $men_prod['marque_produit'] ?></small>
                        <small><?= $men_prod['price_produit'] . " " . "€" ?></small>
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
</section>