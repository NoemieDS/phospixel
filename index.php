<?php

/**
 * Modèle par défaut
 * Template de base
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phospixel
 */

get_header();
?>

<main class="wrapper site-main bloc-flex-cl-ct">

	<?php
	if (have_posts()) :

		if (is_home() && !is_front_page()) :
	?>

			<h1><?php single_post_title(); ?></h1>

	<?php
		endif;

		/* Boucle des articles */
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());

		endwhile;

		the_posts_navigation();

	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>
	<?php wp_footer(); ?>
</main>

<?php
get_footer();
