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
 * Configure les paramètres par défaut du thème et enregistre le support pour diverses fonctionnalités de WordPress.
 */
function phospixel_setup()
{

	/*
		* Laissez WordPress gérer le titre du document.
		* En ajoutant la prise en charge du thème, nous déclarons que ce thème n'utilise pas
		* de balise <title> codée en dur dans l'en-tête du document, et nous attendons de WordPress
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


	// Configurer la fonctionnalité de fond personnalisé du noyau WordPress.
	add_theme_support(
		'custom-background',
		apply_filters(
			'phospixel_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
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
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Accueil', 'phospixel'),
			'id'            => 'accueil',
			'description'   => esc_html__("Une zone pour afficher sur la page d'accueil.", 'phospixel'),
			'before_widget' => '<section id="%1$s" class="widget %2$s widget-accueil-1">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-accueil-1-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'phospixel_widgets_init');

/**
 * Enqueue scripts et styles.
 */
function phospixel_styles()
{
	wp_enqueue_style('phospixel-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('phospixel-style', 'rtl', 'replace');

	wp_enqueue_script('phospixel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	/* Intégration des polices de Google */
	wp_enqueue_style('style-goolefont', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;800&display=swap" rel="stylesheet', false);
}
add_action('wp_enqueue_scripts', 'phospixel_styles');
