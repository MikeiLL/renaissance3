<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_fballlogin.php 2982 2012-09-20 07:56:41Z sourceaddons $
 */
 
  // Check for api key and other settings.
  
  $content = '';
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">'; 
  $subtitle_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_LOGIN_SUBTITLE'";
  $subtitle_query = $db->Execute($subtitle_query);
  $subtitle = $subtitle_query->fields['configuration_value'];
  
  $fb_apikey_query = "select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_FBALL_LOGIN_API_KEY'";
  $fb_apikey_query = $db->Execute($fb_apikey_query);
  $fbapikey = trim($fb_apikey_query->fields['configuration_value']);
  if (!empty($fbapikey)) {
	 $redirect = zen_href_link('fballlogin', '', 'SSL'); 
	  if (isset($_SESSION['customer_id']) and $_SESSION['customer_id'] != '') {
	    $fbavatar_query = "select customer_fb_avatar from " . DB_PREFIX.'fball_customer' . " where customers_id = '" . (int)$_SESSION['customer_id'] . "'";
        $fbavatar = $db->Execute($fbavatar_query);

	    if(!empty($fbavatar->fields['customer_fb_avatar'])) {
		  $content .= '<div align ="center"><a href="'.zen_href_link('account', '', 'SSL').'"><img src = "'.$fbavatar->fields['customer_fb_avatar'].'" style ="height:auto; width:90px; background: none repeat scroll 0 0 #FFFFFF;border: 1px solid #CCCCCC;display: block;margin: 2px 4px 4px 0; padding: 2px;"></a><a href="'.zen_href_link('account', '', 'SSL').'"><b> Hi! '.$_SESSION['customer_first_name'].'</b></a></div>';
		}
		else {
		  $content .= '<a href="'.zen_href_link('account', '', 'SSL').'"><b> Hi! '.$_SESSION['customer_first_name'].'</b></a>';
		}
	  }
	  else {
        $content .= '<div style="margin-bottom:5px;"><b>'.$subtitle.'</b></div>';
        $content .= '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="'.DIR_WS_INCLUDES.'fball_connect.js"></script>
				   <div class="fball_ui ">
  <div class="fball_form" title="Facebook All">
  <a href="javascript:void(0);" title="Facebook" class="fball_login_facebook"><img src="'.DIR_WS_IMAGES.'fball_login.gif" style="cursor:pointer;" ></a> </div>
  <div id="fball_facebook_auth">
    <input type="hidden" name="client_id" value="'.$fbapikey.'" />
    <input type="hidden" name="redirect_uri" value="'.urlencode($redirect).'"/>
  </div>
	<input type="hidden" id="fball_login_form_uri" value="'.$redirect.'"/>
</div>';
      }
   
  }
  else {
	$content .= '<p style ="color:red;">Please enter facebook api id or secret.</p>';
  }
  $content .= '</div>';
  $content .= '';
  ?>