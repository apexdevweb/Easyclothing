<?php
var_dump($_POST);
require("../vendor/autoload.php");
\Stripe\Stripe::setApiKey('sk_test_51QCPzdP1YLJwGOyPIUJMqYvPZ2FJB2tL59Pyl4eRZzWiyngjzANFgwqjKEqGuSqTi4Y8EEqQU4kK56V5MIDUQ5bN00MO1auRjj');

$response = [
    "payment" => "error",
    "amount" => 0
];

// Vérifiez que toutes les données sont reçues
if (isset($_POST["stripToken"], $_POST["amount"], $_POST["f_name"], $_POST["l_name"])) {
    $token = $_POST["stripToken"];
    $amount = $_POST["amount"];
    $firstname = $_POST["f_name"];
    $lastname = $_POST["l_name"];

    // Vérifiez que le montant est valide
    if (!is_numeric($amount) || $amount <= 0) {
        $response['message'] = "Le montant est invalide.";
        echo json_encode($response);
        exit;
    }

    // Stripe attend les montants en centimes
    $amount = intval($amount * 100);

    try {
        $charge = \Stripe\Charge::create([
            "amount" => $amount,
            "currency" => "eur",
            "description" => "Paiement test",
            "source" => $token,
            "metadata" => [
                "f_name" => $firstname,
                "l_name" => $lastname
            ]
        ]);

        // Si le paiement est un succès
        $response['payment'] = "success";
        $response['amount'] = $amount / 100;
    } catch (\Stripe\Exception\CardException $e) {
        $response['message'] = 'Erreur de carte : ' . $e->getError()->message;
    } catch (\Stripe\Exception\ApiConnectionException $e) {
        $response['message'] = 'Erreur de connexion à l’API Stripe : ' . $e->getMessage();
    } catch (\Stripe\Exception\InvalidRequestException $e) {
        $response['message'] = 'Requête Stripe invalide : ' . $e->getMessage();
    } catch (\Stripe\Exception\ApiErrorException $e) {
        $response['message'] = 'Erreur API Stripe : ' . $e->getMessage();
    } catch (\Exception $e) {
        $response['message'] = 'Erreur inconnue : ' . $e->getMessage();
    }
} else {
    $response['message'] = "Données manquantes pour le paiement.";
}

echo json_encode($response);
exit;
