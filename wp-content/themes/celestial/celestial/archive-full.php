<?php

/**
 * Archive content with no sidebar columns
 *
 * @file           archive-full.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
?>

<div class="span12">
	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h1 class="archive-title">
				<?php
					if ( is_day() ) :
						printf( __( 'Articles for this day of %s', 'celestial' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Articles for the Month of %s', 'celestial' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'celestial' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Articles for the Year %s', 'celestial' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'celestial' ) ) . '</span>' );
					else :
						_e( 'Articles', 'celestial' );
					endif;
				?>
			</h1>
			
		</header>
	
	<?php while ( have_posts() ) : the_post();

			/* Include the post format-specific template for the content. If you want to
			 * this in a child theme then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
		endwhile;
		celestial_content_nav( 'post-nav' ); ?>	
	<?php endif; ?>

</div>