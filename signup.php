<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("includes/head.php");
require("backend/users/register.php");
?>

<body>
    <?php
    include("includes/logo.php");
    ?>
    <fieldset>
        <legend>
            <h2 id="signupH2"><span>C</span>reer un compte</h2>
        </legend>
        <form method="POST" id="signForm">
            <input type="text" name="nom" placeholder="*Nom">
            <br>
            <input type="text" name="prenom" placeholder="*Prenom">
            <br>
            <input type="email" name="mail" placeholder="*E-mail">
            <br>
            <input type="password" name="pass" placeholder="*Password">
            <br>
            <input type="password" name="confirm_pass" placeholder="*confirm-Password">
            <br>
            <input type="text" name="adresse" placeholder="*Adresse">
            <br>
            <input type="tel" name="phone" placeholder="*Tel">
            <br>
            <input type="submit" name="register" value="Enregistrer">
            <br>
            <p><a href="index.php"><i class="fa-solid fa-arrow-left-long"></i><span>R</span>etour</a></p>
        </form>
    </fieldset>
    <?php
    include("includes/footer.php");
    include("includes/scriptAddon.php");
    ?>
</body>

</html>