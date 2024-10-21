<?php
require("../vendor/autoload.php");

\Stripe\Stripe::setApiKey('sk_test_51QCPzdP1YLJwGOyPIUJMqYvPZ2FJB2tL59Pyl4eRZzWiyngjzANFgwqjKEqGuSqTi4Y8EEqQU4kK56V5MIDUQ5bN00MO1auRjj');

$response = [
    "payment" => "error",
    "amount" => 0
];

if (isset($_POST["stripToken"]) && isset($_SESSION["first_name"], $_SESSION["last_name"])) {
    $token = $_POST["stripToken"];
} else {
    # code...
}
