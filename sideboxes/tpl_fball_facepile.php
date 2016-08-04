<?php
/**
 * Facebookall facepile sidebox by sourceaddons
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_fball_facepile.php 3133 2012-21-09 23:39:02Z sourceaddons $
 *
 * @contribution: Facebookall facepile sidebox
 * @author: sourceaddons
 * @version $Id: tpl_fball_facepile.php 2012-21-09 $
 */

   $content = '';

	  
// Getting page url.
      $fbpageurl_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FACEPILE_PAGEURL'";
      $fbpageurl_array = $db->Execute($fbpageurl_query);
      $pageurl = trim($fbpageurl_array->fields['configuration_value']);
	  $pageurl = urlencode($pageurl);

// Getting height.
      $numrows_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FACEPILE_NUMROWS'";
      $numrows_array = $db->Execute($numrows_query);
      $numrows = trim($numrows_array->fields['configuration_value']);

// Getting width.
      $fanboxwidth_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_FACEPILE_WIDTH'";
      $fanboxwidth_array = $db->Execute($fanboxwidth_query);
      $width = trim($fanboxwidth_array->fields['configuration_value']);

   $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
   $content .= '<iframe src="//www.facebook.com/plugins/facepile.php?href='.$pageurl.'&amp;action&amp;size=medium&amp;max_rows='.$numrows.'&amp;width=300&amp;colorscheme=light" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$width.'px;" allowTransparency="true"></iframe>';
   $content .= '</div>';
?>