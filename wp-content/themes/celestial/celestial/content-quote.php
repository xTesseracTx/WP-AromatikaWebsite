<?php
/**
 * Displays quote post format content
 *
 * @file           content-quote.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
	<h1><?php the_title(); ?></h1>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'celestial' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'celestial' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php //luminescence_entry_meta(); ?>

		<?php if ( comments_open() && ! is_single() ) : ?>
		<span class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'celestial' ) . '</span>', __( 'One comment so far', 'celestial' ), __( 'View all % comments', 'celestial' ) ); ?>
		</span><!-- .comments-link -->
		<?php endif; // comments_open() ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->