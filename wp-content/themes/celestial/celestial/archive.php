<?php

/**
 * Main Archive template
 *
 * @file           archive.php
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
			
				<?php $archivesidebar = get_theme_mod( 'archive_sidebar', 'rightcolumn' );
				 switch ($archivesidebar) {
					case "rightcolumn" :
						get_template_part( 'archive-right' );
					break;
					case "leftcolumn" : 
						get_template_part( 'archive-left' );
					break;
					case "fullwidth" :
						get_template_part( 'archive-full' );			 
					break;
					} 
				?>
				
		</div>
	</div>
</div>

<?php get_footer(); ?>