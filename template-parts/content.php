<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PhōsPixel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-base  bloc-flex-cl-ct'); ?>>
  <?php
  the_content(); // Affiche le contenu de l'article fait dans WordPress
  ?>
</article>

</article>