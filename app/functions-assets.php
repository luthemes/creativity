<?php
/**
 * Default scripts functions
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity;

use function Backdrop\Mix\asset;
use Creativity\Template\ErrorPage;
use Creativity\Settings\Options;

/**
 * Enqueue Scripts and Styles
 *
 * @since  1.0.0
 * @access public
 * @return void
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */

add_action( 'wp_enqueue_scripts', function() {

	// Rather than enqueue the main style.css stylesheet, we are going to enqueue screen.css.
	wp_enqueue_style( 'creativity-screen', asset( 'resources/scss/screen.scss' ), null, null );

	// Enqueue theme scripts
	wp_enqueue_script( 'creativity-app', asset( 'resources/js/app.js' ), [ 'jquery' ], null, true );

	// Enqueue Navigation.
	wp_enqueue_script( 'creativity-navigation', asset( 'resources/js/navigation.js' ), [ 'jquery' ], null, true );

	// Screen reader text for the menu toggles. `navigation.js` sets these as plain text.
	wp_localize_script( 'creativity-navigation', 'creativityScreenReaderText', [
		'expandMain'    => __( 'Open the main menu', 'creativity' ),
		'collapseMain'  => __( 'Close the main menu', 'creativity' ),
		'expandChild'   => __( 'expand child menu', 'creativity' ),
		'collapseChild' => __( 'collapse child menu', 'creativity' ),
	] );

	// Loads ClassicPress' comment-reply script where appropriate.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

/**
 * Enqueue the customizer controls script, which hides controls whose active callback is
 * false (see `resources/js/customize-controls.js`), and style the Global Layout control.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'customize_controls_enqueue_scripts', function() {

	wp_enqueue_script( 'creativity-customize-controls', asset( 'resources/js/customize-controls.js' ), [ 'customize-controls' ], null, true );

	wp_add_inline_style( 'customize-controls', '
		li.customize-control.creativity-control-inactive { display: none !important; }
		.customize-control-backdrop-radio-image .radio-image { display: inline-block; margin: 0 8px 8px 0; cursor: pointer; }
		.customize-control-backdrop-radio-image input[type="radio"] { position: absolute; opacity: 0; }
		.customize-control-backdrop-radio-image img { display: block; border: 4px solid transparent; box-sizing: border-box; }
		.customize-control-backdrop-radio-image img:hover { border-color: #ccc; }
		.customize-control-backdrop-radio-image input:checked ~ img { border-color: #00a0d2; }
		.customize-control-backdrop-radio-image input:focus-visible ~ img { outline: 2px solid #2271b1; }
	' );
} );

add_action('wp_enqueue_scripts', function() {

	$custom_image = esc_url( get_theme_mod( 'custom_image', get_theme_file_uri( '/public/images/header-image.jpg' ) ) );
	$avatar_image = esc_url( get_theme_mod( 'custom_avatar', get_theme_file_uri( '/public/images/avatar.jpg' ) ) );

	$custom_css = "
			.header-image {
				background: url({$custom_image});
				background-size: cover !important;
				box-sizing: border-box;
				padding: 8rem 0;
			}

			.header-image .header-image-title {
				color: #ffffff;
				font-size: 3rem;
				margin: 0;
				padding: 0;
				text-align: center;
			}

			.header-image .header-description {
				line-height: 1.8rem;
				color: #ffffff;
				margin: 0 auto;
				max-width: 768px;
				text-align: center;
			}

			.header-image .header-image-metadata {
				color: #ffffff;
				font-family: Tangerine;
				font-size: 1.8rem;
				text-align: center;
			}
		";
	wp_add_inline_style( 'creativity-screen', $custom_css );
}
);

/**
 * Adds error data for the 404 content template. Passes in the `ErrorPage` object
 * as the `$error` variable.
 *
 * @since  1.0.0
 * @access public
 * @param  Backdrop\Tools\Collection  $data
 * @return Backdrop\Tools\Collection
 */
add_filter( 'backdrop/view/content/data', function( $data ) {

	if ( is_404() ) {
		$data->add( 'error', new ErrorPage() );
	}

	return $data;

} );

/**
 * Filters the post states on the manage pages screen. Adds a "404 Page" state
 * to show users which page has been assigned as their 404 page.
 *
 * @since  1.0.0
 * @access public
 * @param  array    $states
 * @param  \WP_Post $post
 * @return array
 */
add_filter( 'display_post_states', function( $states, $post ) {

	if ( 'page' === $post->post_type && $post->ID === absint( Options::get( 'error_page' ) ) ) {
		$states['creativity_error_404'] = __( '404 Page', 'creativity' );
	}

	return $states;

}, 10, 2 );