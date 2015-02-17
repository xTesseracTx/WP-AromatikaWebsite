<?php

/**
 * Theme Options and Settings
 *
 * @file           theme-customizer.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
 
 
/**
 * Lets create a customizable theme and begin with some pre-setup
 */ 
 
	add_action('customize_register', 'theme_customize');
	function theme_customize($wp_customize) {

// Lets remove the default background colour so we can move it with a new setting
	$wp_customize->remove_setting( 'background_color');
	$wp_customize->remove_control( 'background_color');


/**
 * Lets add a logo to our Title and Tagline group
 */
	$wp_customize->add_setting( 'logo_style', array(
		'default' => 'default',
	) );
// Setting group for selecting logo title	
	$wp_customize->add_control( 'logo_style', array(
    'label'   => __( 'Logo Style', 'celestial' ),
    'section' => 'title_tagline',
	'priority' => '1',
    'type'    => 'radio',
        'choices' => array(
            'default' => __( 'Default Logo', 'celestial' ),
            'custom' => __( 'Your Logo', 'celestial' ),
            'text' => __( 'Text Title', 'celestial' ),
        ),
    ));
	
// Setting group for uploading logo
    $wp_customize->add_setting('my_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'my_logo', array(
        'label'    => __('Your Logo', 'celestial'),
        'section'  => 'title_tagline',
        'settings' => 'my_logo',
		'priority' => '2',
    )));
	
/**
 * Lets add a section tab called BASIC SETTINGS
 */
 
	$wp_customize->add_section( 'basic_settings', array(
		'title'          => __( 'Basic Settings', 'celestial' ),
		'priority'       => 25,
	) );

/**
 * Options for the Basic Settings section
 */
 
// Setting for content or excerpt
	$wp_customize->add_setting( 'excerpt_content', array(
		'default' => 'content',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content', array(
    'label'   => __( 'Content or Excerpt', 'celestial' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'content' => __( 'Content', 'celestial' ),
            'excerpt' => __( 'Excerpt', 'celestial' ),	
        ),
	'priority'       => 1,
    ));

// Setting group for a excerpt
	$wp_customize->add_setting( 'excerpt_limit', array(
		'default'        => '50',
	) );
	$wp_customize->add_control( 'excerpt_limit', array(
		'settings' => 'excerpt_limit',
		'label'    => __( 'Excerpt Length', 'celestial' ),
		'section'  => 'basic_settings',
		'type'     => 'text',
		'priority'       => 2,
	) );

// hide page titles
	$wp_customize->add_setting( 'hide_title');
	
	$wp_customize->add_control( 'hide_title', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Page Titles', 'celestial' ),
        'section' => 'basic_settings',
		'priority'       => 3,
    ) );
		 	
// Setting for blog layout
	$wp_customize->add_setting( 'blog_sidebar', array(
		'default' => 'rightcolumn',
	) );
// Control for blog layout	
	$wp_customize->add_control( 'blog_sidebar', array(
    'label'   => __( 'Blog Sidebar Column', 'celestial' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'rightcolumn' => __( 'Right Column', 'celestial' ),
            'leftcolumn' => __( 'Left Column', 'celestial' ),
			'fullwidth' => __( 'Full Width', 'celestial' ),
        ),
	'priority'       => 4,
    ));

// Setting for archive layout
	$wp_customize->add_setting( 'archive_sidebar', array(
		'default' => 'rightcolumn',
	) );
// Control for archive layout	
	$wp_customize->add_control( 'archive_sidebar', array(
    'label'   => __( 'Archive Sidebar Column', 'celestial' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'rightcolumn' => __( 'Right Column', 'celestial' ),
            'leftcolumn' => __( 'Left Column', 'celestial' ),
			'fullwidth' => __( 'Full Width', 'celestial' ),
        ),
	'priority'       => 5,
    ));

// Setting for author layout
	$wp_customize->add_setting( 'author_sidebar', array(
		'default' => 'rightcolumn',
	) );
// Control for author layout	
	$wp_customize->add_control( 'author_sidebar', array(
    'label'   => __( 'Author Sidebar Column', 'celestial' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'rightcolumn' => __( 'Right Column', 'celestial' ),
            'leftcolumn' => __( 'Left Column', 'celestial' ),
			'fullwidth' => __( 'Full Width', 'celestial' ),
        ),
	'priority'       => 6,
    ));
	
// Setting for blog intro image
	$wp_customize->add_setting( 'intro_image', array(
		'default' => 'big',
	) );
// Control for blog intro image	
	$wp_customize->add_control( 'intro_image', array(
    'label'   => __( 'Intro Image', 'celestial' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'big' => __( 'Big Image', 'celestial' ),
            'small' => __( 'Small Image', 'celestial' ),
        ),
	'priority'       => 7,
    ));


// Setting for hiding the intro image on the full post view	
	$wp_customize->add_setting( 'hide_intro_image' );
	
// Control for hiding the intro image on the full post view	
	$wp_customize->add_control( 'hide_intro_image', array(
        'label' => __( 'Show Featured Image Full Post', 'celestial' ),
		'type' => 'checkbox',
		'section' => 'basic_settings',
		'priority' => 8,
    ) );




// Setting group for a Select
	$wp_customize->add_setting( 'portfolio_col', array(
		'default' => 'portfolio3',
	) );
	
	$wp_customize->add_control( 'portfolio_col', array(
    'label'   => __( 'Portfolio Columns', 'celestial' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'portfolio1' => __( 'Portfolio 1', 'celestial' ),
            'portfolio2' => __( 'Portfolio 2', 'celestial' ),
            'portfolio3' => __( 'Portfolio 3', 'celestial' ),
			'portfolio4' => __( 'Portfolio 4', 'celestial' ),
        ),
	'priority'       => 9,	
    ));

// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Your Name',
	) );
	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => __( 'Your Copyright', 'celestial' ),
		'section'  => 'basic_settings',
		'type'     => 'text',
		'priority'       => 10,
	) );	
/**
 * Options for the Colour Settings section
 */		

	$wp_customize->add_setting( 'topline', array(
		'default'        => '#3c3f41',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topline', array(
		'label'   => __( 'Page Top Line', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'topline',
		'priority' => '1',
	) ) );

	$wp_customize->add_setting( 'headerbg', array(
		'default'        => '#f6f6f6',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headerbg', array(
		'label'   => __( 'Header Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'headerbg',
		'priority' => '2',
	) ) );

	$wp_customize->add_setting( 'contentbg', array(
		'default'        => '#ffffff',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contentbg', array(
		'label'   => __( 'Content Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'contentbg',
		'priority' => '3',
	) ) );
	
	$wp_customize->add_setting( 'content_text', array(
		'default'        => '#848484',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text', array(
		'label'   => __( 'Main Text Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'content_text',
		'priority' => '7',
	) ) );

	$wp_customize->add_setting( 'headings', array(
		'default'        => '#252525',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings', array(
		'label'   => __( 'Headings &amp; Titles', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'headings',
		'priority' => '7',
	) ) );	
	
// call to action
	$wp_customize->add_setting( 'cta', array(
		'default'        => '#252525',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta', array(
		'label'   => __( 'Call to Action', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'cta',
		'priority' => '7',
	) ) );	
	
// Bottom inset background	
	$wp_customize->add_setting( 'bottominset_bg', array(
		'default'        => '#f6f6f6',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottominset_bg', array(
		'label'   => __( 'Bottom Inset Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'bottominset_bg',
		'priority' => '8',
	) ) );
	
// Bottom widget group background	
	$wp_customize->add_setting( 'bottomgroup_bg', array(
		'default'        => '#ebebeb',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomgroup_bg', array(
		'label'   => __( 'Bottom Widgets Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'bottomgroup_bg',
		'priority' => '8',
	) ) );	
// Bottom Text	
	$wp_customize->add_setting( 'bottomgroup_text', array(
		'default'        => '#848484',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomgroup_text', array(
		'label'   => __( 'Bottom Text', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'bottomgroup_text',
		'priority' => '9',
	) ) );	
// Footer widget group background	
	$wp_customize->add_setting( 'footer_widgets_bg', array(
		'default'        => '#272b30',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_bg', array(
		'label'   => __( 'Footer Widgets Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_bg',
		'priority' => '8',
	) ) );

// Footer widget headings
	$wp_customize->add_setting( 'footer_widgets_heading', array(
		'default'        => '#ffffff',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_heading', array(
		'label'   => __( 'Footer Widgets Heading Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_heading',
		'priority' => '9',
	) ) );

// Footer widget text	
	$wp_customize->add_setting( 'footer_widgets_text', array(
		'default'        => '#959798',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_text', array(
		'label'   => __( 'Footer Widgets Text Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_text',
		'priority' => '10',
	) ) );

// Copyright background
	$wp_customize->add_setting( 'copyright_bg', array(
		'default'        => '#161718',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg', array(
		'label'   => __( 'Copyright Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'copyright_bg',
		'priority' => '12',
	) ) );

// Copyright text
	$wp_customize->add_setting( 'copyright_text', array(
		'default'        => '#c4cacf',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text', array(
		'label'   => __( 'Copyright Text Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'copyright_text',
		'priority' => '13',
	) ) );

// Copyright bottom border
	$wp_customize->add_setting( 'copyright_bottom_border', array(
		'default'        => '#333333',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bottom_border', array(
		'label'   => __( 'Copyright Bottom Border', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'copyright_bottom_border',
		'priority' => '15',
	) ) );

/**
 * Lets add a section tab called LINK Styling
 */
 
	$wp_customize->add_section( 'link_styles', array(
		'title'          => __( 'Link Styles', 'celestial' ),
		'priority'       => 40,
	) );

// Content link styling
	$wp_customize->add_setting( 'content_links', array(
		'default'        => '#467fc2',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_links', array(
		'label'   => __( 'Content Link Colour', 'celestial' ),
		'section' => 'link_styles',
		'settings'   => 'content_links',
		'priority' => '16',
	) ) );
	
// Content link hover
	$wp_customize->add_setting( 'content_links_hover', array(
		'default'        => '#848484',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_links_hover', array(
		'label'   => __( 'Content Link Colour on Hover', 'celestial' ),
		'section' => 'link_styles',
		'settings'   => 'content_links_hover',
		'priority' => '17',
	) ) );	
// Bottom Text links
	$wp_customize->add_setting( 'bottomgroup_links', array(
		'default'        => '#467fc2',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomgroup_links', array(
		'label'   => __( 'Bottom Text Links', 'celestial' ),
		'section' => 'link_styles',
		'settings'   => 'bottomgroup_links',
		'priority' => '17',
	) ) );	
// Footer widget links
	$wp_customize->add_setting( 'footer_widgets_links', array(
		'default'        => '#cccccc',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_links', array(
		'label'   => __( 'Footer Widgets Links Colour', 'celestial' ),
		'section' => 'link_styles',
		'settings'   => 'footer_widgets_links',
		'priority' => '11',
	) ) );	

// Copyright link colour
	$wp_customize->add_setting( 'copyright_links', array(
		'default'        => '#c4cacf',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_links', array(
		'label'   => __( 'Copyright Link Colour', 'celestial' ),
		'section' => 'link_styles',
		'settings'   => 'copyright_links',
		'priority' => '14',
	) ) );

	
/**
 * Lets add a section tab called Social Networking
 */
 
	$wp_customize->add_section( 'social_networking', array(
		'title'          => __( 'Social Networking', 'celestial' ),
		'priority'       => 40,
	) );

// Setting for hiding the showcase curved graphic	
	$wp_customize->add_setting( 'hide_social', array(
		) );
	
// Control for hiding the social icons	
	$wp_customize->add_control( 'hide_social', array(
        'label' => __( 'Hide Social Icons', 'celestial' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 1,
    ) );



// Setting for hiding the showcase curved graphic	
	$wp_customize->add_setting( 'hide_sociallines', array(
		) );
	
// Control for hiding the showcase curved graphic	
	$wp_customize->add_control( 'hide_sociallines', array(
        'label' => __( 'Hide Social Bar Background Lines', 'celestial' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 2,
    ) );
	
	
	
	
// Social Background colour	
	$wp_customize->add_setting( 'socialbg', array(
		'default'        => '#393c3f',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialbg', array(
		'label'   => __( 'Social Bar Background', 'celestial' ),
		'section' => 'social_networking',
		'settings'   => 'socialbg',
		'priority' => 3,
	) ) );
// Social icon background colour	
	$wp_customize->add_setting( 'socialicon_bg', array(
		'default'        => '#393c3f',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialicon_bg', array(
		'label'   => __( 'Social Icon Background', 'celestial' ),
		'section' => 'social_networking',
		'settings'   => 'socialicon_bg',
		'priority' => 4,
	) ) );
// Social icon colour	
	$wp_customize->add_setting( 'socialicon', array(
		'default'        => '#b4b4b4',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialicon', array(
		'label'   => __( 'Social Icon Colour', 'celestial' ),
		'section' => 'social_networking',
		'settings'   => 'socialicon',
		'priority' => 5,
	) ) );	
// Social icon colour hover	
	$wp_customize->add_setting( 'socialicon_hover', array(
		'default'        => '#ffffff',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialicon_hover', array(
		'label'   => __( 'Social Icon Colour Hover', 'celestial' ),
		'section' => 'social_networking',
		'settings'   => 'socialicon_hover',
		'priority' => 6,
	) ) );	
// Setting group for Twitter
	$wp_customize->add_setting( 'twitter_uid', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'twitter_uid', array(
		'settings' => 'twitter_uid',
		'label'    => __( 'Twitter', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
	
// Setting group for Facebook
	$wp_customize->add_setting( 'facebook_uid', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'facebook_uid', array(
		'settings' => 'facebook_uid',
		'label'    => __( 'Facebook', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
	
// Setting group for Google+
	$wp_customize->add_setting( 'google_uid', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'google_uid', array(
		'settings' => 'google_uid',
		'label'    => __( 'Google+', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
	
// Setting group for Linkedin
	$wp_customize->add_setting( 'linkedin_uid', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'linkedin_uid', array(
		'settings' => 'linkedin_uid',
		'label'    => __( 'Linkedin', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
	
// Setting group for Pinterest
	$wp_customize->add_setting( 'pinterest_uid', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'pinterest_uid', array(
		'settings' => 'pinterest_uid',
		'label'    => __( 'Pinterest', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	


// Setting group for Youtube
	$wp_customize->add_setting( 'youtube_uid', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'youtube_uid', array(
		'settings' => 'youtube_uid',
		'label'    => __( 'Youtube', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );

// Setting group for Flickr
	$wp_customize->add_setting( 'flickr_uid', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'flickr_uid', array(
		'settings' => 'flickr_uid',
		'label'    => __( 'Flickr', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );
// Setting group for RSS
	$wp_customize->add_setting( 'rss_uid', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'rss_uid', array(
		'settings' => 'rss_uid',
		'label'    => __( 'RSS', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
		
	
/**
 * Lets add more to our HEADER IMAGE tab
 */	
 
// Showcase outer container background


// Showcase Padding
	$wp_customize->add_setting( 'showcasepad', array(
		'default'        => '0px 0px 0px 0px',
	) );

	$wp_customize->add_control( 'showcasepad', array(
		'settings' => 'showcasepad',
		'label'    => __( 'Showcase Padding', 'celestial' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 3,
	) );	
// Banner Padding
	$wp_customize->add_setting( 'bannerpad', array(
		'default'        => '0px 0px 0px 0px',
	) );

	$wp_customize->add_control( 'bannerpad', array(
		'settings' => 'bannerpad',
		'label'    => __( 'Banner Padding', 'celestial' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 4,
	) );	

	
	
	$wp_customize->add_setting( 'bannerbg', array(
		'default'        => '#4b7eae',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bannerbg', array(
		'label'   => __( 'Showcase Background', 'celestial' ),
		'section' => 'header_image',
		'settings'   => 'bannerbg',
		'priority' => 5,
	) ) );
	
	$wp_customize->add_setting( 'showcase_top_line', array(
		'default'        => '#525458',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'showcase_top_line', array(
		'label'   => __( 'Showcase Top Line', 'celestial' ),
		'section' => 'header_image',
		'settings'   => 'showcase_top_line',
		'priority' => 6,
	) ) );
	
	$wp_customize->add_setting( 'showcase_bottom_line', array(
		'default'        => '#bcc0c3',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'showcase_bottom_line', array(
		'label'   => __( 'Showcase Bottom Line', 'celestial' ),
		'section' => 'header_image',
		'settings'   => 'showcase_bottom_line',
		'priority' => 7,
	) ) );	
	
	
	$wp_customize->add_setting( 'hide_curve', array(
	) );
	
	$wp_customize->add_control( 'hide_curve', array(
    'settings' => 'hide_curve',
    'label'    => __( 'Showcase Curved Bottom', 'celestial' ),
    'section'  => 'header_image',
    'type'     => 'checkbox',
	'priority' => '1'
	) );	
	
	
	
	
	
	
	
	
/**
 * Lets add more to our Navigation tab
 */	

// Setting group for menu top margin
	$wp_customize->add_setting( 'menumargin', array(
		'default'        => '30px',
	) );
	$wp_customize->add_control( 'menumargin', array(
		'settings' => 'menumargin',
		'label'    => __( 'Main Menu Top Margin', 'celestial' ),
		'section'  => 'nav',
		'type'     => 'text',
	) );
// Menu links
	$wp_customize->add_setting( 'menulink', array(
		'default'        => '#555555',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menulink', array(
		'label'   => __( 'Main Menu Link', 'celestial' ),
		'section' => 'nav',
		'settings'   => 'menulink',
		'priority' => 30,
	) ) );
// Menu link hover and active
	$wp_customize->add_setting( 'menulinkhover', array(
		'default'        => '#467fc2',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menulinkhover', array(
		'label'   => __( 'Main Menu Link Hover', 'celestial' ),
		'section' => 'nav',
		'settings'   => 'menulinkhover',
		'priority' => 32,		
	) ) );
// SubMenu background
	$wp_customize->add_setting( 'submenubg', array(
		'default'        => '#f6f6f6',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenubg', array(
		'label'   => __( 'Submenu Background', 'celestial' ),
		'section' => 'nav',
		'settings'   => 'submenubg',
		'priority' => 33,		
	) ) );	
// SubMenu background on hover
	$wp_customize->add_setting( 'submenubghover', array(
		'default'        => '#ededed',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenubghover', array(
		'label'   => __( 'Submenu Background Hover', 'celestial' ),
		'section' => 'nav',
		'settings'   => 'submenubghover',
		'priority' => 34,		
	) ) );
// SubMenu links on hover
	$wp_customize->add_setting( 'submenulinkhover', array(
		'default'        => '#467fc2',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenulinkhover', array(
		'label'   => __( 'Submenu Link Hover', 'celestial' ),
		'section' => 'nav',
		'settings'   => 'submenulinkhover',
		'priority' => 36,		
	) ) );
// Main menu active state from submenu
	$wp_customize->add_setting( 'mainmenuactive', array(
		'default'        => '#467fc2',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mainmenuactive', array(
		'label'   => __( 'Main Menu Active', 'celestial' ),
		'section' => 'nav',
		'settings'   => 'mainmenuactive',
		'priority' => 38,		
	) ) );
// Active submenu link
	$wp_customize->add_setting( 'submenuactive', array(
		'default'        => '#467fc2',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenuactive', array(
		'label'   => __( 'Submenu Active Link', 'celestial' ),
		'section' => 'nav',
		'settings'   => 'submenuactive',
		'priority' => 40,		
	) ) );
// Active submenu background
	$wp_customize->add_setting( 'submenuactivebg', array(
		'default'        => '#ededed',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenuactivebg', array(
		'label'   => __( 'Submenu Active Background', 'celestial' ),
		'section' => 'nav',
		'settings'   => 'submenuactivebg',
		'priority' => 41,		
	) ) );



	
// lets close everything	
}