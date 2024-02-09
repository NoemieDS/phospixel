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
	<?php wp_body_open(); ?> <!-- barre admin de WP -->

	<header class="entete-barre">
		<div>
			<?php
			the_custom_logo();
			if (is_front_page() && is_home()) :
			?>
				<h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<?php
			else :
			?>
				<p><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
			<?php
			endif;
			$phospixel_description = get_bloginfo('description', 'display');
			if ($phospixel_description || is_customize_preview()) :
			?>
				<p class="site-description"><?php echo $phospixel_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																		?></p>
			<?php endif; ?>
		</div><!-- .site-identité -->


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
	</header>