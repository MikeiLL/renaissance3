<?php
/**
 * Facebookall fanbox  sidebox by sourceaddons
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_fball_fanbox.php 3133 2012-21-09 23:39:02Z sourceaddons $
 *
 * @contribution: Facebook Sidebox
 * @author: sourceaddons
 * @version $Id: tpl_fball_fanbox.php 2012-21-09 $
 */

   $content = '';
   
 
// Getting page url.
      $fbpageurl_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FANBOX_PAGEURL'";
      $fbpageurl_array = $db->Execute($fbpageurl_query);
      $pageurl = trim($fbpageurl_array->fields['configuration_value']);
	  $pageurl = urlencode($pageurl);

// Getting height.
      $fanboxheight_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FANBOX_HEIGHT'";
      $fanboxheight_array = $db->Execute($fanboxheight_query);
      $height = trim($fanboxheight_array->fields['configuration_value']);

// Getting width.
      $fanboxwidth_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FANBOX_WIDTH'";
      $fanboxwidth_array = $db->Execute($fanboxwidth_query);
      $width = trim($fanboxwidth_array->fields['configuration_value']);

// Getting faces value.
      $fanboxfaces_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FANBOX_FACES'";
      $fanboxfaces_array = $db->Execute($fanboxfaces_query);
      $faces = trim($fanboxfaces_array->fields['configuration_value']);

// Getting stream value.
      $fanboxstream_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FANBOX_STREAM'";
      $fanboxstream_array = $db->Execute($fanboxstream_query);
      $stream = trim($fanboxstream_array->fields['configuration_value']);

// Getting coor scheme value.
      $fanboxcolor_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FANBOX_COLOR'";
      $fanboxcolor_array = $db->Execute($fanboxcolor_query);
      $color = trim($fanboxcolor_array->fields['configuration_value']);


// Getting header value.
      $fanboxheader_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FANBOX_HEADER'";
      $fanboxheader_array = $db->Execute($fanboxheader_query);
      $fbheader = trim($fanboxheader_array->fields['configuration_value']);
	  $faces =($faces == 'YES' ? 'true' : 'false');
	  $stream =($stream == 'YES' ? 'true' : 'false');
	  $fbheader =($fbheader == 'YES' ? 'true' : 'false');
      $color =($color == 'light' ? 'light' : 'dark');
   
   $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
   $content .= '<iframe src="//www.facebook.com/plugins/likebox.php?href='.$pageurl.'&amp;width=292&amp;height=590&amp;colorscheme='.$color.'&amp;show_faces='.$faces.'&amp;border_color&amp;stream='.$stream.'&amp;header='.$fbheader.'&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$width.'px; height:'.$height.'px;" allowTransparency="true"></iframe>';
   $content .= '</div>';
?>