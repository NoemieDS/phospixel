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
        <article class="article-extrait bloc-flex-cl-ct">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php
          $contenu = get_the_content();
          preg_match('/<svg.*?>(.*?)<\/svg>/s',  $contenu, $match);

          if (!empty($match[0])) {
            // Affiche le contenu SVG
            echo $match[0];
          } elseif (has_post_thumbnail()) {
            // Affiche l'image mise en avant (post thumbnail)

            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
            echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '">';
          } else {
            // Affiche le titre de l'article et les 20 premiers mots de the_content()
            $contenu_mots = preg_split("/[\s,]+/", strip_tags($contenu));
            $extrait = implode(' ', array_slice($contenu_mots, 0, 20));
            echo wpautop($extrait) . '...'; // Ajout de la balise <p> et des points de suspension
          }
          ?>
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
