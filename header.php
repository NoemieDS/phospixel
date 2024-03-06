<?php

/**
 * L'entête du thème
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PhōsPixel
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta <?php bloginfo('charset'); ?>>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Title dans theme support functions.php -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> <!-- ajoute des classes et des infos personnalisées en fonction de la page affichée  -->
	<?php wp_body_open(); ?> <!-- permet d'afficher la barre admin de WP en tout temps -->

	<header class="entete-barre bloc-flex-cl-ct">
		<div class="wrapper-entete-pied bloc-flex-rw-ct">
			<?php
			the_custom_logo();
			?>
			<h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<?php
			$phospixel_description = get_bloginfo('description', 'display');
			if ($phospixel_description || is_customize_preview()) :
			?>
				<p class="site-description"><?php echo $phospixel_description;
																		?></p>
			<?php endif; ?>



			<!-- Navigation principale (nav) -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'entete',
					'container_class' =>  'nav-principale',
					'menu_id'        => 'nav-principale',
					'container' => 'nav',
				)
			);
			?>
			<!-- #Navigation principale -->
		</div>
	</header>