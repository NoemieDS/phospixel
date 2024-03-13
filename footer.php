<?php

/**
 * Modèle pour afficher le footer
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PhōsPixel
 */

?>
<footer class="site-footer bloc-flex-cl">
  <?php
  get_search_form();
  get_sidebar();
  ?>
  <section class="site-info bloc-flex-rw-ct wrapper-entete-pied ">
    <p class="site-date">© <?= date("Y") ?> </p>
    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
    <a href="http://ndasilva.ca">Noémie da Silva</a>
  </section>
</footer>
</body>

</html>