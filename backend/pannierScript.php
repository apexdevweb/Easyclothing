<?php
session_start();
require("database.php"); // Inclure la connexion à la base de données

// Vérifier si l'ID du produit est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $id_prod = $_GET['id'];

    // Requête pour récupérer les informations du produit depuis la base de données
    $req_panier = $bdd->prepare("SELECT * FROM produits WHERE id_produit = ?");
    $req_panier->execute([$id_prod]);
    $produitAdd = $req_panier->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le produit existe
    if ($produitAdd) {
        // Initialiser le panier s'il n'existe pas encore
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        // Vérifier si le produit est déjà dans le panier
        $found = false;
        foreach ($_SESSION['panier'] as &$item) {
            if ($item['id_produit'] == $id_prod) {
                $item['quantite'] += 1; // Incrémenter la quantité si déjà dans le panier
                $found = true;
                break;
            }
        }
        unset($item); // Libérer la référence pour éviter les problèmes

        // Si le produit n'est pas encore dans le panier, l'ajouter
        if (!$found) {
            $produitAdd['quantite'] = 1; // Ajouter une quantité de 1 pour le nouvel article
            $_SESSION['panier'][] = $produitAdd;
        }

        // Redirection après l'ajout au panier
        header("Location: ../pannier.php"); // Rediriger vers la page d'accueil (ou autre page)
        exit();
    } else {
        // Le produit n'existe pas dans la base de données
        echo "Le produit n'existe pas.";
    }
} else {
    // Pas d'ID de produit fourni
    // echo "Aucun produit sélectionné.";
}
