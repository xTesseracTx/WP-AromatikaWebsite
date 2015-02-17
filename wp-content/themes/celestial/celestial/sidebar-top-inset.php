<?php

/**
 * Top Inset position for span columns
 *
 * @file           sidebar-top-inset.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */

 
if (   ! is_active_sidebar( 'topinset'  )			
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<aside id="top-inset" class="clearfix" role="complementary" >

			<div class="span12">
				<?php dynamic_sidebar( 'topinset' ); ?>
			</div>

</aside> 