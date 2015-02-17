<?php

/**
 *
   Template Name: Page Widgets Right Column
 *
 * Description: A page template with widgets and the right column
 *
 * @file           page-widgets-right-column.php
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
			<?php get_template_part( 'sidebar', 'top' ); ?>
		</div>
		<div class="row">
			<?php get_template_part( 'sidebar', 'top-inset' ); ?>
		</div>	
		<div class="row">			
			<div class="span8">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
				<?php celestial_content_nav( 'post-nav' ); ?>			
			</div>
			
			<aside id="right-column" class="span4">
				<?php get_sidebar( 'page-right' ); ?>
			</aside>
		</div>
		<div class="row">
		<?php get_template_part( 'sidebar', 'bottom-inset' ); ?>
		</div>
		
	</div>
</div>

<?php get_template_part( 'sidebar', 'bottom' ); ?>

<?php get_footer(); ?>