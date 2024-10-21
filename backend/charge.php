<?php
require("../vendor/autoload.php");

\Stripe\Stripe::setApiKey('sk_test_51QCPzdP1YLJwGOyPIUJMqYvPZ2FJB2tL59Pyl4eRZzWiyngjzANFgwqjKEqGuSqTi4Y8EEqQU4kK56V5MIDUQ5bN00MO1auRjj');

$response = [
    "payment" => "error",
    "amount" => 0
];

if (isset($_POST["stripToken"], $_POST["amount"], $_POST["f_name"], $_POST["l_name"])) {
    $token = $_POST["stripToken"];
    $amount = $_POST["amount"];
    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];

    // if ($amount > 10) {
    $amount = $amount * 100;

    try {
        $charge = \Stripe\Charge::create([
            "amount" => $amount,
            "currency" => "eur",
            "description" => "paiement test",
            "source" => $token,
            "metadata" => [
                "first_name" => $firstname,
                "last_name" => $lastname
            ]
        ]);

        $reponse['message'] = "success";
        $reponse['amount'] = "success";
    } catch (\Stripe\Exception\CardException $e) {
        $response['message'] = $e->getMessage();
    } catch (\Exception $e) {
        $response['message'] = $e->getMessage();
    }
    // }
}

echo json_encode($response);
