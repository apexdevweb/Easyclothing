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
        <section id="#S3">
            <?php
            if (isset($_SESSION['panier']) && is_array($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                foreach ($_SESSION['panier'] as $produit) {
                    if (is_array($produit)) {
            ?>
                        <table class="com_tab">
                            <th>
                                <h4><span>M</span>arque</h4>
                            </th>
                            <th>
                                <h4><span>G</span>enre</h4>
                            </th>
                            <th>
                                <h4><span>T</span>aille</h4>
                            </th>
                            <th>
                                <h4><span>N</span>uméro</h4>
                            </th>
                            <th>
                                <h4><span>P</span>rix</h4>
                            </th>
                            <th>
                                <h4><span>Q</span>uantité</h4>
                            </th>
                            <tr>
                                <td>
                                    <p><?= $produit['marque_produit'] ?></p>
                                </td>
                                <td>
                                    <p><?= $produit['genre_produit'] ?></p>
                                </td>
                                <td>
                                    <select name="taille" id="">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </td>
                                <td>
                                    <p><?= $produit['number_produit'] ?></p>
                                </td>
                                <td>
                                    <p><?= number_format($produit['price_produit'], 2, ',', '') . " " . "€" ?></p>

                                </td>
                                <td>
                                    <input type="number" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="image/imgproduit/<?= $produit['number_produit'] ?>">
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <a href="backend/pannierScript.php?action=remove&id=<?= $produit['id_produit'] ?>">Supprimer</a>
                                </td>
                            </tr>

                        </table>
            <?php
                    }
                }
            } else {
                echo "<p style='text-align:center;font-size:1.3rem;'>" . "Votre panier est vide!" . "</p>";
            }
            ?>
            <form action="" method="POST">
                <input type="submit" value="Passer commande">
            </form>
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
</body>

</html>