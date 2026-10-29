<?php
/**
 * Default theme setup.
 *
 * This is where all the add_theme_support(); will happen.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity;

use function Backdrop\Fonts\enqueue;
use function Backdrop\is_classicpress;

/**
 * Set up theme support.
 *
 * @return void
 *@since  1.0.0
 * @access public
 */

add_action( 'after_setup_theme', function() {

	// Set the theme content width.
	$GLOBALS['content_width'] = 640;

	// Load theme translations.
	load_theme_textdomain( 'creativity', get_parent_theme_file_path( 'public/lang' ) );

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// Automatically add feed links to `<head>`.
	add_theme_support( 'automatic-feed-links' );

	if ( ! is_classicpress() ) {

		// Outputs HTML5 markup for core features.
		add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
	}
}, 5 );

/**
 * Register menus.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	register_nav_menus( [
		'primary'	=> esc_html__( 'Primary Navigation', 'creativity' ),
		'social' => esc_html__( 'Social Navigation', 'creativity' )
	] );

}, 5 );

/**
 * Register image sizes. Even if adding no custom image sizes or not adding
 * "thumbnails," it's still important to call `set_post_thumbnail_size()` so
 * that plugins that utilize the `post-thumbnail` size will have a properly-sized
 * thumbnail that matches the theme design.
 *
 * @link   https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
 * @link   https://developer.wordpress.org/reference/functions/add_image_size/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	// Register custom image sizes.
	add_image_size( 'creativity-small', 300, 300, true );

	add_image_size( 'creativity-medium', 750, 422, true );

	add_image_size( 'creativity-large', 1170, 614, true );

}, 5 );

/**
 * Register sidebars.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'widgets_init', function() {

	$args = [
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	];

	$sidebars = [
		[
			'id' => 'primary',
			'name' => esc_html__( 'Primary', 'creativity' )
		],
		[
			'id' => 'secondary',
			'name' => esc_html__( 'Secondary', 'creativity' )
		],
		[
			'id' => 'portfolio',
			'name' => esc_html__( 'Portfolio', 'creativity' )
		],
		[
			'id' => 'custom',
			'name' => esc_html__( 'Custom', 'creativity' )
		],
	];

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( array_merge( $sidebar, $args ) );
	}
}, 5 );

/**
 * Add support for custom header.
 */
add_action( 'after_setup_theme', function() {
	add_theme_support( 'custom-header',
		[
			'default-text-color' => 'ffffff',
			'default-image'      => get_parent_theme_file_uri( '/public/images/header-image.jpg' ),
			'height'             => 1200,
			'max-width'          => 2000,
			'width'              => 2000,
			'flex-height'        => false,
			'flex-width'         => false,
		]
	);

	register_default_headers( [
		'header-image' => [
			'url'           => '%s/public/images/header-image.jpg',
			'thumbnail_url' => '%s/public/images/header-image.jpg',
			'description'   => esc_html__( 'Header Image', 'creativity' ),
		],
	] );
} );

add_filter( 'wp_nav_menu_objects', function( $items, $args ) {

	if ( 'social' !== $args->theme_location ) {
		return $items;
	}

	foreach ( $items as $item ) {

		// Look for an icon named after the link's site (github.com -> github), then
		// after the link title.
		$host  = preg_replace( '/^www\./', '', (string) wp_parse_url( $item->url, PHP_URL_HOST ) );
		$names = array_filter( [ strtok( $host, '.' ), sanitize_title( $item->title ) ] );

		foreach ( $names as $name ) {
			$icon = get_parent_theme_file_path( "public/svg/social-icons/{$name}.svg" );

			if ( file_exists( $icon ) ) {
				// Keep the title for screen readers; the icon is hidden from them.
				$item->title = file_get_contents( $icon ) . '<span class="screen-reader-text">' . esc_html( $item->title ) . '</span>'; // phpcs:ignore
				break;
			}
		}
	}

	return $items;
}, 10, 2 );


// Example usage
add_action( 'wp_enqueue_scripts', function() {

	enqueue( 'all' );
} );
