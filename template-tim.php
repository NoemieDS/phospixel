<?php

/**
 * Template name: recherche-tim
 * 
 */

// Définir le numéro de page actuelle
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Nombre d'articles par page
$posts_par_page = 5;

// Récupérer les articles de la catégorie "tim" avec pagination
$args = array(
  'category_name' => 'tim',
  'orderby' => 'date', // Tri par date
  'order' => 'DESC',   // Du plus récent au plus ancien
  'post_type' => 'post',
  'posts_per_page' => $posts_par_page,
  'paged' => $paged // Pagination
);
$tim_posts_query  = new WP_Query($args);

// Affichage dans WordPress
get_header();
?>

<main class="wrapper site-main bloc-flex-cl-ct">

  <section id="post-<?php the_ID(); ?>" <?php post_class('bloc-flex-cl-ct'); ?>>
    <?php
    the_content(); // Affiche le contenu de l'article fait dans WordPress
    ?>
  </section>

  <!-- Affichage des articles de la catégorie tim -->
  <section class="bloc-flex-cl-ct-ev">
    <?php
    // Vérifier si des articles sont trouvés
    if ($tim_posts_query->have_posts()) :
      // Boucle sur les articles
      while ($tim_posts_query->have_posts()) : $tim_posts_query->the_post();
    ?>
        <article class="article-extrait bloc-flex-cl-ct">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php
          $contenu = get_the_content();

          // Teste s'il y a un SVG avec la classe 'svg-vedette'
          // Si oui, on l'affiche
          preg_match('/<svg[^>]*class="([^"]*svg-vedette[^"]*)"[^>]*>(.*?)<\/svg>/s', $contenu, $match_svg_vedette);

          if (!empty($match_svg_vedette[0])) {
            // Affiche le SVG avec la classe 'svg-vedette'
            echo $match_svg_vedette[0];
          } else {
            // Si aucun svg-vedette, on affiche l'image de mise en avant 
            //(qui peut être un svg - maintenant support dans functions.php)
            if (has_post_thumbnail()) {
              $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
              echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '">';
            } else {
              // Si aucune image de mise en avant
              // Afficher les 20 premiers mots de the_content() avec la balise H3
              $contenu_mots = preg_split("/[\s,]+/", strip_tags($contenu));
              $extrait = implode(' ', array_slice($contenu_mots, 0, 20));
              echo wpautop($extrait) . '...'; // Ajout de la balise <p> et des points de suspension
            }
          }
          ?>
        </article>

    <?php
      endwhile;
      // Afficher la pagination 
      echo '<div class="pagination bloc-flex-rw-ct-ct">' . paginate_links(array(
        'total' => $tim_posts_query->max_num_pages,
        'paged' => $paged,
        'prev_text' => '&laquo;', //chevron gauche
        'next_text' => '&raquo;' //chevron droit
      )) . '</div>';


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
?>