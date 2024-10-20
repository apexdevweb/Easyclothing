const x = document.querySelectorAll(".letter_anime");
const y = document.querySelector(".swiper-button-next");
const z = document.querySelector(".swiper-button-prev");

x.forEach((letters) => {
  y.addEventListener("click", () => {
    letters.classList.remove("AnimeLettersNext");
    void letters.offsetWidth; // Force le navigateur à recalculer le style
    letters.classList.add("AnimeLettersNext");
  });
  z.addEventListener("click", () => {
    letters.classList.remove("AnimeLettersPrev");
    void letters.offsetWidth; // Force le navigateur à recalculer le style
    letters.classList.add("AnimeLettersPrev");
  });
});
