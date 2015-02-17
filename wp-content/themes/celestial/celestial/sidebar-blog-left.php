<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Displays a left sidebar column for your blog
 *
 * @file           sidebar-blog-left.php
 * @package        Encounters 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<?php if (!dynamic_sidebar('blogleft')) : ?>
    <div class="widget-wrapper">
        <h3>Blog Left Column</h3>   
		<p>This is default content to showcase a blog with a left sidebar column. Once you publish your first widget to this position, this sample content will be replaced by your widget. </p>
    </div>
<?php endif; ?>