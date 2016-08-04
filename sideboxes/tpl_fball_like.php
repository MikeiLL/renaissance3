<?php
/**
 * Facebookall like sidebox by sourceaddons
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_fball_like.php 3133 2012-21-09 23:39:02Z sourceaddons $
 *
 * @contribution: Facebookall like sidebox
 * @author: sourceaddons
 * @version $Id: tpl_fball_like.php 2012-21-09 $
 */

   $content = '';
   
   // Getting page url.
      $fbpageurl_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_LIKE_PAGEURL'";
      $fbpageurl_array = $db->Execute($fbpageurl_query);
      $pageurl = trim($fbpageurl_array->fields['configuration_value']);

// Getting page url.
      $fbprofileurl_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_LIKE_PROURL'";
      $fbprofileurl_array = $db->Execute($fbprofileurl_query);
      $profileurl = trim($fbprofileurl_array->fields['configuration_value']);
      $profileurl = urlencode($profileurl);
	
// Getting width.
      $likewidth_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_LIKE_WIDTH'";
      $likewidth_array = $db->Execute($likewidth_query);
      $width = trim($likewidth_array->fields['configuration_value']);

// Getting faces value.
      $likefaces_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_LIKE_FACES'";
      $likefaces_array = $db->Execute($likefaces_query);
      $faces = trim($likefaces_array->fields['configuration_value']);

// Getting stream value.
      $likestream_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_LIKE_SEND'";
      $likestream_array = $db->Execute($likestream_query);
      $send = trim($likestream_array->fields['configuration_value']);
	  $faces =($faces == 'YES' ? 'true' : 'false');
	  $send =($send == 'YES' ? 'true' : 'false');

   
   $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
   $content .= '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
';
$content .= '<div class="fb-like" data-href="'.$pageurl.'" data-send="'.$send.'" data-width="'.$width.'" data-show-faces="'.$faces.'"></div><br><iframe src="//www.facebook.com/plugins/subscribe.php?href='.$profileurl.'&amp;layout=standard&amp;show_faces='.$faces.'&amp;colorscheme=light&amp;font&amp;width=450" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$width.'px;" allowTransparency="true"></iframe>';
   $content .= '</div>';
?>