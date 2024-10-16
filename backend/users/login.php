<?php
require("backend/database.php");

if (isset($_POST['Login'])) {
    if (!empty($_POST['Mail']) && !empty($_POST['Pass'])) {
        $userMail = htmlspecialchars(strip_tags(filter_var($_POST['Mail'], FILTER_VALIDATE_EMAIL)));
        $userPass = htmlspecialchars(strip_tags($_POST['Pass']));

        $log_verif = $bdd->prepare("SELECT * FROM `client` WHERE client_mail = ?");
        $log_verif->execute(array($userMail));

        if ($log_verif->rowCount() > 0) {

            $clientInfos = $log_verif->fetch();
            $clientpass = $clientInfos['client_password'];

            if (password_verify($userPass, $clientpass)) {

                $_SESSION['validAuth'] = true;
                $_SESSION['id'] = $clientInfos['id_client'];
                $_SESSION['first_name'] = $clientInfos['client_first_name'];
                $_SESSION['last_name'] = $clientInfos['client_last_name'];
                $_SESSION['mail'] = $clientInfos['client_mail'];
                $_SESSION['adresse'] = $clientInfos['client_adresse'];
                $_SESSION['phone_number'] = $clientInfos['client_phone_number'];
            } else {
                echo "mot de passe incorrecte";
            }
        } else {
            echo "aucun utilisateur trouver";
        }
    } else {
        echo "tous les champs ne sont pas remplis";
    }
}
