<?php
session_start();
require("backend/users/login.php");
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
        <div class="container">
            <div class="A"><img src="image/701d72933cb740b89850bdc49330d701.webp"></div>
            <div class="E"><img src="image/cb7d558bf73f4b40b44baf29ee52b793.webp"></div>
            <div class="F"><img src="image/cb7d558bf73f4b40b44baf29ee52b793.webp"></div>
            <div class="G"><img src="image/cb7d558bf73f4b40b44baf29ee52b793.webp"></div>
        </div>
        <br>
        <div class="shop_icon">
            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
            <a href=""><i class="fa-regular fa-heart"></i></a>
            <a href=""><i class="fa-solid fa-share-nodes"></i></a>
        </div>
        <br>
        <a href="index.php">Retour</a>
    </main>
    <?php
    include("includes/footer.php");
    include("includes/scriptAddon.php");
    ?>
</body>

</html>