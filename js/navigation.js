/**
 * Initialise le bouton de retour en haut de page avec des fonctionnalités tactiles.
 * @param {HTMLElement} retourHautBouton - L'élément HTML du bouton de retour en haut de page.
 */

document.addEventListener("DOMContentLoaded", function () {
  let retourHautBouton = document.getElementById("retour_haut");

  // Afficher ou masquer le bouton en fonction du défilement
  window.addEventListener("scroll", function () {
    if (window.scrollY > 100) {
      retourHautBouton.style.display = "block";
    } else {
      retourHautBouton.style.display = "none";
    }
  });
});
