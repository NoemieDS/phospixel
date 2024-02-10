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

<main class="site-main bloc-flex-cl-ct">

  <?php dynamic_sidebar('accueil'); ?>

  <!-- Articles de la catégorie accueil -->
  <section class="bloc-flex-cl-ct">
    <?php

    // Vérifier si des articles sont trouvés
    if ($accueil_posts_query->have_posts()) :
      // Boucle sur les articles
      while ($accueil_posts_query->have_posts()) : $accueil_posts_query->the_post();
    ?>
        <article class="article-extrait bloc-flex-cl-ct">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php
          $contenu = get_the_content();
          preg_match('/<svg.*?>(.*?)<\/svg>/s',  $contenu, $match_svg);

          if (!empty($match_svg[0])) {
            // Affiche le contenu SVG
            echo $match_svg[0];
          } elseif (has_post_thumbnail()) {
            // Affiche l'image mise en avant (post thumbnail) s'il n'y a pas de svg
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
            echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '">';
          } else {
            preg_match('/<h2.*?>(.*?)<\/h2>/s',  $contenu, $match_h2);
            if (!empty($match_h2[0])) {
              // Affiche le contenu complet du H2 avec la balise H3
              echo '<h3>' . $match_h2[1] . '</h3>';
            } else {
              // Affiche le titre de l'article et les 20 premiers mots de the_content() avec la balise H3
              echo '<h3><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
              $contenu_mots = preg_split("/[\s,]+/", strip_tags($contenu));
              $extrait = implode(' ', array_slice($contenu_mots, 0, 20));
              echo wpautop($extrait) . '...'; // Ajout de la balise <p> et des points de suspension
            }
          }
          ?>
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
