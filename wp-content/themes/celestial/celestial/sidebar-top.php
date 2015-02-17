<?php

/**
 * Bottom sidebar group
 *
 * @file           sidebar-top.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */

 
if (   ! is_active_sidebar( 'top1'  )
	&& ! is_active_sidebar( 'top2' )
	&& ! is_active_sidebar( 'top3'  )
	&& ! is_active_sidebar( 'top4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<aside id="top-group" class="clearfix">
	
			
			<?php if ( is_active_sidebar( 'top1' ) ) : ?>
				<div id="top1" <?php topgroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'top1' ); ?>
				</div><!-- #top1 -->
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'top2' ) ) : ?>
				<div id="top2" <?php topgroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'top2' ); ?>
				</div><!-- #top2 -->
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'top3' ) ) : ?>
				<div id="top3" <?php topgroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'top3' ); ?>
				</div><!-- #top3 -->
			<?php endif; ?>
				
			<?php if ( is_active_sidebar( 'top4' ) ) : ?>
				<div id="top4" <?php topgroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'top4' ); ?>
				</div><!-- #top4 -->
			<?php endif; ?>
			

</aside> 