let stripe = Stripe(
  "pk_test_51QCPzdP1YLJwGOyPcPvrl06SC1ikf5YU1xrmtPPs4weW2nMoEbO3tc8v2ma1OIROAKT0tGiGRmhmpwQPMprvnQaY00DjjQ0m5h"
);
let elements = stripe.elements();

let card = elements.create("card");
card.mount("#card-element");

card.addEventListener("change", function (event) {
  let displayError = document.getElementById("card-errors");

  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = "";
  }
});

let form = document.getElementById("payment-form");
form.addEventListener("submit", function (event) {
  event.preventDedfault();

  stripe.createToken(card).then(function (result) {
    if (result.error) {
      let errorElement = document.querySelector("#card-errors");
      errorElement.textContent = result.error.message;
    } else {
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  let form = document.querySelector("#payment-form");
  let hiddenInput = document.createElement("input");

  hiddenInput.setAttribute("type", "hidden");
  hiddenInput.setAttribute("name", "stripToken");
  hiddenInput.setAttribute("value", token.id);
  form.appendChild(hiddenInput);

  form.submit();
}
