<?php
/**
 *
   Template Name: Page Centered Heading
 *
 * Description: A page template for centered content
 *
 * @file           page-centered.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */

get_header(); ?>

<div id="content-wrapper" style="color:<?php echo get_theme_mod( 'content_text', '#848484' ); ?>">
	<div class="container">
		<div class="row">
			<div class="span12">

			<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
	<div class="row-fluid">
		<div class="post-thumbnail span12" style="margin-bottom:40px;"><?php the_post_thumbnail( ); ?></div>
	</div>
	<?php endif; ?>
		<header class="entry-header" style="text-align:center;">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'st' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'st' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
				<?php if ( get_theme_mod('page_comments','0') ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>