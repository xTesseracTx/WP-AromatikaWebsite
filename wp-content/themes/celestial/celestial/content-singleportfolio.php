<?php

/**
 * Displays the portfolio single post
 *
 * @file           content-singleportfolio.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<header class="page-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php the_content(); ?>	
	</div><!-- .entry-content -->

</article>