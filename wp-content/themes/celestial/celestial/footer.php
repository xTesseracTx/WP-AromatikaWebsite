<?php

/**
 * Footer Template
 *
 * @file           footer.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
?>


<div id="footer-wrapper" style="background-color:<?php echo get_theme_mod( 'footer_widgets_bg', '#272b30' ); ?>; color:<?php echo get_theme_mod( 'footer_widgets_text', '#959798' ); ?>;">
	<?php get_template_part( 'sidebar', 'footer' ); ?>
</div>

<div id="copyright-wrapper" style="background-color:<?php echo get_theme_mod( 'copyright_bg', '#161718' ); ?>; border-bottom:1px solid <?php echo get_theme_mod( 'copyright_bottom_border', '#333333' ); ?>; color:<?php echo get_theme_mod( 'copyright_text', '#c4cacf' ); ?>;">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div><?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'fallback_cb' => false, 'container' => false, 'menu_id' => 'st_footer-menu' ) ); ?></div>
				<div>
                <?php esc_attr_e('Copyright &copy;', 'celestial'); ?> <?php _e(date('Y')); ?> <?php echo get_theme_mod( 'copyright', 'Your Name' ); ?>.&nbsp;<?php esc_attr_e('All rights reserved.', 'celestial'); ?>
                
                </div>
				
			</div>
		</div>
	</div>
</div>

		
	</div><!-- #outer-wrapper -->
<?php wp_footer(); ?>
</body>
</html>