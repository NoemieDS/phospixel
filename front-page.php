<?php

/**
 * Modèle par défaut
 * Template de base
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phospixel
 */


// Récupérer les articles de la catégorie "accueil"
$args = array(
  'post_type' => 'post',
  'category_name' => 'accueil', // Nom de la catégorie "accueil"
  'orderby' => 'date', // Tri par date
  'order' => 'DESC',   // Du plus récent au plus ancien
  'post_type' => 'post',
  'posts_per_page' => -1,
);
$accueil_posts_query = new WP_Query($args);

// Affichage dans WordPress
get_header();
?>

<main class="site-main">

  <?php dynamic_sidebar('accueil'); ?>

  <!-- Articles de la catégorie accueil -->
  <section>
    <?php

    // Vérifier si des articles sont trouvés
    if ($accueil_posts_query->have_posts()) :
      // Boucle sur les articles
      while ($accueil_posts_query->have_posts()) : $accueil_posts_query->the_post();
    ?>
        <article class="article-extrait">
          <h3><?php the_title(); ?></h3>
          <div><a href="<?php the_permalink(); ?>"><?php the_content(); ?></a></div>
        </article>
    <?php
      endwhile;
      // Réinitialiser les données de la requête principale
      wp_reset_postdata();
    else :
      // Aucun article trouvé
      echo 'Aucun article trouvé dans la catégorie "Accueil"';
    endif;
    ?>
  </section>

</main>

<?php
get_footer();
