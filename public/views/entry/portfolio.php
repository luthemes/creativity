<?php
/**
 * Portfolio entry template
 *
 * Used for a single portfolio item (the `portfolio` post type from the Backdrop Custom
 * Portfolio plugin).
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php Backdrop\Post\display_title( [ 'class' => 'entry-title' ] ); ?>
		<div class="entry-metadata">
			<?php Backdrop\Post\display_date( [ 'class' => 'entry-published' ] ); ?>
		</div>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'creativity-large' ); ?>
		</div>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( [
			'before' => '<nav class="page-links">',
			'after'  => '</nav>',
		] );
		?>
	</div>
</article>
