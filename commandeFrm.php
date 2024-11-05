<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("includes/head.php");
?>

<body>
    <?php
    include("includes/logo.php");
    ?>
    <main>
        <section id="S3">
            <?php
            if (isset($_SESSION['validAuth'])) {
            ?>
                <article id="comInfos">
                    <fieldset id="comInfosField">
                        <legend><span>C</span>ommande <span>p</span>our</legend>
                        <ul>
                            <li>
                                <p><span>Nom:</span> <?= $_SESSION['first_name'] ?? 'Nom non défini' ?></p>
                            </li>
                            <li>
                                <p><span>Prénom:</span> <?= $_SESSION['last_name'] ?? 'Prénom non défini' ?></p>
                            </li>
                            <li>
                                <p><span>Adresse:</span> <?= $_SESSION['adresse'] ?? 'Adresse non définie' ?></p>
                            </li>
                            <li>
                                <p><span>Tel:</span> <?= $_SESSION['phone_number'] ?? 'Téléphone non défini' ?></p>
                            </li>
                        </ul>
                    </fieldset>
                </article>
                <article id="comInfos">
                    <?php
                    $total = 0;
                    if (isset($_SESSION['panier']) && is_array($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                        foreach ($_SESSION['panier'] as $produit) {
                            if (is_array($produit)) {
                                $total += $produit['price_produit'];
                    ?>
                                <fieldset id="comInfosField">
                                    <legend><span><?= htmlspecialchars($produit['name_produit']) ?></span></legend>
                                    <ul>
                                        <li>
                                            <p><span>Marque:</span> <?= htmlspecialchars($produit['marque_produit']) ?></p>
                                        </li>
                                        <li>
                                            <img src="image/imgproduit/<?= htmlspecialchars($produit['number_produit']) ?>" style="max-height:25vh; max-width:20vw;">
                                        </li>
                                        <li>
                                            <p><span>Catégorie:</span> <?= htmlspecialchars($produit['categorie_produit']) ?></p>
                                        </li>
                                        <li>
                                            <p><span>Genre:</span> <?= htmlspecialchars($produit['genre_produit']) ?></p>
                                        </li>
                                        <li>
                                            <p class="tarif"><span>Prix:</span> <?= number_format($produit['price_produit'], 2, ',', '') . " €" ?></p>
                                        </li>
                                    </ul>
                                </fieldset>
                    <?php
                            }
                        }
                    }
                    ?>
                </article>
                <p id="totalPrice"><span>T</span>otal : <?= number_format($total, 2, ',', '') . " €" ?></p>
                <br>
                <form action="backend/charge.php" method="POST" id="payment-form">
                    <input type="text" name="f_name" value="<?= htmlspecialchars($_SESSION['first_name'] ?? '') ?>">
                    <input type="text" name="l_name" value="<?= htmlspecialchars($_SESSION['last_name'] ?? '') ?>">
                    <br>
                    <div id="card-element"></div>
                    <div id="card-error" role="alert"></div>
                    <br>
                    <input type="hidden" name="amount" value="<?= htmlspecialchars($total) ?>">
                    <br>
                    <button type="submit">Payer</button>
                </form>
            <?php
            } else {
                echo "<p>Utilisateur non authentifié.</p>";
            }
            ?>
            <br>
            <div class="retour_wrapper">
                <a href="index.php"><i class="fa-solid fa-arrow-left"></i><span>R</span>etour</a>
            </div>
        </section>
    </main>
    <?php
    include("includes/footer.php");
    include("includes/scriptAddon.php");
    ?>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="backend/appComm.js"></script>
</body>

</html>