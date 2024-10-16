<?php
require("backend/database.php");

if (isset($_POST['Login'])) {
    if (!empty($_POST['Mail']) && !empty($_POST['Pass'])) {
        $adminMail = htmlspecialchars(strip_tags(filter_var($_POST['Mail'], FILTER_VALIDATE_EMAIL)));
        $adminMdp = htmlspecialchars(strip_tags($_POST['Pass']));

        $log_verif = $bdd->prepare("SELECT * FROM `admin` WHERE mail_admin = ?");
        $log_verif->execute(array($adminMail));

        if ($log_verif->rowCount() > 0) {

            $adminInfos = $log_verif->fetch();
            $adminpass = $adminInfos['password_admin'];

            if ($adminMdp == $adminpass) {

                $_SESSION['validAuthAdmin'] = true;
                $_SESSION['adminId'] = $adminInfos['id_admin'];
                $_SESSION['adminName'] = $adminInfos['name_admin'];
                $_SESSION['adminMail'] = $adminInfos['mail_admin'];
            } else {
                echo "mot de passe incorrecte";
            }
        }
    } else {
        echo "tous les champs ne sont pas remplis";
    }
}
