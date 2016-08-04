<?php
/**
 * Facebook all recommendations Sidebox by sourceaddons
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_fball_recommend.php 3133 2012-21-09 23:39:02Z sourceaddons $
 *
 * @contribution: Facebook all recommendations Sidebox
 * @author: sourceaddons
 * @version $Id: tpl_fball_recommend.php 2012-21-09 $
 */

   $content = '';
   
   // Getting page url.
      $fbpageurl_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECOMMEND_PAGEURL'";
      $fbpageurl_array = $db->Execute($fbpageurl_query);
      $pageurl = trim($fbpageurl_array->fields['configuration_value']);
	 
// Getting height.
      $recommendheight_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECOMMEND_HEIGHT'";
      $recommendheight_array = $db->Execute($recommendheight_query);
      $height = trim($recommendheight_array->fields['configuration_value']);

// Getting width.
      $recommendwidth_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECOMMEND_WIDTH'";
      $recommendwidth_array = $db->Execute($recommendwidth_query);
      $width = trim($recommendwidth_array->fields['configuration_value']);

// Getting color scheme value.
      $recommmendcolor_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECOMMEND_COLOR'";
      $recommmendcolor_array = $db->Execute($recommmendcolor_query);
      $color = trim($recommmendcolor_array->fields['configuration_value']);


// Getting header value.
      $recommendheader_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECOMMEND_HEADER'";
      $recommendheader_array = $db->Execute($recommendheader_query);
      $fbheader = trim($recommendheader_array->fields['configuration_value']);
	  $fbheader =($fbheader == 'YES' ? 'true' : 'false');
      $color =($color == 'light' ? 'light' : 'dark');
   
   $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
   $content .= '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>';
   $content .= '<div class="fb-recommendations" data-site="'.$pageurl.'" data-width="'.$width.'" data-height="'.$height.'" data-header="'.$fbheader.'" data-colorscheme="'.$color.'"></div>';
   $content .= '</div>';
?>