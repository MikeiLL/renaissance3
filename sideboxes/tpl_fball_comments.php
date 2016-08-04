<?php
/**
 * Facebookall comments sidebox by sourceaddons
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_fball_fanbox.php 3133 2012-21-09 23:39:02Z sourceaddons $
 *
 * @contribution: Facebook Sidebox
 * @author: sourceaddons
 * @version $Id: tpl_fball_comments.php 2012-21-09 $
 */

   $content = '';
	 
// Getting height.
      $width_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_COMMENTS_WIDTH'";
      $width_array = $db->Execute($width_query);
      $width = trim($width_array->fields['configuration_value']);

// Getting faces value.
      $color_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_COMMENTS_COLOR'";
      $color_array = $db->Execute($color_query);
      $color = trim($color_array->fields['configuration_value']);

// Getting stream value.
      $numposts_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_COMMENTS_NUMPOST'";
      $numposts_array = $db->Execute($numposts_query);
      $numposts = trim($numposts_array->fields['configuration_value']);

	  $color = ($color == 'light' ? 'dark' : 'light');
      $current_article = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   
   $content .= '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>';
   $content .= '<div class="fb-comments" data-href="'.$current_article.'" data-width="'.$width.'" data-num-posts="'.$numposts.'" data-colorscheme="'.$color.'"></div>';
  echo $content;
  
  ?>