<?php

/**
 * Displays a portfolio with 1 columns
 *
 * @file           content-portfolio1.php
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
		<article id="post-<?php the_ID(); ?>" class="clearfix">
			
				<div class="span4">
				<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
				
					<div class="st_portfolio imageframe"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(  ); ?></a></div>
				
				<?php endif; ?>
				
				</div>
			<div class="span8">	
				<header class="entry-header">							
					<h1 class="st_portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h1>			
				</header><!-- .entry-header -->				
			<div class="entry-content">
				<?php the_content( __( ' See More...', 'celestial' ) ); ?>
			</div>	
			</div>	
					
		</article>				
		
	
<?php if($count  % 1 == 0) echo '' // lets add a spacer after each row of spans ?>
<?php $count++;  ?>