<?php
session_start();
require("database.php"); // Inclure la connexion à la base de données

// Vérifier l'action passée dans l'URL
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $id_prod = $_GET['id'];

    // Vérifier si le panier est initialisé
    if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
        // Chercher le produit dans le panier et le supprimer
        foreach ($_SESSION['panier'] as $index => $produit) {
            if ($produit['id_produit'] == $id_prod) {
                unset($_SESSION['panier'][$index]); // Supprimer le produit du panier
                $_SESSION['panier'] = array_values($_SESSION['panier']); // Réindexer le tableau
                break;
            }
        }
    }

    // Redirection après suppression
    header("Location: ../pannier.php");
    exit();
}

// Code existant pour l'ajout au panier
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
        header("Location: ../pannier.php");
        exit();
    } else {
        // Le produit n'existe pas dans la base de données
        echo "Le produit n'existe pas.";
    }
}
