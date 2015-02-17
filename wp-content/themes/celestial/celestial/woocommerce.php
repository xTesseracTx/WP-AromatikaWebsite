<?php
/**
 * Description: A page template with the right column for WooCommerce
 *
 * @file           woocommerce.php
 * @package        Celestial 
 * @author         Andre
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0.1
 */

get_header(); ?>

<div id="content-wrapper" style="color:<?php echo get_theme_mod( 'content_text', '#848484' ); ?>">
	<div class="container">			
		<div class="row">
			
			<div class="span8">
				<?php woocommerce_content(); ?>		
			</div>
			
			<aside id="right-column" class="span4">
				<?php get_sidebar( 'page-right' ); ?>
			</aside>
		</div>	
	</div>
</div>

<?php get_footer(); ?>