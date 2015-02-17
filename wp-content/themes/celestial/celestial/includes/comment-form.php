<?php

/**
 * Theme Functions
 *
 * @file           functions.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
 
if ( ! function_exists( 'celestial_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own celestial_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function celestial_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'celestial' ); ?> <?php comment_author_link(); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
		
		<header class="comment-meta comment-author vcard row-fluid">
			<div class="span1">
				<?php echo get_avatar( $comment, 44 ); ?>
			</div>
			<div class="span11">
			<?php
				printf( '<cite class="fn">%1$s %2$s</cite>',
					get_comment_author_link(),
					// If current post author is also comment author, make it known visually.
					( $comment->user_id === $post->post_author ) ? '<span class="postauthor"> ' . __( '&#40;Post author&#41;', 'celestial' ) . '</span>' : ''
				);
				printf( '<time datetime="%2$s">%3$s</time>',
					esc_url( get_comment_link( $comment->comment_ID ) ),
					get_comment_time( 'c' ),
					/* translators: 1: date, 2: time */
					sprintf( __( '<span class="comment-date">Commented on: %1$s</span>', 'celestial' ), get_comment_date('F j, Y'), get_comment_time() )
				);
				?>
			</div>
		</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'celestial' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
			</section><!-- .comment-content -->

			<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<strong>Reply</strong> to this Comment', 'celestial' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/**
 * Adds markup to the comment form which is needed to make it work with Bootstrap

 */
function celestial_comment_form_top() {
	echo '<div class="form-horizontal">';
}
add_action( 'comment_form_top', 'celestial_comment_form_top' );


/**
 * Adds markup to the comment form which is needed to make it work with Bootstrap
 */
function celestial_comment_form() {
	echo '</div>';
}
add_action( 'comment_form', 'celestial_comment_form' );


/**
 * Custom author form field for the comments form
 */
function celestial_comment_form_field_author( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-author form-elements">				
				<input id="author" name="author" type="text" value="' . esc_attr(  $commenter['comment_author'] ) . '" placeholder="' . __( 'Name*', 'celestial' ) . '" ' . $aria_req . ' />
					' . '</div>';
}
add_filter( 'comment_form_field_author', 'celestial_comment_form_field_author');


/**
 * Custom HTML5 email form field for the comments form
 */
function celestial_comment_form_field_email( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-email form-elements">				
				<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . __( 'Email*', 'celestial' ) . '" ' . $aria_req . ' /></div>';
}
add_filter( 'comment_form_field_email', 'celestial_comment_form_field_email');


/**
 * Custom HTML5 url form field for the comments form
 */
function celestial_comment_form_field_url( $html ) {
	$commenter	=	wp_get_current_commenter();
	
	return	'<div class="comment-form-url form-elements">
					<input id="url" name="url" type="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" placeholder="' . __( 'Website', 'celestial' ) . '"  />
			</div>';
}
add_filter( 'comment_form_field_url', 'celestial_comment_form_field_url');

/**
 * Filters comments_form() default arguments
 */
function celestial_comment_form_defaults( $defaults ) {
	return wp_parse_args( array(
		'comment_field'			=>	'<div class="comment-form-comment form-elements clearfix"><textarea id="comment" name="comment" placeholder="' . __( 'Comment*', 'celestial' ) . '" rows="8" aria-required="true"></textarea></div>',
		'comment_notes_before'	=>	'',
		'comment_notes_after'	=>	'',
		'title_reply'			=>	'<legend>' . __( 'Leave a reply', 'celestial' ) . '</legend>',
		'title_reply_to'		=>	'<legend>' . __( 'Leave a reply to %s', 'celestial' ). '</legend>',
		'must_log_in'			=>	'<div class="must-log-in form-elements controls">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'celestial' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
		'logged_in_as'			=>	'<div class="logged-in-as form-elements controls">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'celestial' ), admin_url( 'profile.php' ), wp_get_current_user()->display_name, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
	), $defaults );
}
add_filter( 'comment_form_defaults', 'celestial_comment_form_defaults' );
