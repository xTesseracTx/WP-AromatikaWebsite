<?php

/**
 * Header Template
 *
 * @file           header.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.1.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
 
</head>
<body <?php body_class(); ?>>

<div id="cel-wrapper" style="border-color:<?php echo get_theme_mod( 'topline', '#000000' ); ?>; background-color: <?php echo get_theme_mod( 'contentbg', '#ffffff' ); ?>;">			 
	<header id="cel-header" style="background-color: <?php echo get_theme_mod( 'headerbg', '#f6f6f6' ); ?>;">
		<div class="container">
			<div class="row">			
				<div class="span4">					
					<?php 
					$logostyle = get_theme_mod( 'logo_style', 'default' );
					 switch ($logostyle) {
						case "default" : // default theme logo ?>
							<div id="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/images/demo-logo.png" alt="<?php bloginfo( 'name' ); ?>" />
							</a>
							</div>	 
						<?php break;
						case "custom" : // your own logo ?>
							<?php if ( get_option('my_logo') ) : ?>
								<div id="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php echo get_option( 'my_logo' ); ?> "/>
								</a>
								</div>
							<?php endif; ?>			 
						<?php break;
						case "text" : // text based title and site description ?>
							<hgroup id="st-site-title">
								<h1 id="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
										<span><?php bloginfo( 'name' ); ?></span>
									</a>
								</h1>
								<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
							</hgroup>			
						<?php break;
						} 
					?>				
				</div>
				<div class="span8">
						<nav id="site-navigation" class="main-navigation" role="navigation" style="margin-top:<?php echo get_theme_mod( 'menumargin', '30px' ); ?>">
							<h3 class="menu-toggle"><?php _e( 'Site Menu', 'celestial' ); ?></h3>
							<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
						</nav><!-- #site-navigation -->				
					</div>
				</div>
			</div>
	</header>
	
	
	
<div id="social-wrapper" style="background-color:<?php echo get_theme_mod( 'socialbg', '#393c3f' ); ?>; <?php if( get_theme_mod( 'hide_sociallines' ) == '') { ?>background-image: url('<?php echo get_template_directory_uri(); ?>/images/socialbar-bg.png');<?php } ?>">
	<div class="container">
		<div class="row">	
		<?php if( get_theme_mod( 'hide_social' ) == '') { ?>
			<div id="socialbar">
				<?php $options = get_theme_mods();								
				echo '<div id="social-icons">';										
				if (!empty($options['twitter_uid'])) echo '<a target="_blank" title="Twitter" href="' . $options['twitter_uid'] . '"><div id="twitter" class="genericon"></div></a>';
				if (!empty($options['facebook_uid'])) echo '<a target="_blank" title="Facebook" href="' . $options['facebook_uid'] . '"><div id="facebook" class="genericon"></div></a>';
				if (!empty($options['google_uid'])) echo '<a target="_blank" title="Google+" href="' . $options['google_uid'] . '"><div id="google" class="genericon"></div></a>';			
				if (!empty($options['linkedin_uid'])) echo '<a target="_blank" title="Linkedin" href="' . $options['linkedin_uid'] . '"><div id="linkedin" class="genericon"></div></a>';
				if (!empty($options['pinterest_uid'])) echo '<a target="_blank" title="Pinterest" href="' . $options['pinterest_uid'] . '"><div id="pinterest" class="genericon"></div></a>';
				if (!empty($options['flickr_uid'])) echo '<a target="_blank" title="Flickr" href="' . $options['flickr_uid'] . '"><div id="flickr" class="genericon"></div></a>';
				if (!empty($options['youtube_uid'])) echo '<a target="_blank" title="Youtube" href="' . $options['youtube_uid'] . '"><div id="youtube" class="genericon"></div></a>';
				if (!empty($options['vimeo_uid'])) echo '<a target="_blank" title="Vimeo" href="' . $options['vimeo_uid'] . '"><div id="vimeo" class="genericon"></div></a>';	
				if (!empty($options['rss_uid'])) echo '<a target="_blank" title="RSS" href="' . $options['rss_uid'] . '"><div id="rss" class="genericon"></div></a>';	 
				echo '</div>'
				?>	
			</div>
		<?php } ?>
		</div>
	</div>
</div>

<?php get_template_part( 'sidebar', 'showcase' ); ?>

<div id="breadcrumb-wrapper">
	<div class="container">
		<div class="row">
			<?php if ( !is_front_page() ) : ?>
				<div id="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php if ( is_front_page() ) : ?>
	<?php get_template_part( 'sidebar', 'cta' ); ?>
<?php endif; ?>