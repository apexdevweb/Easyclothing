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
    // include("includes/header.php");
    ?>
    <main>
        <section id="#S3">
            <?php
            if (isset($_SESSION['validAuth'])) {
            ?>
                <article id="comInfos">
                    <fieldset id="comInfosField">
                        <legend><span>C</span>ommande <span>p</span>our</legend>
                        <ul>
                            <li>
                                <p><span>Nom:</span> <?= $_SESSION['first_name'] ?></p>
                            </li>
                            <li>
                                <p><span>Prenom:</span> <?= $_SESSION['last_name'] ?></p>
                            </li>
                            <li>
                                <p><span>Adresse:</span> <?= $_SESSION['adresse'] ?></p>
                            </li>
                            <li>
                                <p><span>Tel:</span> <?= $_SESSION['phone_number'] ?></p>
                            </li>
                        </ul>
                    </fieldset>
                </article>
                <br>
                <form action="backend/charge.php" method="POST" id="payment-form">
                    <input type="text" name="f_name" placeholder="Nom">
                    <input type="text" name="l_name" placeholder="Prenom">
                    <div id="card-element"></div>
                    <div id="card-error" role="alert"></div>
                    <input type="hidden" name="amount" value="10">
                    <button type="submit">Payer</button>
                </form>
            <?php
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