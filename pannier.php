<?php
require("backend/pannierScript.php");
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
        <section id="S3">
            <?php
            include("includes/panierArticle.php");
            ?>
            <a href="#" id="panierCom" class="liens">Passer commande <i class="fa-solid fa-arrow-right"></i></a>
        </section>
        <br>
        <div class="retour_wrapper">
            <a href="index.php"><i class="fa-solid fa-arrow-left"></i><span>R</span>etour</a>
        </div>
    </main>
    <?php
    include("includes/footer.php");
    include("includes/scriptAddon.php");
    ?>
    <script type="text/javascript">
        function link_com() {
            const tablesProd = document.querySelectorAll(".com_tab");
            const commandeAffiche = document.getElementById("panierCom");
            let hasItemsInCart = false;
            // Vérifie s'il y a au moins un élément dans le panier
            for (let i = 0; i < tablesProd.length; i++) {
                let prodpanier = tablesProd[i];
                if (prodpanier) { // Vérifie si l'élément existe
                    hasItemsInCart = true;
                    break; // Si un élément est trouvé, on peut arrêter la boucle
                }
            }
            // Affiche ou cache le lien selon le contenu du panier
            if (hasItemsInCart) {
                commandeAffiche.classList.add("liens"); // Ajoute la classe pour rendre visible
            } else {
                commandeAffiche.style.display = "none";
                commandeAffiche.classList.remove("liens"); // Retire la classe pour rendre invisible
            }
        }
        link_com();
    </script>
</body>

</html>