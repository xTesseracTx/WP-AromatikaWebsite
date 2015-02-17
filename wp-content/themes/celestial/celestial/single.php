<?php

/**
 * Displays the full post
 *
 * @file           single.php
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
		
			<?php if ( in_category( 'portfolio' ) || post_is_in_descendant_category( 'portfolio' ) ) : // if this is a post from a portfolio category then use this
			?>
				<div id="component" class="site-content span12" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', ('singleportfolio') ); ?>
					<?php endwhile; // end of the loop. ?>				
				</div><!-- #component -->
			<?php else : // or if this is the standard blog post, use this layout ?>
		
				<?php $blogsidebar = get_theme_mod( 'blog_sidebar', 'rightcolumn' );
				 switch ($blogsidebar) {
					case "rightcolumn" :
						get_template_part( 'blog-right' );
					break;
					case "leftcolumn" : 
						get_template_part( 'blog-left' );
					break;
					case "fullwidth" :
						get_template_part( 'blog-full' );			 
					break;
					} 
				?>
				
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>