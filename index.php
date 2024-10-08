<!DOCTYPE html>
<html lang="fr">

<?php
include("includes/head.php");
?>

<body>
    <h1 class="ml1">
        <span class="text-wrapper">
            <span class="line line1"></span>
            <span class="letters">EASY-CLOTHING</span>
            <span class="line line2"></span>
        </span>
    </h1>
    <?php
    include("includes/header.php");
    ?>
    <main>
        <section id="#S1">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <section id="#S2">
            <div class="card">
                <article>
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, quaerat.</p>
                    </blockquote>
                    <figure>
                        <img src="image/701d72933cb740b89850bdc49330d701.webp" alt="">
                        <figcaption>
                            <small>Lorem ipsum dolor sit amet consectetur.</small>
                            <div class="shop_icon">
                                <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href=""><i class="fa-regular fa-heart"></i></a>
                                <a href=""><i class="fa-solid fa-share-nodes"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
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