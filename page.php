<?php

/**
 * Modèle pour boucler dans les articles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PhōsPixel
 */

get_header();
?>

<main class="wrapper site-main bloc-flex-cl-ct">

  <?php

  while (have_posts()) :
    the_post();

    /* Aller chercher le template pour afficher le contenu de la page */
    get_template_part('template-parts/content', 'page');

  endwhile; // Fin de la boucle.
  ?>

</main>

<?php
get_footer();
