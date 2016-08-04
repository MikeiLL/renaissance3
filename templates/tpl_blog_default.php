<?php
/**
* @package page template
* @copyright Copyright 2003-2006 Zen Cart Development Team
* @copyright Portions Copyright 2003 osCommerce
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* @version $Id: Define Generator v0.1 $
*/

// THIS FILE IS SAFE TO EDIT! This is the template page for your new page 

?>
<!-- bof tpl_blog_default.php -->
	<div class='centerColumn' id='blog'>
<!-- START WordPress -->
<?php
  //do_action('template_redirect');
  if ( is_robots() ) {
    do_action('do_robots');
  } else if ( is_feed() ) {
    do_feed();
  } else if ( is_trackback() ) {
    include(ABSPATH . 'wp-trackback.php');
  } else if ( is_404() && $template = get_404_template() ) {
    include($template);
  } else if ( is_search() && $template = get_search_template() ) {
    include($template);
  } else if ( is_tax() && $template = get_taxonomy_template()) {
    include($template);
  } else if ( is_home() && $template = get_home_template() ) {
    include($template);
  } else if ( is_attachment() && $template = get_attachment_template() ) {
    remove_filter('the_content', 'prepend_attachment');
    include($template);
  } else if ( is_single() && $template = get_single_template() ) {
    include($template);
  } else if ( is_page() && $template = get_page_template() ) {
    include($template);
  } else if ( is_category() && $template = get_category_template()) {
    include($template);
  } else if ( is_tag() && $template = get_tag_template()) {
    include($template);
  } else if ( is_author() && $template = get_author_template() ) {
    include($template);
  } else if ( is_date() && $template = get_date_template() ) {
    include($template);
  } else if ( is_archive() && $template = get_archive_template() ) {
    include($template);
  } else if ( is_comments_popup() && $template = get_comments_popup_template() ) {
    include($template);
  } else if ( is_paged() && $template = get_paged_template() ) {
    include($template);
  } else if ( file_exists(TEMPLATEPATH . "/index.php") ) {
    include(TEMPLATEPATH . "/index.php");
  }
?>
      <!-- END WordPress -->
	</div>
<!-- eof tpl_blog_default.php -->