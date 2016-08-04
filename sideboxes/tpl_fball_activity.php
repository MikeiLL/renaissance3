<?php
/**
 * Facebookall activity feed sidebox by sourceaddons
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_fball_fanbox.php 3133 2012-21-09 23:39:02Z sourceaddons $
 *
 * @contribution: Facebookall activity feed
 * @author: sourceaddons
 * @version $Id: tpl_fball_activity.php 2012-21-09 $
 */

   $content = '';

	  	  
// Getting page url.
      $fbdomain_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_ACTIVITY_DOMAIN'";
      $fbdomain_array = $db->Execute($fbdomain_query);
      $domain = trim($fbdomain_array->fields['configuration_value']);
	  $domain = urlencode($domain);

// Getting height.
      $activityheight_query = "select configuration_value from " .TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_ACTIVITY_HEIGHT'";
      $activityheight_array = $db->Execute($activityheight_query);
      $height = trim($activityheight_array->fields['configuration_value']);

// Getting width.
      $activitywidth_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_ACTIVITY_WIDTH'";
      $activitywidth_array = $db->Execute($activitywidth_query);
      $width = trim($activitywidth_array->fields['configuration_value']);

// Getting faces value.
      $appid_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_ACTIVITY_APPID'";
      $appid_array = $db->Execute($appid_query);
      $appid = trim($appid_array->fields['configuration_value']);

// Getting stream value.
      $recommend_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_ACTIVITY_RECOMMEND'";
      $recommend_array = $db->Execute($recommend_query);
      $recommend = trim($recommend_array->fields['configuration_value']);
      $recommend =($recommend == 'YES' ? 'true' : 'false');

// Getting coor scheme value.
      $actcolor_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_ACTIVITY_COLOR'";
      $actcolor_array = $db->Execute($actcolor_query);
      $color = trim($actcolor_array->fields['configuration_value']);
      $color =($color == 'light' ? 'light' : 'dark');

// Getting header value.
      $actheader_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_ACTIVITY_HEADER'";
      $actheader_array = $db->Execute($actheader_query);
      $actheader = trim($actheader_array->fields['configuration_value']);
      $actheader =($actheader == 'YES' ? 'true' : 'false');

   
   
   $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
   $content .= '<iframe src="//www.facebook.com/plugins/activity.php?href='.$domain.'&amp;app_id='.$appid.'&amp;action&amp;width=300&amp;height=300&amp;header='.$actheader.'&amp;colorscheme='.$color.'&amp;linktarget=_blank&amp;border_color&amp;font&amp;recommendations='.$recommend.'&amp;appId='.$appid.'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$width.'px; height:'.$height.'px;" allowTransparency="true"></iframe>';
   $content .= '</div>';
?>