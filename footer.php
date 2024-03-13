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
  
  <a id="retour_haut" href="#" title="Retour en haut de page" >
  <svg id='bouton_haut_12032024' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
  viewBox="0 0 90 100">
  <title>Remonter en haut de page</title>
  <linearGradient id="degrade1-12032024" gradientUnits="userSpaceOnUse" x1="155.25" y1="274.5" x2="155.25" y2="17">
    <stop offset="4.528621e-07" class="couleur3-12032024" />
    <stop offset="0.5987" class="couleur3-12032024" />
    <stop offset="1" class="couleur4-12032024" />
  </linearGradient>
  <linearGradient id="degrade2-12032024" gradientUnits="userSpaceOnUse" x1="155.25" y1="274.5" x2="155.25" y2="17">
    <stop offset="0" class="couleur1-12032024" />
    <stop offset="0.5987" class="couleur1-12032024" />
    <stop offset="1" class="couleur2-12032024" />
  </linearGradient>
  <g class="trajet-12032024">
    <path />
  </g>
</svg>
</a>
</footer>
<?php wp_footer() ?>
</body>

</html>