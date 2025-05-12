<?php
/**
 * Footer customize class.
 *
 * Adds customizer elements for the footer component.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity\Image;

use WP_Customize_Manager;
use Creativity\Customize\Customizable;
use Creativity\Tools\Mod;

/**
 * Footer customize class.
 *
 * @since 1.0.0
 * @access public
 */
class Customize extends Customizable {

	/**
	 * App layouts object.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Layouts
	 */
	protected $image_sizes;

	/**
	 * Registers customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {

		$manager->add_section( 'theme_content_feature_image', [
			'title' => esc_html__( 'Feature Image', 'generosity' ),
			'panel' => 'theme_content'
		] );
	}

	/**
	 * Registers customizer settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {

        // Add a setting for the feature image size.
        $manager->add_setting( 'theme_content_feature_image', array(
            'default'           => Mod::fallback( 'featured_image_size' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_key'
        ) );
	}

	/**
	 * Registers customizer controls.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {

        // Add a control for the feature image size.
        $manager->add_control( 'theme_content_feature_image', array(
            'label'    => __( 'Feature Image Size', 'generosity' ),
            'section'  => 'theme_content_feature_image',
            'settings' => 'theme_content_feature_image',
            'type'     => 'select',
            'choices'  => $this->image_sizes->customizeChoices(),
        ) );
 }
}