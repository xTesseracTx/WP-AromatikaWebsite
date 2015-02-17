<?php

/**
 * Displays page content
 *
 * @file           content-page.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
	<div class="row-fluid">
		<?php the_post_thumbnail( ); ?>
	</div>
	<?php endif; ?>
	
	<header class="entry-header">
        <?php if( get_theme_mod( 'hide_title' ) == '') { ?>
            <h1 class="page-title"><?php the_title(); ?><?php edit_post_link( __( 'Edit', 'celestial' ), '<span class="page-edit-link">', '</span>' ); ?></h1>
        <?php } ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'celestial' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-meta">
	</footer>
	
</article><!-- #post -->