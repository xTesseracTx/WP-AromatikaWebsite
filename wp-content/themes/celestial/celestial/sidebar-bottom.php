<?php

/**
 * Bottom sidebar group
 *
 * @file           sidebar-bottom.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */

 
if (   ! is_active_sidebar( 'bottom1'  )
	&& ! is_active_sidebar( 'bottom2' )
	&& ! is_active_sidebar( 'bottom3'  )
	&& ! is_active_sidebar( 'bottom4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>
<aside id="bottom-group" style="background-color:<?php echo get_theme_mod( 'bottomgroup_bg', '#ebebeb' ); ?>; color:<?php echo get_theme_mod( 'bottomgroup_text', '#848484' ); ?>;">
	<div class="container">
		<div class="row">		
			<?php if ( is_active_sidebar( 'bottom1' ) ) : ?>
				<div id="bottom1" <?php bottomgroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'bottom1' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'bottom2' ) ) : ?>
				<div id="bottom2" <?php bottomgroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'bottom2' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'bottom3' ) ) : ?>
				<div id="bottom3" <?php bottomgroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'bottom3' ); ?>
				</div>
			<?php endif; ?>
				
			<?php if ( is_active_sidebar( 'bottom4' ) ) : ?>
				<div id="bottom4" <?php bottomgroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'bottom4' ); ?>
				</div>
			<?php endif; ?>			
		</div>
	</div>
</aside> 