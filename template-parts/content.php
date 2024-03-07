<?php

/**
 * Template part pour afficher le contenu d'un article
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PhōsPixel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bloc-flex-cl-ct article-page'); ?>>
  <h1><?php the_title(); ?></h1>
  <?php
  the_content(); // Affiche le contenu de l'article fait dans WordPress
  ?>
  <!-- Afficher la date de la publication et la date de modification -->
  <section class="article-date bloc-flex-cl-ct ">
    <time><?php the_date(); ?></time>
    <time><?php the_modified_date(); ?></time>
  </section>
</article>