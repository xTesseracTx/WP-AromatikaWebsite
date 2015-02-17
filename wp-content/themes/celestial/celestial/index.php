<?php

/**
 * Index Template
 *
 * @file           index.php
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

	</div><!-- .row -->
</div><!-- .container -->

</div>

<?php get_footer(); ?>