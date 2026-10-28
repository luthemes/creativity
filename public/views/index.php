<?php
/**
 * Default index template
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

// Loads header/*.php templates
Backdrop\View\display( 'header', Backdrop\Template\hierarchy() );

// Loads content/*.php templates
Backdrop\View\display( 'content', Backdrop\Template\hierarchy() );

// Loads footer/*.php templates
Backdrop\View\display( 'footer', Backdrop\Template\hierarchy() );
