<?php


/**
 * Template name: recherche-tim
 * 
 */

// Récupérer les articles de la catégorie "tim"
$args = array(
  'category_name' => 'tim',
  'orderby' => 'date', // Tri par date
  'order' => 'DESC',   // Du plus récent au plus ancien
  'post_type' => 'post',
  'posts_per_page' => -1,
);
$tim_posts_query  = new WP_Query($args);

// Affichage dans WordPress
get_header();
?>

<main class="site-main bloc-flex-cl-ct">

  <article id="post-<?php the_ID(); ?>" <?php post_class('article-base'); ?>>
    <?php
    the_content(); // Affiche le contenu de l'article fait dans WordPress
    ?>
  </article>
  <!-- Affichage des articles de la catégorie tim -->
  <section>
    <?php
    // Vérifier si des articles sont trouvés
    if ($tim_posts_query->have_posts()) :
      // Boucle sur les articles
      while ($tim_posts_query->have_posts()) : $tim_posts_query->the_post();
    ?>
        <article class="article-extrait">
          <h3><?php the_title(); ?></h3>
          <a href="<?php the_permalink(); ?>">
            <?php the_content(); ?></a>
        </article>
    <?php
      endwhile;
      // Réinitialiser les données de la requête principale
      wp_reset_postdata();
    else :
      // Aucun article trouvé
      echo 'Aucun article trouvé dans la catégorie "Recherche-Tim"';
    endif;
    ?>
  </section>
</main>
<?php
get_footer();
