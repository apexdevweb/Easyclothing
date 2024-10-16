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
        <section id="#S1">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="image/slide-banner/modeHA.jpg" alt="modeHA"></div>
                    <div class="swiper-slide"><img src="image/slide-banner/modeFD.jpg" alt="modeFD"></div>
                    <div class="swiper-slide"><img src="image/slide-banner/modeHB.jpg" alt="modeHB"></div>
                    <div class="swiper-slide"><img src="image/slide-banner/modeFA.jpg" alt="modeFA"></div>
                    <div class="swiper-slide"><img src="image/slide-banner/modeHC.jpg" alt="modeHC"></div>
                    <div class="swiper-slide"><img src="image/slide-banner/modeFC.jpg" alt="modeFC"></div>
                    <div class="swiper-slide"><img src="image/slide-banner/modeEA.jpg" alt="modeEA"></div>
                    <div class="swiper-slide"><img src="image/slide-banner/modeFB.jpg" alt="modeFB"></div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <br>
        <section id="#S2">
            <form method="GET" id="formS2">
                <ul id="ul_categorie">
                    <li class="li_categorie"><a href="#S2"><span>H</span>omme</a></li>
                    <li class="li_categorie"><a href="#S2"><span>F</span>emme</a></li>
                    <li class="li_categorie"><a href="#S2"><span>A</span>dos-<span>E</span>nfant</a></li>
                </ul>
                <div class="categorie_container">
                    <label for="categorie">Catégorie<i class="fa-solid fa-chevron-right"></i></label>
                    <select name="categorie" id="">
                        <option value="pull">pull</option>
                        <option value="pentalons">pentalons</option>
                        <option value="chemise">chemise</option>
                    </select>
                </div>
                <div class="marque_container">
                    <label for="Marque">Marques<i class="fa-solid fa-chevron-right"></i></label>
                    <select name="Marque" id="">
                        <option value="Nike">Nike</option>
                        <option value="Addidas">Addidas</option>
                        <option value="Dvs">Dvs</option>
                    </select>
                </div>
            </form>
            <br>
            <section id="card_container">
                <?php
                foreach ($affiche_prod as $sale_prod) {
                ?>
                    <div class="card">
                        <article>
                            <a href="produit.php?id=<?= $sale_prod['id_produit'] ?>"><?= $sale_prod['name_produit'] ?></a>
                            <figure>
                                <img src="image/imgproduit/<?= $sale_prod['number_produit'] ?>" alt="">
                                <figcaption>
                                    <small><?= $sale_prod['marque_produit'] ?></small>
                                    <small><?= $sale_prod['price_produit'] . " " . "€" ?></small>
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
        </section>
        <section id="#S3">

        </section>
    </main>

    <?php
    include("includes/footer.php");
    include("includes/scriptAddon.php");
    ?>
</body>

</html>