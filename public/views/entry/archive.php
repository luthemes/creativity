<?php
/**
 * Archive entry template
 *
 * Used for posts in category, tag, date and author archives. Each entry is an item in the
 * archive's `.grid-items` list.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */
?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'creativity-small' ); ?>
		</a>
	<?php endif; ?>
	<header class="entry-header">
		<?php Backdrop\Post\display_title( [ 'class' => 'entry-title', 'tag' => 'h2' ] ); ?>
		<div class="entry-metadata">
			<?php Backdrop\Post\display_date( [ 'class' => 'entry-published' ] ); ?>
		</div>
	</header>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</li>
