<?php
require("backend/database.php");

if (isset($_POST['register'])) {
    if (
        !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['pass'])
        && !empty($_POST['confirm_pass']) && !empty($_POST['adresse']) && !empty($_POST['phone'])
    ) {
        $user_firstName = htmlspecialchars(strip_tags($_POST['prenom']));
        $user_lastName = htmlspecialchars(strip_tags($_POST['nom']));
        $user_mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $user_pass = ($_POST['pass']);
        $user_confirmPass = ($_POST['confirm_pass']);
        $user_adresse = htmlspecialchars(strip_tags($_POST['adresse']));
        $user_phone = htmlspecialchars(strip_tags($_POST['phone']));

        if (!$user_mail) {
            $errors[] = "L'adresse mail est invalide";
        }

        if (!preg_match('/^[0-9]{10}$/', $user_phone)) {
            $errorMs[] = "Numéro de téléphone invalide";
        }

        if ($user_pass === $user_confirmPass) {
            $user_pass = password_hash(($_POST['pass']), PASSWORD_DEFAULT);
        } else {
            $errors[] = "Les mot de passe ne correspondent pas";
        }
        if (empty($errors)) {
            $insert_user = $bdd->prepare("INSERT INTO client (client_first_name, client_last_name, client_mail,client_password, client_adresse, client_phone_number) VALUE (?,?,?,?,?,?)");
            $insert_user->execute(array($user_firstName, $user_lastName, $user_mail, $user_pass, $user_adresse, $user_phone));
            echo "Enregistrer avec succès";
        } else {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    } else {
        echo "Tous les champs doivent êtres remplis";
    }
} else {
    echo "Le formulaire d'inscription n'à pas été Validé";
}
