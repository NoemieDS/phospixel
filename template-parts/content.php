<?php

/**
 * Template part for displaying posts
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
</article>

</article>