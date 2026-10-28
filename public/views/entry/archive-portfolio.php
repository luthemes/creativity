<?php
/**
 * Portfolio archive entry template
 *
 * Used for the portfolio archive. Unlike the other entry templates, this one contains the loop,
 * so the portfolio items are output as a single `.portfolio-items` list.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */
?>
<header class="entry-header">
	<h1 class="entry-title"><?php post_type_archive_title(); ?></h1>
</header>
<ul class="portfolio-items">
	<?php while ( have_posts() ) : the_post(); ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-item' ); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'creativity-medium' ); ?>
				</a>
			<?php endif; ?>
			<div class="wp-caption">
				<?php
				Backdrop\Post\display_title( [
					'class' => 'wp-caption-text',
					'tag'   => 'h2',
				] );
				?>
			</div>
		</li>
	<?php endwhile; ?>
</ul>
<?php the_posts_pagination(); ?>
