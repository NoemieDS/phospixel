<?php

/**
 * Modèle pour afficher le footer
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PhōsPixel
 */

?>

<footer class="site-footer">
  <?php
  get_sidebar();
  ?>
  <section class="site-info">
    <p class="site-date">© <?= date("Y") ?> </p>
    <?php
    printf(esc_html__('Thème : PhōsPixel %2$s', 'phospixel'), 'phospixel', '<a href="http://ndasilva.ca">Noémie da Silva</a>');
    ?>
  </section>
</footer>

</body>

</html>