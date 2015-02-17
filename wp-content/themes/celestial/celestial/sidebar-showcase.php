<?php

/**
 * Call to Action sidebar
 *
 * @file           sidebar-showcase.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

?>

<div id="showcase-wrapper" style="background-color:<?php echo get_theme_mod( 'bannerbg', '#4b7eae' ); ?>; border-bottom-color:<?php echo get_theme_mod( 'showcase_bottom_line', '#bcc0c3' ); ?>; border-top-color:<?php echo get_theme_mod( 'showcase_top_line', '#525458' ); ?>">

<?php if ( is_front_page() ) : // show the wp header or the showcase widget with the curve ?>
	<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<div id="wp-header" style="padding:<?php echo get_theme_mod( 'showcasepad', '0px 0px 0px 0px' ); ?>;">
				<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>" />				
					<?php if( get_theme_mod( 'hide_curve' ) == '') { ?>
						<div id="curve">
							<img src="<?php echo get_template_directory_uri(); ?>/images/showcase-curve.png" alt="showcase curve" />
						</div>
					<?php } ?>
			</div>
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'showcase' ) ) : ?>
		<div id="showcase" role="complementary" style="padding:<?php echo get_theme_mod( 'showcasepad', '0px 0px 0px 0px' ); ?>;">
			<?php dynamic_sidebar( 'showcase' ); ?>
				<?php if( get_theme_mod( 'hide_curve' ) == '') { ?>
						<div id="curve">
							<img src="<?php echo get_template_directory_uri(); ?>/images/showcase-curve.png" alt="showcase curve" />
						</div>
					<?php } ?>
		</div><!-- #showcase -->
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'banner' ) ) : ?>
		<div id="banner" role="complementary" style="padding:<?php echo get_theme_mod( 'bannerpad', '0px 0px 0px 0px' ); ?>;">
		<?php dynamic_sidebar( 'banner' ); ?>
		</div><!-- #banner -->
	<?php endif; ?>	
	
<?php else : // otherwise show the banner without the curve ?>	
		<?php if ( is_active_sidebar( 'banner' ) ) : ?>
		<div id="banner" role="complementary" style="padding:<?php echo get_theme_mod( 'bannerpad', '0px 0px 0px 0px' ); ?>;">
		<?php dynamic_sidebar( 'banner' ); ?>
		</div><!-- #banner -->
	<?php endif; ?>	
<?php endif; ?>


</div>