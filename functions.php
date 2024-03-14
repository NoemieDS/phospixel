<?php

/**
 * PhōsPixel fonctions + définitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PhōsPixel
 */

if (!defined('_S_VERSION')) {
	// Remplacer le numéro de la version à chaque publication.
	define('_S_VERSION', '1.0.0');
}

/**
 * Enqueuestyles.
 */
function phospixel_scripts()
{
	wp_enqueue_style('phospixel-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('phospixel-style', 'rtl', 'replace');

	/* Intégration des polices Roboto de Google */
	wp_enqueue_style('style-googlefont', 'https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
}
/* Intégration des scripts */
wp_enqueue_script('phospixel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '_S_VERSION', true); 

add_action('wp_enqueue_scripts', 'phospixel_scripts');


/**
 * Configure les paramètres par défaut du thème et enregistre le support pour diverses fonctionnalités de WordPress.
 */
function phospixel_setup()
{

	/*
		* Laissez WordPress gérer le titre du document.
		* En ajoutant la prise en charge du thème, nous déclarons que ce thème n'utilise pas
		* de balise <title> codée dans l'en-tête du document, et nous attendons de WordPress
		* qu'il le fournisse pour nous.
		*/
	add_theme_support('title-tag');

	/*
		* Activer le support des images mises en avant pour les articles et les pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');


	// Enregistrement des menus
	function enregistrement_nav_menu()
	{
		register_nav_menus(array(
			'entete' => 'Menu entete',
		));
	}
	add_action('init', 'enregistrement_nav_menu', 0);

	/*
	* Ajouter du support pour les SVG et le XML, 
	* permet de mettre des SVG dans la librairie et de les utiliser comme 
	* image de mise en avant et comme background-image 
	*
	* https://wpengine.com/resources/enable-svg-wordpress/
	*/

	add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

		global $wp_version;
		if ($wp_version !== '4.7.1') {
			return $data;
		}

		$filetype = wp_check_filetype($filename, $mimes);

		return [
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename']
		];
	}, 10, 4);

	function cc_mime_types($mimes)
	{
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	/*Pour voir une vignette dans la bibliothèque des média
	* code original indiquait .attachment-266x266 - fonctionne pas
	* Ne permet pas de voir une vignette d'image de mise en avant dans un article, 
	* la classe .components-responsive-wrapper__content est pour img
	* et sélectionner un svg ne crée pas une balise img.
	*/
	function fix_svg()
	{
		echo '<style type="text/css">
        .attachment-60x60, .thumbnail img { 
             width: 100% !important;
             height: auto !important;
        }
        </style>';
	}
	add_action('admin_head', 'fix_svg');


	// Configurer la fonctionnalité de fond personnalisé du noyau WordPress.
	add_theme_support(
		'custom-background',
		apply_filters(
			'phospixel_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
				/* Pour référence mais le fond est choisi dans le tableau de bord de WP -  Apparence */
				/*'default-image' => get_template_directory_uri() . '/assets/svg-papier.svg', */
			)
		)
	);

	// Ajouter la prise en charge du rafraîchissement sélectif des widgets pour le thème.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Ajout de support pour le logo personnalisé
	 * 
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'phospixel_setup');


/**
 * Enregistrer une zone de widgets.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function phospixel_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'phospixel'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'phospixel'),
			'before_widget' => '<section id="%1$s" class="widget %2$s widget-h2-sidebar">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-h2-sidebar-titre">',
			'after_title'   => '</h2>',
		)
	);


	register_sidebar(
		array(
			'name'          => esc_html__('Animation', 'phospixel'),
			'id'            => 'animation',
			'description'   => esc_html__("Une zone pour afficher une animation.", 'phospixel'),
			'before_widget' => '<article id="%1$s" class="widget %2$s article-base">',
			'after_widget'  => '</article>',
			'before_title'  => '<h2 class="article-base-titre">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Accueil', 'phospixel'),
			'id'            => 'accueil',
			'description'   => esc_html__("Une zone pour afficher sur la page d'accueil.", 'phospixel'),
			'before_widget' => '<article id="%1$s" class="widget %2$s article-base">',
			'after_widget'  => '</article>',
			'before_title'  => '<h2 class="article-base-titre">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'phospixel_widgets_init');



