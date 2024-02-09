<?php

/**
 * Modèle pour toutes les pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PhōsPixel
 */

get_header();
?>

<main class="site-main">

  <?php

  while (have_posts()) :
    the_post();

    get_template_part('template-parts/content', 'page');

  endwhile; // Fin de la boucle.
  ?>

</main>

<?php
get_footer();
