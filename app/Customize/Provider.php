<?php
/**
 * Customize service provider.
 *
 * Binds the framework's `Backdrop\Customize\Component` to the container with
 * the theme's customizable components and boots it. The framework component
 * registers the `Theme: Global`, `Theme: Header`, `Theme: Content` and
 * `Theme: Footer` panels, moves the core sections into them, and registers
 * the `radio-image` control type, so the theme only adds its own sections,
 * settings and controls.
 *
 * Note: `Backdrop\Customize\Provider` is intentionally not registered in
 * `app/framework.php`; this provider replaces it so the component is only
 * booted once.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity\Customize;

use Backdrop\Core\ServiceProvider;
use Backdrop\Customize\Component;

use function Backdrop\is_plugin_or_class_active;

/**
 * Customize provider class.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {

	/**
	 * Registration callback that adds a single instance of the customize
	 * component to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function register(): void {

		$this->app->singleton( Component::class, function() {

			$components = [
				Footer\Customize::class,
				Layout\Customize::class,
			];

			if ( is_plugin_or_class_active( 'backdrop-custom-portfolio/backdrop-custom-portfolio.php' ) ) {
				$components[] = Home\Customize::class;
			}

			return new Component( $components );
		} );
	}

	/**
	 * Boots the customize component.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function boot(): void {

		$this->app->resolve( Component::class )->boot();
	}
}
