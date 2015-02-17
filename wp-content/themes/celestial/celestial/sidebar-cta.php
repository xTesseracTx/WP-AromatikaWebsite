<?php

/**
 * Call to Action sidebar
 *
 * @file           sidebar-cta.php
 * @package        Celestial
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */

if (   ! is_active_sidebar( 'cta'  )			
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<?php if ( is_active_sidebar( 'cta' ) ) : ?>
	<div id="cta-wrapper">
		<div class="container">
			<div class="row">
				<aside id="cta" class="span12">
					<?php dynamic_sidebar( 'cta' ); ?>
				</aside>
			</div>
		</div>
	</div>
<?php endif; ?>