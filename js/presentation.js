/* Script pour enlever la classe wrapper de l'article de présentation */

document.addEventListener("DOMContentLoaded", function () {
  let postId = 2027; // ID de l'article à exclure

  // Vérifier si l'article actuel a l'ID à exclure
  if (
    document.body.classList.contains("single-post") &&
    document.body.classList.contains("postid-" + postId)
  ) {
    let mainElement = document.querySelector("main.wrapper");
    if (mainElement) {
      mainElement.classList.remove("wrapper");
    }
  }
});
