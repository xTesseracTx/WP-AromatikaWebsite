<?php

/**
 * Main Author Template
 *
 * @file           author.php
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

			<?php $authorsidebar = get_theme_mod( 'author_sidebar', 'rightcolumn' );
			 switch ($authorsidebar) {
				case "rightcolumn" :
					get_template_part( 'author-right' );
				break;
				case "leftcolumn" : 
					get_template_part( 'author-left' );
				break;
				case "fullwidth" :
					get_template_part( 'author-full' );			 
				break;
				} 
			?>
			
		</div>
	</div>
</div>

<?php get_footer(); ?>