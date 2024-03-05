<?php

/**
 * Modèle pour la page 404 (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package PhōsPixel
 */

get_header();
?>

<main class="wrapper site-main site-main-404">

  <section>
    <h2><?php esc_html_e('Oups ! '); ?></h2>
  </section>
</main>

<?php
get_footer();
