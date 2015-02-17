<?php

/** 
 * Displays a portfolio with 3 columns 
 * 
 * @file           content-portfolio3.php 
 * @package        Celestial  
 * @author         Styled Themes  
 * @copyright      2013 Styledthemes.com 
 * @license        license.txt 
 * @version        Release: 2.0.1
 */
?>

<?php // start with checking for posts
	$count = 1;
?>
     
	<div class="span4">
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header st_portfolio">		
					<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>						
							<div class="st_portfolio imageframe"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(  ); ?></a></div>						
					<?php endif; ?>		
				</header><!-- .entry-header -->
				
				<div class="caption st_portfolio">
				<h3 class="st_portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>	
					<p><?php echo excerpt(30); ?>...</p>
					<p class="see-more-btn">
						<a href="<?php the_permalink(); ?>" class="btn btn-small"><?php _e( 'See More...', 'celestial' ); ?></a>
					</p>			
				</div>
			</article>
			
				
	</div><!-- .span4 -->	
	<?php if($count  % 3 == 0) echo '<div class="clearfix"></div>' // lets add a spacer after each row of spans ?>
	<?php $count++;  ?>