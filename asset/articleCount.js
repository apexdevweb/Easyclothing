function article_count() {
  const  tables= document.querySelectorAll(".com_tab");
  const countAffiche = document.getElementById("compteur_panier");
  if (tables.length > 0) {
    countAffiche.classList.add("compteur_panier");
    countAffiche.textContent = tables.length;
  } else {
    countAffiche.classList.remove("compteur_panier");
  }
}
article_count();
