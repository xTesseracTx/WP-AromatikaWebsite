<?php
/**
 * Displays image post format content
 *
 * @file           content-image.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'celestial' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="format-image entry-meta">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'celestial' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<h1><?php the_title(); ?></h1>
				<h2 class="entry-date"><?php _e( 'Date: ', 'celestial' ); ?><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></h2>
			</a>
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'celestial' ) . '</span>', __( '1 Reply', 'celestial' ), __( '% Replies', 'celestial' ) ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->