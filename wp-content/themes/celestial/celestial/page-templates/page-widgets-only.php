<?php

/**
 *
   Template Name: Page Widgets Only
 *
 * Description: A page template with only widgets
 *
 * @file           page-widgets-only.php
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
<?php get_template_part( 'sidebar', 'bottom-inset' ); ?>
</div>
<?php get_template_part( 'sidebar', 'bottom' ); ?>

</div>
</div>
<?php get_footer(); ?>