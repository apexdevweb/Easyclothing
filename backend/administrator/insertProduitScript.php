<?php
require("backend/database.php");

if (isset($_POST['LoadProd'])) {
    if (
        !empty($_POST['nomProduit']) && !empty($_POST['numeroProduit']) && !empty($_POST['categorieProduit']) && !empty($_POST['marqueProduit'])
        && !empty($_POST['TarifProduit']) && !empty($_POST['genreProduit']) && !empty($_FILES['imgProduit']['name'])
    ) {
        $nom_produit = htmlspecialchars(strip_tags($_POST['nomProduit']));
        $numero_produit = htmlspecialchars(strip_tags($_POST['numeroProduit']));
        $categorie_produit = htmlspecialchars(strip_tags($_POST['categorieProduit']));
        $marque_produit = htmlspecialchars(strip_tags($_POST['marqueProduit']));
        $tarif_produit = htmlspecialchars(strip_tags($_POST['TarifProduit']));
        $genre_produit = htmlspecialchars(strip_tags($_POST['genreProduit']));

        //on verifie que le produit n'est pas déjà en ligne 
        $req_prod_verif = $bdd->prepare("SELECT * FROM produits WHERE number_produit = ?");
        $req_prod_verif->execute(array($numero_produit));

        if ($req_prod_verif->rowCount() > 0) {
            echo "<p>" . "Mise en ligne impossible le produit existe déjà" . "</p>";
        } else {
            //ajout de l'image
            $tailleMax = 2097152;
            $extensionValide = array('jpg', 'jpeg', 'png');
            if ($_FILES['imgProduit']['size'] <= $tailleMax) {

                $extensionUpload = strtolower(substr(strrchr($_FILES['imgProduit']['name'], '.'), 1));
                if (in_array($extensionUpload, $extensionValide)) {

                    //on définie le chemin pour que l'image soit placé dans un dossier avec un id via la database
                    $cheminUpload = "image/imgproduit/" .  $numero_produit . "." . $extensionUpload;
                    $transferImg = move_uploaded_file($_FILES['imgProduit']['tmp_name'], $cheminUpload);

                    if ($transferImg) {
                        $updateImg = $bdd->prepare("UPDATE produits SET image_produit = :image_produit WHERE id_produit = :id_produit");
                        $updateImg->execute(array(
                            'image_produit' =>  $numero_produit . "." . $extensionUpload,
                            'id_produit' =>  $numero_produit
                        ));
                    } else {
                        $errorMsg = "Erreur de transfert";
                    }
                } else {
                    $errorMsg = "Votre image dois être au format : jpg, jpeg, png";
                }
            } else {
                $errorMsg = "Votre image ne dois pas dépasser 2mo";
            }
            //ajout de l'image fin

            $req_prod_inser = $bdd->prepare("INSERT INTO produits (name_produit, number_produit, categorie_produit, marque_produit, price_produit, genre_produit) VALUES (?, ?, ?, ?, ?, ?)");
            $req_prod_inser->execute(array($nom_produit, $numero_produit, $categorie_produit, $marque_produit, $tarif_produit, $genre_produit));

            if ($req_prod_inser) {
                $succesMsg = "Produit ajouté" . "<i class='fa-solid fa-check'></i>";
            }
        }
    } else {
        echo "Tous les champs doivent êtres remplis";
    }
}
