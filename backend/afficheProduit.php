<?php
require("backend/database.php");
$affiche_prod = $bdd->prepare("SELECT * FROM produits ORDER BY id_produit DESC");
$affiche_prod->execute();

$affiche_hm = $bdd->prepare("SELECT * FROM produits WHERE genre_produit = :Homme");
$affiche_hm->execute(['Homme' => 'Homme']);

$affiche_fm = $bdd->prepare("SELECT * FROM produits WHERE genre_produit = :Femme");
$affiche_fm->execute(['Femme' => 'Femme']);
