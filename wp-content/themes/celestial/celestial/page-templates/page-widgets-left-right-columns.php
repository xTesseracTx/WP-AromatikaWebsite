<?php

/**
 *
   Template Name: Page Widgets Left+Right Columns
 *
 * Description: A page template with widgets and the left and right columns
 *
 * @file           page-widgets-left-right-columns.php
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
			<aside id="left-column" class="span3">
				<?php get_sidebar( 'page-left' ); ?>
			</aside>
			
			<div class="span5">
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