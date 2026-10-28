<?php
/**
 * Filter functions
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity;

/**
 * Keeps the core menu item classes.
 *
 * The Backdrop framework replaces the core menu item classes (`menu-item`,
 * `current-menu-item`, `menu-item-has-children`, ...) with its own
 * (`menu__item`, `menu__item--current`, `has-children`, ...). The theme's
 * styles and `navigation.js` use the core classes, so the framework's filter
 * is removed. It is added when the application is created, so this runs on
 * `after_setup_theme`.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	remove_filter( 'nav_menu_css_class', 'Backdrop\nav_menu_css_class', 5 );
} );
