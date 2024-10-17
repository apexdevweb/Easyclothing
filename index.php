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
            <!-- trie des catégorie et genre et marques -->
            <form method="POST" id="formS2">
                <ul id="ul_categorie">
                    <li class="li_categorie"><a href="#"><span>T</span>out</a></li>
                    <li class="li_categorie"><a href="#"><span>H</span>omme</a></li>
                    <li class="li_categorie"><a href="#"><span>F</span>emme</a></li>
                    <li class="li_categorie"><a href="#"><span>A</span>dos-<span>E</span>nfant</a></li>
                </ul>
                <div class="categorie_container">
                    <label for="categorie">Catégorie<i class="fa-solid fa-chevron-right"></i></label>
                    <select name="categorie" id="categorie">
                        <option value="pull">Pull</option>
                        <option value="pantalons">Pantalons</option>
                        <option value="chemise">Chemise</option>
                    </select>
                    <button type="submit" name="cateValide"><i class="fa-solid fa-arrow-down"></i></button>
                </div>
                <div class="marque_container">
                    <label for="Marque">Marques<i class="fa-solid fa-chevron-right"></i></label>
                    <select name="marque" id="marque">
                        <option value="tommy hilfiger">Tommy Hilfiger</option>
                        <option value="quicksilver">Quicksilver</option>
                        <option value="polo">Polo</option>
                        <option value="varna">Varna</option>
                    </select>
                    <button type="submit" name="marqValide"><i class="fa-solid fa-arrow-down"></i></button>
                </div>
            </form>
            <!-- trie des catégorie et genre et marques fin-->
            <br>
            <section id="card_container">
                <?php
                foreach ($affiche_prod as $card_prod) {
                ?>
                    <div class="card">
                        <article>
                            <a href="produit.php?id=<?= $card_prod['id_produit'] ?>"><?= $card_prod['name_produit'] ?></a>
                            <figure>
                                <img src="image/imgproduit/<?= $card_prod['number_produit'] ?>" alt="">
                                <figcaption>
                                    <small><?= $card_prod['marque_produit'] ?></small>
                                    <small><?= $card_prod['price_produit'] . " " . "€" ?></small>
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
                </div>
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