<?php

/**
 * Modèle pour la page des résultats de recherche
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package PhōsPixel
 */
?>
<?php get_header(); ?>
<main class="wrapper site-main bloc-flex-cl-ct">
  <article id="post-<?php the_ID(); ?>" <?php post_class('article-base'); ?>>
    <h1>Résultats de la recherche</h1>
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        $lien = get_permalink();
        $lire = "<a href='" . $lien . "'> [...]</a>"; ?>
        <div>
          <h3><a href="<?php the_permalink(); ?>"> <?= get_the_title(); ?></a></h3>
          <p><?= wp_trim_words(get_the_excerpt(), 30, $lire) ?></p>
          <hr>
        </div>
    <?php
      endwhile;
    endif;
    ?>
  </article>
</main>
<?php get_footer(); ?>