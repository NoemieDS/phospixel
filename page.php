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
  <article id="post-<?php the_ID(); ?>" <?php post_class('widget-accueil-1'); ?>>
    <?php
    the_content(); // Affiche le contenu de l'article
    ?>
  </article>
</main>

<?php
get_footer();
