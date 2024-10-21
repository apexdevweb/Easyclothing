function article_count() {
  const tables = document.querySelectorAll(".com_tab");
  const countAffiche = document.getElementById("compteur_panier");
  countAffiche.textContent = tables.length;
}
article_count();
