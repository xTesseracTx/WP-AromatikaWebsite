<?php

/**
 * Blog sidebar
 *
 * @file           sidebar.php
 * @package        Celestial 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 2.0
 */
?>

<?php if (!dynamic_sidebar('blogright')) : ?>
    <div class="widget-wrapper">
        <h3>Blog Right Column Demo</h3>   
		<p>This is default content to showcase the blog's right sidebar column. Once you publish your first widget to this position, this sample content will be replaced by your widget. </p>
    </div>
<?php endif; ?>