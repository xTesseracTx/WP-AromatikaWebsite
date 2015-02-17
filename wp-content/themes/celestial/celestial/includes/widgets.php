<?php

/**
 * Widget Positions
 *
 * @file           widgets.php
 * @package        Encounters 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.1
 */

 
/**
 * Registers our main widget area and the front page widget areas.
 */
 
function celestial_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Blog Right Sidebar', 'celestial' ),
		'id' => 'blogright',
		'description' => __( 'This is the right sidebar column that appears on posts and any other blog based pages', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Blog Left Sidebar', 'celestial' ),
		'id' => 'blogleft',
		'description' => __( 'This is the left sidebar column that appears on posts and any other blog based pages.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Page Right Sidebar', 'celestial' ),
		'id' => 'pageright',
		'description' => __( 'This is the right sidebar column that appears on pages, but not part of the blog', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Page Left Sidebar', 'celestial' ),
		'id' => 'pageleft',
		'description' => __( 'This is the left sidebar column that appears on pages, but not part of the blog.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Showcase Front Page', 'celestial' ),
		'id' => 'showcase',
		'description' => __( 'This is a showcase banner for images or media sliders that can display on your Front Page.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s" style="margin-bottom:0;">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Page Banner', 'celestial' ),
		'id' => 'banner',
		'description' => __( 'This is a showcase banner for images or media sliders that can display on every page (except front page) but does not have the bottom curve.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s" style="margin-bottom:0;">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 1', 'celestial' ),
		'id' => 'top1',
		'description' => __( 'This is the first top widget position on the custom front page.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 2', 'celestial' ),
		'id' => 'top2',
		'description' => __( 'This is the second top widget position on the custom front page.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 3', 'celestial' ),
		'id' => 'top3',
		'description' => __( 'This is the third top widget position on the custom front page.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 4', 'celestial' ),
		'id' => 'top4',
		'description' => __( 'This is the fourth top widget position on the custom front page.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Top Inset', 'celestial' ),
		'id' => 'topinset',
		'description' => __( 'Appears in the middle when using the optional Front Page template with a page set as Static Front Page.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Bottom Inset', 'celestial' ),
		'id' => 'bottominset',
		'description' => __( 'Appears in the middle when using the optional Front Page template with a page set as Static Front Page.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Bottom 1', 'celestial' ),
		'id' => 'bottom1',
		'description' => __( 'This is the first bottom widget position located just above the footer.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 2', 'celestial' ),
		'id' => 'bottom2',
		'description' => __( 'This is the second bottom widget position located just above the footer.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 3', 'celestial' ),
		'id' => 'bottom3',
		'description' => __( 'This is the third bottom widget position located just above the footer.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 4', 'celestial' ),
		'id' => 'bottom4',
		'description' => __( 'This is the fourth bottom widget position located just above the footer.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'celestial' ),
		'id' => 'footer1',
		'description' => __( 'This is the first footer widget position located in a dark background area.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'celestial' ),
		'id' => 'footer2',
		'description' => __( 'This is the second footer widget position located in a dark background area.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'celestial' ),
		'id' => 'footer3',
		'description' => __( 'This is the third footer widget position located in a dark background area.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 4', 'celestial' ),
		'id' => 'footer4',
		'description' => __( 'This is the fourth footer widget position located in a dark background area.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Inset', 'celestial' ),
		'id' => 'footerinset',
		'description' => __( 'This is a full width widget position that you can use when you want to use spans for columns.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Call To Action', 'celestial' ),
		'id' => 'cta',
		'description' => __( 'This is a call to action position that is centered and just below the showcase banner area but above your content.', 'celestial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="st-cta-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'celestial_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 */

// Lets do the top group
function topgroup() {
	$count = 0;
	if ( is_active_sidebar( 'top1' ) )
		$count++;
	if ( is_active_sidebar( 'top2' ) )
		$count++;
	if ( is_active_sidebar( 'top3' ) )
		$count++;		
	if ( is_active_sidebar( 'top4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'span12';
			break;
		case '2':
			$class = 'span6';
			break;
		case '3':
			$class = 'span4';
			break;
		case '4':
			$class = 'span3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

// lets setup the bottom group 
function bottomgroup() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'span12';
			break;
		case '2':
			$class = 'span6';
			break;
		case '3':
			$class = 'span4';
			break;
		case '4':
			$class = 'span3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}
// Lets do the content bottom widgets
function footergroup() {
	$count = 0;
	if ( is_active_sidebar( 'footer1' ) )
		$count++;
	if ( is_active_sidebar( 'footer2' ) )
		$count++;
	if ( is_active_sidebar( 'footer3' ) )
		$count++;		
	if ( is_active_sidebar( 'footer4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'span12';
			break;
		case '2':
			$class = 'span6';
			break;
		case '3':
			$class = 'span4';
			break;
		case '4':
			$class = 'span3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}