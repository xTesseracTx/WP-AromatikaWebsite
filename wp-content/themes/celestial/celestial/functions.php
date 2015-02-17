<?php


// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Functions
 *
 * @file           functions.php
 * @package        Celestial Reloaded 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.1.2
 */


/**
 * Set content width
 */
if ( ! isset( $content_width ) )
		$content_width = 770;

/**
 * Adjust the content width for Full Width page template.
 */
function celestial_set_content_width() {
	global $content_width;

	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'blogright' ) ) 
		$content_width = 1170;
}
add_action( 'template_redirect', 'celestial_set_content_width' );

if ( ! function_exists( 'celestial_setup' ) ):
function celestial_setup() {
	/**
	 * Celestial Reloaded is now available for translations.
	 * Add your files into /languages/ directory.
	 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain( 'celestial', get_template_directory() . '/languages' );
	
	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();

	/**
	 * This feature enables post and comment RSS feed links to head.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	* Enable support for Post Formats
	* @see http://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'status', 'quote' ) );
		
	/**
	 * This feature enables post-thumbnail support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

		
	/**
	 * This feature enables custom-menus support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus( array(
		'primary-menu'      => __('Primary Menu', 'celestial'),
		'footer-menu'       => __('Footer Menu', 'celestial'),
		'portfolio-menu'    => __('Portfolio Menu', 'celestial')
	) );
}
endif;
add_action( 'after_setup_theme', 'celestial_setup' );

/**
* Setup the WordPress core custom background feature.
* @see http://codex.wordpress.org/Custom_Backgrounds 
*/

$defaults = array(
	'default-color'          => '000000',
	'default-image'          => '',
);
add_theme_support( 'custom-background', $defaults );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function celestial_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'celestial_page_menu_args' );

/**
 * Sets the post excerpt length to 40 words.
 
function celestial_excerpt_length($length) {
	return 40;
}

add_filter('excerpt_length', 'celestial_excerpt_length');
*/
/**
 * This function removes .menu class from custom menus in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 *
 */
class celestial_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}
 
	public function menu_different_class( $settings, $widget ) {
		if( $widget instanceof WP_Nav_Menu_Widget )
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		return $settings;
	}
 
	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		if( 'menu' == $args['menu_class'] )
			$args['menu_class'] = 'menu-widget';
 
		return $args;
	}
}
new celestial_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function celestial_wp_page_menu ($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
		$divclass = $matches[1];
		$replace = array('<div class="'.$divclass.'">', '</div>');
		$new_markup = str_replace($replace, '', $page_markup);
		$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
		return $new_markup; }

add_filter('wp_page_menu', 'celestial_wp_page_menu');
	
	
/**
 * This function prints post meta data 
 */
if (!function_exists('celestial_post_meta_data')) :

function celestial_post_meta_data() {
	printf( __( '<span class="%3$s"> Author: </span>%4$s', 'celestial' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp">%3$s</span></a>',
		get_permalink(),
		esc_attr( get_the_time() ),
		get_the_date()
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'celestial' ), get_the_author() ),
		get_the_author()
	    )
	);
}
endif;	



/**
 * This function removes inline styles set by WordPress gallery.
 */
	function celestial_remove_gallery_css($css) {
		return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
	}

	add_filter('gallery_style', 'celestial_remove_gallery_css');
		
/**
 * This function removes default styles set by WordPress recent comments widget.
 */
	function celestial_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
	add_action( 'widgets_init', 'celestial_remove_recent_comments_style' );
 
/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 * 
 */
	function celestial_category_rel_removal ($output) {
		$output = str_replace(' rel="category tag"', '', $output);
		return $output;
	}

	add_filter('wp_list_categories', 'celestial_category_rel_removal');
	add_filter('the_category', 'celestial_category_rel_removal');

/**
 * A comment reply.
 */
    function celestial_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) { 
            wp_enqueue_script('comment-reply'); 
        }
    }

    add_action( 'wp_enqueue_scripts', 'celestial_enqueue_comment_reply' );

/**
 * Displays navigation to next/previous pages when applicable.
 */	
	if ( ! function_exists( 'celestial_content_nav' ) ) :
	function celestial_content_nav( $html_id ) {
		global $wp_query;

		$html_id = esc_attr( $html_id );

		if ( $wp_query->max_num_pages > 1 ) : ?>
		
			<nav id="<?php echo $html_id; ?>" class="st_navigation" role="navigation">
				<h3 class="assistive-text"><?php _e( 'More Articles', 'celestial' ); ?></h3>
				<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older Articles', 'celestial' ) ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer Articles <span class="meta-nav">&rarr;</span>', 'celestial' ) ); ?></div>
			</nav><!-- #<?php echo $html_id; ?> .navigation -->
		<?php endif;
	}
	endif;	

/**
 * Move the More Link outside the default content paragraph.
 * Special thanks to http://nixgadgets.vacau.com/archives/134
 */
	function new_more_link($link) {
		$link = '<p class="more-link">'.$link.'</p>';
		return $link;
	}
	add_filter('the_content_more_link', 'new_more_link');	
	

/**
 * Special excerpt length per instance ie showcase column excerpts
 * Thanks to http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 */ 
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 * This theme uses this for the portfolio for any sub portfolio categories
 * 
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 * Special thanks to Michal Ochman http://blog.scur.pl/ for modifying this to use the category name instead of ID
 */

	if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
		function post_is_in_descendant_category( $cats, $_post = null ) {
			foreach ( (array) $cats as $cat ) {
				// get_term_children() accepts integer ID only
				if ( is_string( $cat ) ) {
					$cat = get_term_by( 'slug', $cat, 'category' );
					if ( ! isset( $cat, $cat->term_id ) )
						continue;
					$cat = $cat->term_id;
				}
				$descendants = get_term_children( (int) $cat, 'category' );
				if ( $descendants && in_category( $descendants, $_post ) )
					return true;
			}
			return false;
		}
	}	
	
/**
 * Enqueue scripts and styles
 */

function celestial_scripts() {
	global $wp_styles;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads the theme stylesheet	
	wp_enqueue_style( 'celestial-style', get_stylesheet_uri() );	
	
	// Loads the theme scripts
	wp_enqueue_script('celestial-respond', get_template_directory_uri() . '/js/celestial-respond.js', array('jquery'), '1.3.0', false);
	wp_enqueue_script('celestial-html5', get_template_directory_uri() . '/js/celestial-html5.js', array('jquery'), '1.3.0', false);
    wp_enqueue_script('celestial-bootstrap', get_template_directory_uri() . '/js/celestial-bootstrap.js', array('jquery'), '2.2.2', true);
	wp_enqueue_script('celestial-bootstrap-st', get_template_directory_uri() . '/js/celestial-bootstrap-st.js', array('jquery'), '2.2.2', true);			
	wp_enqueue_script( 'celestial-navigation', get_template_directory_uri() . '/js/celestial-navigation.js', array(), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'celestial_scripts' );

	
/**
 * Adds customizable styles to your <head>
 */
	function theme_customize_css()
	{
		?>
		<style type="text/css">
		.main-navigation a, .main-navigation li.home a {color: <?php echo get_theme_mod( 'menulink', '#555555' ); ?>;}	
		.main-navigation li a:hover {color: <?php echo get_theme_mod( 'menulinkhover', '#467fc2' ); ?>;}	
		.main-navigation ul li:hover > ul {background-color: <?php echo get_theme_mod( 'submenubg', '#f6f6f6' ); ?>; border-color:<?php echo get_theme_mod( 'mainmenuactive', '#467fc2' ); ?>;}
		.main-navigation li ul li:hover {background-color: <?php echo get_theme_mod( 'submenubghover', '#ededed' ); ?>;	color: <?php echo get_theme_mod( 'submenulinkhover', '#467fc2' ); ?>;}	
		.main-navigation li ul li a:hover {color: <?php echo get_theme_mod( 'submenulinkhover', '#467fc2' ); ?>;}		
		.main-navigation .current-menu-item > a,
		.main-navigation .current-menu-ancestor > a, 
		.main-navigation .current_page_item > a,
		.main-navigation .current_page_ancestor > a {color: <?php echo get_theme_mod( 'mainmenuactive', '#467fc2' ); ?>;}		
		.main-navigation ul.sub-menu li.current-menu-item > a,
		.main-navigation ul.sub-menu li.current-menu-ancestor > a,
		.main-navigation ul.sub-menu li.current_page_item > a,
		.main-navigation ul.sub-menu li.current_page_ancestor > a {color: <?php echo get_theme_mod( 'submenuactive', '#467fc2' ); ?>; background:<?php echo get_theme_mod( 'submenuactivebg', '#ededed' ); ?>;}	
		
		h1, h2, h3, h4, h5, h6, h1 a, h2 a {color: <?php echo get_theme_mod( 'headings', '#252525' ); ?>;}
		h1 a:hover, h2 a:hover {color: <?php echo get_theme_mod( 'content_links', '#467fc2' ); ?>;}
		#cta h1, #cta h2, #cta p {color: <?php echo get_theme_mod( 'cta', '#252525' ); ?>;}
		#breadcrumbs a, #content-wrapper a,	#content-wrapper a:visited {color: <?php echo get_theme_mod( 'content_links', '#467fc2' ); ?>;}
		#content-wrapper a:hover {color: <?php echo get_theme_mod( 'content_links_hover', '#848484' ); ?>;}	
		#bottom-group a {color:<?php echo get_theme_mod( 'bottomgroup_links', '#467fc2' ); ?>;}
		#socialbar .genericon {background-color: <?php echo get_theme_mod( 'socialicon_bg', '#575858' ); ?>;}
		#social-icons a {color: <?php echo get_theme_mod( 'socialicon', '#b4b4b4' ); ?>;}
		#social-icons a:hover {color: <?php echo get_theme_mod( 'socialicon_hover', '#ffffff' ); ?>;}	
		#footer-wrapper h4 {color: <?php echo get_theme_mod( 'footer_widgets_heading', '#ffffff' ); ?>;}
		#footer-wrapper a {color: <?php echo get_theme_mod( 'footer_widgets_links', '#cccccc' ); ?>;}
		#copyright-wrapper a {color: <?php echo get_theme_mod( 'copyright_links', '#c4cacf' ); ?>;}	
		</style>
		<?php
	}
	add_action( 'wp_head', 'theme_customize_css');
	
/**
 *
 * Load additional functions and theme options
 *
 */
	require ( get_template_directory() . '/includes/theme-customizer.php' );
	require ( get_template_directory() . '/includes/custom-header.php' );
	require ( get_template_directory() . '/includes/widgets.php' );
	require ( get_template_directory() . '/includes/comment-form.php' );

/**
 * WordPress.com-specific functions and definitions
 */
	require( get_template_directory() . '/includes/wpcom.php' );

/**
* Load Jetpack compatibility file.
*/
	require( get_template_directory() . '/includes/jetpack.php' );		
	
/**
 * Add WooCommerce support.
 */
add_theme_support( 'woocommerce' );	