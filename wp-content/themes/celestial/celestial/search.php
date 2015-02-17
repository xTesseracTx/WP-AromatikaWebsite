<?php

/**
 * Displays the search results
 *
 * @file           search.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

 get_header(); ?>

<div id="content-wrapper" style="color:<?php echo get_theme_mod( 'content_text', '#848484' ); ?>">
	<div class="container">
		<div class="row">		
			<div class="span12">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'celestial' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php celestial_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<article id="post-0" class="post no-results not-found">
						<header class="page-header">
							<h1 class="entry-title"><?php _e( 'Nothing Found', 'celestial' ); ?></h1>
						</header>
						<div class="entry-content">
							<p>
								<?php _e( 'Our apologies, apparently nothing matched your search request. Please try again with some different keywords.', 'celestial' ); ?>
							</p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->

				<?php endif; ?>
	
			</div>		
		</div>
	</div>
</div>

<?php get_footer(); ?>