<?php

/**
 * Displays post intros from a category
 *
 * @file           category.php
 * @package        Encounters 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

get_header(); ?>

	<!-- Main Content -->			
<div id="content-wrapper" style="background-color:<?php echo get_theme_mod( 'contentbg', '#ffffff' ); ?>; color:<?php echo get_theme_mod( 'contenttext', '#787b7f' ); ?>; border-color:<?php echo get_theme_mod( 'contentborder', '#bf7b7b' ); ?>;">
	<div class="container">
		<div class="row">

			<?php if ( is_category( 'portfolio' ) || post_is_in_descendant_category( 'portfolio' ) ) : ?>

				<!-- Component -->
					<div id="component" class="span12" role="main">
					
						<?php if ( have_posts() ) : ?>
							<header class="archive-header category-description clearfix">
								<h1 class="archive-title"><?php printf( __( '%s', 'celestial' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

							<?php if ( category_description() ) : // Show an optional category description ?>
								<div class="archive-meta"><?php echo category_description(); ?></div>
							<?php endif; ?>
							</header><!-- .archive-header -->
							
							<div id="st-portfolio-row" class="row">
							
								<?php if ( has_nav_menu( 'portfolio-menu' ) ) : ?>
						
									<div class="span2 st_portfolio-menu-label">
										<?php _e( 'Portfolio Categories: ', 'celestial' ); ?>
									</div>
									<div id="portfolio-menu" class="span10">
										<?php wp_nav_menu( array( 'theme_location' => 'portfolio-menu', 'fallback_cb' => false, 'container' => false, 'menu_id' => 'st_portfolio-menu' ) ); ?>
									</div>
								<?php endif; ?> 	
									
							</div>
							
							<div class="row">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/* Include the post format-specific template for the content. If you want to
								 * this in a child theme then include a file called called content-___.php
								 * (where ___ is the post format) and that will be used instead.
								 */
								$portcol = get_theme_mod( 'portfolio_col', 'portfolio3'); 
								get_template_part( 'content', $portcol );

							endwhile;

							
							?>
							</div>
							<div class="row">
							<?php celestial_content_nav( 'nav-below' ); ?>
							</div>
						<?php endif; ?>
					</div><!-- end component -->
									
			<?php else : // or if this is the standard blog, use this layout ?>

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