<?php

/**
 * La balise aside - un widget 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PhōsPixel
 */

/* 
*  Widget menu secondaire choisi dans WP et 
*  placer dans le footer du thème
*/
if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>
<aside id="menu-secondaire" class="widget-menu-secondaire wrapper-entete-pied">
	<?php dynamic_sidebar('sidebar-1'); ?>
</aside>