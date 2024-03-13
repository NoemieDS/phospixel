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
  <section class="article-date bloc-flex-cl-ct">
    <time><?php the_date(); ?></time>
    <time><?php the_modified_date(); ?></time>
  </section>
</article>

<!-- Navigation entre les articles précédent et suivant -->
<div class="pagination bloc-flex-cl-rw-ev">

  <div class="article-suivant flex-0">
    <?php
    $next_post = get_next_post();
    if (!empty($next_post)) {
      $next_title = get_the_title($next_post->ID);
     /*  $next_title_encoded = htmlentities($next_title, ENT_QUOTES, 'UTF-8'); */
      echo '<a href="' . get_permalink($next_post->ID) . '">' . '<p>&laquo;</p>' . substr($next_title, 0, 18) . '...</a>';
    }
    ?>
  </div>
  <div class="spancer-m flex-0"></div>

  <div class="article-precedent flex-0">
    <?php
    $previous_post = get_previous_post();
    if (!empty($previous_post)) {
      $previous_title = get_the_title($previous_post->ID);
     /*  $previous_title_encoded = htmlentities($previous_title, ENT_QUOTES, 'UTF-8'); */
      echo '<a href="' . get_permalink($previous_post->ID) . '">' . substr($previous_title, 0, 18) . '...' . '<p>&raquo;</p>' . '</a>';
    }
    ?>
  </div>
</div>