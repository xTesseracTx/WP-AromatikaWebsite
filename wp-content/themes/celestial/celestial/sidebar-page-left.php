<?php

/**
 * Displays a left sidebar column for pages
 *
 * @file           sidebar-page-left.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
?>

<?php if (!dynamic_sidebar('pageleft')) : ?>
    <div class="widget-wrapper">
        <h3>Page Left Column</h3>   
		<p>This is default content to showcase a page with a left sidebar column. Once you publish your first widget to this position, this sample content will be replaced by your widget. </p>
    </div>
<?php endif; ?>