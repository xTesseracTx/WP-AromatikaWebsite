<?php

/**
 * Bottom sidebar group
 *
 * @file           sidebar-footer.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

 
if (   ! is_active_sidebar( 'footer1'  )
	&& ! is_active_sidebar( 'footer2' )
	&& ! is_active_sidebar( 'footer3'  )
	&& ! is_active_sidebar( 'footer4'  )
	&& ! is_active_sidebar( 'footerinset'  )
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="footer-group">
	<div class="container">
		<div class="row">
			
			<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
				<div id="footer1" <?php footergroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div><!-- #top1 -->
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
				<div id="footer2" <?php footergroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div><!-- #top2 -->
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
				<div id="footer3" <?php footergroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div><!-- #top3 -->
			<?php endif; ?>
				
			<?php if ( is_active_sidebar( 'footer4' ) ) : ?>
				<div id="footer4" <?php footergroup(); ?> role="complementary">
					<?php dynamic_sidebar( 'footer4' ); ?>
				</div><!-- #top4 -->
			<?php endif; ?>
			
		</div>
		
		<div class="row">
			<?php if ( is_active_sidebar( 'footerinset' ) ) : ?>
				<div id="footer-inset" class="span12" role="complementary">
					<?php dynamic_sidebar( 'footerinset' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div> 