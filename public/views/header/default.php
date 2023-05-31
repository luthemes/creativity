<?php
/**
 * Default header template
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="container" class="site-container">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'creativity' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="branding-navigation">
			<div class="site-branding">
				<?php Backdrop\Theme\Site\display_site_title(); ?>
				<?php Backdrop\Theme\Site\display_site_description(); ?>
			</div>
			<?php Backdrop\Template\View\display( 'menu', 'primary', [ 'location' => 'primary'] ); ?>
		</div>
	</header>
	<div class="header-image">
		<?php if ( is_archive() ) { ?>
			<h1 class="header-image-title"><?php the_archive_title(); ?></h1>
			<?php if ( ! is_paged() && get_the_archive_description() ) { ?>
				<div class="header-image-description">
					<?php the_archive_description(); ?>
				</div>
			<?php } ?>
		<?php } else if ( is_singular() ) { ?>
			<h1 class="header-image-title"><?php the_title() ?></h1>
		<?php }  ?>
	</div>
