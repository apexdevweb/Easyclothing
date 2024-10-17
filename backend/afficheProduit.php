<?php
require("backend/database.php");
$affiche_prod = $bdd->prepare("SELECT * FROM produits ORDER BY id_produit DESC");
$affiche_prod->execute();
