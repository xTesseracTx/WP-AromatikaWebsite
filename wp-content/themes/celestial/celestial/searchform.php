<?php

/**
 * Search Form template
 *
 * @file           searchform.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
 
?>
	<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<input type="text" name="s" id="s" placeholder="<?php esc_attr_e('search here &hellip;', 'celestial'); ?>" /><input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'celestial'); ?>"  />
	</form>