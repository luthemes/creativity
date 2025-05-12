<?php
/**
 * Image Service Provider.
 *
 * Bootstraps the image component.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity\Image;

use Backdrop\Core\ServiceProvider;

/**
 * Image service provider class.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {

	/**
	 * Binds image component to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		$this->app->singleton( Size\Sizes::class   );

		$this->app->singleton( Size\Component::class, function() {
			return new Size\Component(
				$this->app->resolve( Size\Sizes::class )
			);
		} );

		$this->app->singleton( Customize::class, function() {
			return new Customize( [
				'image_sizes'  => $this->app->resolve( 'image/sizes' ),
			] );
		} );

		$this->app->alias( Size\Sizes::class,     'image/sizes'   );
	}

	/**
	 * Bootstrap the image size component.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
		$this->app->resolve( Size\Component::class   )->boot();
	}
}