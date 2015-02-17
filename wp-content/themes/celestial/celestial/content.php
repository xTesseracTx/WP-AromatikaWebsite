<?php

/**
 * Blog content
 *
 * @file           content.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		
		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h1 class="entry-title">
				<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="featured-post"><?php _e( 'Featured', 'celestial' ); ?></span>
				<?php endif; ?>
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'celestial' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		<?php endif; // is_single() ?>
		
		<div class="entry-meta">
			<span class="entry-date"><?php _e( 'Date: ', 'celestial' ); ?><time  datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></span>
			<span class="entry-author"><?php printf( __( 'Author: ', 'celestial' ) ); ?>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( '%s', 'celestial' ), get_the_author() ); ?>
							</a>
			
			</span>
			<?php if ( comments_open() ) : ?>
				<span class="comments-link">
					<?php echo esc_attr( sprintf( __( 'Comments: ', 'celestial' ) ) ); ?>
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'celestial' ) . '</span>', __( '1 Reply', 'celestial' ), __( '% Replies', 'celestial' ) ); ?>
				</span><!-- .comments-link -->
		<?php endif; // comments_open() ?>
		<?php edit_post_link( __( 'Edit', 'celestial' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->
	
	<div class="entry-content clearfix">
	
	

	<?php if (is_single() || is_search() ) : ?>
		
        <?php if( get_theme_mod( 'hide_intro_image' ) == '1') { ?>
		
			<?php if ( has_post_thumbnail()) :				
				$introimage = get_theme_mod( 'intro_image', 'big' );
				switch ($introimage) {
					case "big" :						
							the_post_thumbnail('', array('class' => 'alignnone imageframe'));						
					break;
					case "small" : 						
							the_post_thumbnail('', array('class' => 'alignleft imageframe'));						
					break;
				} 				
			endif; ?>        
        
        <?php } ?>
        
        
        
		<?php else : ?>
		
			<?php if ( has_post_thumbnail()) :				
				$introimage = get_theme_mod( 'intro_image', 'big' );
				switch ($introimage) {
					case "big" :			
					echo '<div class="intro-image-wrap">';			
							the_post_thumbnail('', array('class' => 'alignnone imageframe'));
					echo '</div>';						
					break;
					case "small" : 						
							the_post_thumbnail('', array('class' => 'alignleft imageframe'));						
					break;
				} 				
			endif; ?>

	<?php endif; ?>
	
	<?php // Lets load the content or excerpt based on what is being viewed
	
		if (is_search()) : 
			the_excerpt();         
		elseif (is_single()) :        
        	the_content() ; 						
    	else : ?>    
    
<?php $excon = get_theme_mod( 'excerpt_content', 'content' );
	  $excerpt = get_theme_mod( 'excerpt_limit', '50' );
		 switch ($excon) {
			case "content" :
				the_content(__('Continue Reading...', 'celestial'));
			break;
			case "excerpt" : 
				echo '<p>' . excerpt($excerpt) . '</p>' ;
				echo '<p class="more-link"><a href="' . get_permalink() . '">' . __('Continue Reading...', 'celestial') . '</a>' ;
			break;
			} 
		?>
           
	<?php endif; ?>
    
		<?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'celestial'), 'after' => '</div>')); ?>
	</div><!-- end of .post-entry -->
    
	<?php if (is_single()) : ?>
		<div class="entry-footer-meta">
			<?php the_tags(__('<span class="meta-tagged">Tagged with:</span>', 'celestial') . ' ', ', ', '<br />'); ?> 
			<?php printf(__('<span class="meta-posted">Posted in: %s</span>', 'celestial'), get_the_category_list(', ')); ?> <br />
		</div> 

		<nav class="nav-single">
			<h5 class="assistive-text"><?php _e( 'More Articles', 'celestial' ); ?></h5>
				
                
                <?php previous_post_link( __( '<strong>Previous Post: </strong>', 'celestial' ) . '%link' ); ?>
             <br />
             <?php next_post_link( __( '<strong>Next Post: </strong>', 'celestial' ) . '%link' ); ?>
                
                
                
                
                
		</nav><!-- .nav-single -->

		
	<?php endif; ?>
              
</article><!-- end of #post-<?php the_ID(); ?> -->