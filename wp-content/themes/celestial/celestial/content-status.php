<?php
/**
 * Displays status post format content
 *
 * @file           content-status.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content row-fluid">
	<div class="span1"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'celestial_status_avatar', '70' ) ); ?></div>
	<div class="span11">
	<div class="entry-header">
		<header class="format-status-header">
        	<h1 class="entry-title-status"><?php the_title(); ?></h1>
			<h2 class="entry-date"><?php printf( __( 'Update By: ', 'celestial' ) ) ; ?><?php the_author(); ?> <br /><span class="format-status-date"><?php _e( 'Date: ', 'celestial' ); ?><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></span></h2>	
		</header>			
	</div><!-- .entry-header -->
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'celestial' ) ); ?>
	</div>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php //celestial_entry_meta(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'celestial' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->