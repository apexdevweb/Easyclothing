let stripe = Stripe(
  "pk_test_51QCPzdP1YLJwGOyPcPvrl06SC1ikf5YU1xrmtPPs4weW2nMoEbO3tc8v2ma1OIROAKT0tGiGRmhmpwQPMprvnQaY00DjjQ0m5h"
);
let elements = stripe.elements();
let card = elements.create("card");

card.mount("#card-element");

// Gestion des erreurs d'entrée de carte
card.addEventListener("change", function (event) {
  let displayError = document.getElementById("card-error");
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = "";
  }
});

let form = document.getElementById("payment-form");
form.addEventListener("submit", function (event) {
  event.preventDefault(); // Correction ici pour empêcher l'envoi automatique

  stripe.createToken(card).then(function (result) {
    if (result.error) {
      // Affiche l'erreur de création du token
      let errorElement = document.querySelector("#card-error");
      errorElement.textContent = result.error.message;
    } else {
      // Si le token est généré avec succès, appelle stripeTokenHandler
      console.log("Token généré : ", result.token); // Affiche le token pour déboguer
      stripeTokenHandler(result.token);
    }
  });
});

// Ajoute le token dans le formulaire et soumet
function stripeTokenHandler(token) {
  let form = document.querySelector("#payment-form");
  let hiddenInput = document.createElement("input");
  hiddenInput.setAttribute("type", "hidden");
  hiddenInput.setAttribute("name", "stripToken");
  hiddenInput.setAttribute("value", token.id);
  form.appendChild(hiddenInput);

  console.log("Token ajouté au formulaire : ", hiddenInput); // Vérifiez le token
  console.log("Formulaire avant soumission :", new FormData(form)); // Vérifiez le contenu du formulaire

  form.submit(); // Soumet le formulaire après l'ajout du token
}
