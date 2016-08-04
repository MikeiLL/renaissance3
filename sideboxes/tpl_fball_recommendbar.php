<?php
/**
 * Facebookall recommendations bar sidebox by sourceaddons
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_fball_fanbox.php 3133 2012-21-09 23:39:02Z sourceaddons $
 *
 * @contribution: Facebook Sidebox
 * @author: sourceaddons
 * @version $Id: tpl_fball_recommendbar.php 2012-21-09 $
 */

   $content = '';
 
// Getting page url.
      $fbpageurl_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECBAR_DOMAIN'";
      $fbpageurl_array = $db->Execute($fbpageurl_query);
      $pageurl = trim($fbpageurl_array->fields['configuration_value']);

// Getting page url.
      $fbappid_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECBAR_APPID'";
      $fbappid_array = $db->Execute($fbappid_query);
      $appid = trim($fbappid_array->fields['configuration_value']);
	 
// Getting height.
      $readtime_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECBAR_READTIME'";
      $readtime_array = $db->Execute($readtime_query);
      $readtime = trim($readtime_array->fields['configuration_value']);

// Getting faces value.
      $verb_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECBAR_VERB'";
      $verb_array = $db->Execute($verb_query);
      $verb = trim($verb_array->fields['configuration_value']);

// Getting stream value.
      $side_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_RECBAR_SIDE'";
      $side_array = $db->Execute($side_query);
      $side = trim($side_array->fields['configuration_value']);

	  $verb =($verb == 'like' ? 'like' : 'recommend');
      $side =($side == 'left' ? 'left' : 'right');
	  $current_article = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   
   $content .= '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId='.$appid.'";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>';
   $content .= '<div class="fb-recommendations-bar" data-href="'.$current_article.'" data-action="'.$verb.'" data-side="'.$side.'" data-site="'.$pageurl.'" data-read-time="'.$readtime.'"></div>';
  ?>