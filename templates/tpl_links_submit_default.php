<?php
/**
 * Links Submit Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_links_submit_default.php 3.5.3 4/16/2010 Clyde Jones $
 */
?>

<div class="centerColumn" id="ezPageDefault">
   
<?php echo zen_draw_form('submit_link', zen_href_link(FILENAME_LINKS_SUBMIT, 'action=send', $request_type), 'post',  'enctype="multipart/form-data"'); ?>

<?php if (LINKS_STORE_NAME_ADDRESS == 'true') { ?>
<address><?php echo nl2br(STORE_NAME_ADDRESS); ?></address>
<?php } ?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>

<div class="mainContent success"><?php echo LINKS_SUCCESS; ?></div>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) .'</a>'; ?></div>


<?php
  } else {
?>

<?php if (DEFINE_LINKS_STATUS >= '1' and DEFINE_LINKS_STATUS <= '2') { ?>
<div id="pageThreeMainContent">
<?php
require($define_page);
?>
</div>
<?php } ?>



<fieldset>
<legend><?php echo NAVBAR_TITLE_2; ?></legend>
<?php if ($messageStack->size('submit_link') > 0) echo $messageStack->output('submit_link'); ?>

<div class="forward"><?php echo '<a href="' . zen_href_link(FILENAME_POPUP_LINKS_HELP) . '" 
   onclick="popupWindow(this.href); return false">' . zen_image_button(BUTTON_IMAGE_LINK_HELP, BUTTON_LINK_HELP_ALT) . '</a>'; ?></div> 

<div class="alert back"><?php echo zen_image($template->get_template_dir(RETURN_REQUIRED_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_REQUIRED_IMAGE, RETURN_REQUIRED_IMAGE_ALT, RETURN_REQUIRED_IMAGE_WIDTH, RETURN_REQUIRED_IMAGE_HEIGHT) . RETURN_REQUIRED_INFORMATION . zen_image($template->get_template_dir(RETURN_OPTIONAL_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_OPTIONAL_IMAGE, RETURN_OPTIONAL_IMAGE_ALT, RETURN_OPTIONAL_IMAGE_WIDTH, RETURN_OPTIONAL_IMAGE_HEIGHT) . RETURN_OPTIONAL_INFORMATION; ?></div>
<br class="clearBoth" />
<fieldset>
<legend><?php echo CATEGORY_CONTACT; ?></legend>
<ol>
<li>
<label class="inputLabel" for="contactname"><?php echo (($error == true && $entry_name_error == true) ? ENTRY_LINKS_CONTACT_NAME . zen_image($template->get_template_dir(RETURN_WARNING_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_WARNING_IMAGE, RETURN_WARNING_IMAGE_ALT, RETURN_WARNING_IMAGE_WIDTH, RETURN_WARNING_IMAGE_HEIGHT) : ENTRY_LINKS_CONTACT_NAME . zen_image($template->get_template_dir(RETURN_REQUIRED_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_REQUIRED_IMAGE, RETURN_REQUIRED_IMAGE_ALT, RETURN_REQUIRED_IMAGE_WIDTH, RETURN_REQUIRED_IMAGE_HEIGHT)); ?></label>
<?php echo (($error == true && $entry_name_error == true) ? zen_draw_input_field('contactname', $links_contact_name, 'size="18" id="contactname"') . ENTRY_LINKS_CONTACT_NAME_ERROR : zen_draw_input_field('contactname', $links_contact_name, 'size="18" id="contactname"')); ?>
</li>
<li>
<label class="inputLabel" for="links_contact_email"><?php echo (($error == true && $entry_email_error == true) ? ENTRY_EMAIL_ADDRESS . zen_image($template->get_template_dir(RETURN_WARNING_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_WARNING_IMAGE, RETURN_WARNING_IMAGE_ALT, RETURN_WARNING_IMAGE_WIDTH, RETURN_WARNING_IMAGE_HEIGHT) : ENTRY_EMAIL_ADDRESS . zen_image($template->get_template_dir(RETURN_REQUIRED_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_REQUIRED_IMAGE, RETURN_REQUIRED_IMAGE_ALT, RETURN_REQUIRED_IMAGE_WIDTH, RETURN_REQUIRED_IMAGE_HEIGHT)); ?></label>
<?php echo (($error == true && $entry_email_error == true) ? zen_draw_input_field('links_contact_email', $links_contact_email, 'size="18" id="links_contact_email"') . ENTRY_EMAIL_CHECK_ERROR : zen_draw_input_field('links_contact_email', $links_contact_email, 'size="18" id="links_contact_email"')); ?>
</li>
</ol>               
</fieldset>
<fieldset>
<legend><?php echo CATEGORY_WEBSITE; ?></legend>
<ol>
<?php if ($error == true && $entry_title_min_error == true) { ?>
<li>
<label class="inputLabel" for="links_title"><?php echo ENTRY_LINKS_TITLE . zen_image($template->get_template_dir(RETURN_WARNING_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_WARNING_IMAGE, RETURN_WARNING_IMAGE_ALT, RETURN_WARNING_IMAGE_WIDTH, RETURN_WARNING_IMAGE_HEIGHT); ?></label>
<?php echo zen_draw_input_field('links_title', $links_title, 'size="18" id="links_title"') .  ENTRY_LINKS_TITLE_MIN_ERROR; ?>
</li>
<?php } else {  ?>
<?php if ($error == true && $entry_title_max_error == true) { ?>
<li>
<label class="inputLabel" for="links_title"><?php echo ENTRY_LINKS_TITLE . zen_image($template->get_template_dir(RETURN_WARNING_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_WARNING_IMAGE, RETURN_WARNING_IMAGE_ALT, RETURN_WARNING_IMAGE_WIDTH, RETURN_WARNING_IMAGE_HEIGHT); ?></label>
<?php echo zen_draw_input_field('links_title', $links_title, 'size="18" id="links_title"') . ENTRY_LINKS_TITLE_MAX_ERROR; ?>
</li>
<?php } else {  ?>
<li>
<label class="inputLabel" for="links_title"><?php echo ENTRY_LINKS_TITLE . zen_image($template->get_template_dir(RETURN_REQUIRED_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_REQUIRED_IMAGE, RETURN_REQUIRED_IMAGE_ALT, RETURN_REQUIRED_IMAGE_WIDTH, RETURN_REQUIRED_IMAGE_HEIGHT); ?></label>
<?php echo zen_draw_input_field('links_title', $links_title, 'size="18" id="links_title"'); ?>
</li>
<?php } 
}
?>
<li>
<label class="inputLabel" for="links_url"><?php echo (($error == true && $entry_url_error == true) ? ENTRY_LINKS_URL . zen_image($template->get_template_dir(RETURN_WARNING_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_WARNING_IMAGE, RETURN_WARNING_IMAGE_ALT, RETURN_WARNING_IMAGE_WIDTH, RETURN_WARNING_IMAGE_HEIGHT) : ENTRY_LINKS_URL . zen_image($template->get_template_dir(RETURN_REQUIRED_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_REQUIRED_IMAGE, RETURN_REQUIRED_IMAGE_ALT, RETURN_REQUIRED_IMAGE_WIDTH, RETURN_REQUIRED_IMAGE_HEIGHT)); ?></label>
<?php echo (($error == true && $entry_url_error == true) ? zen_draw_input_field('links_url', 'http://', 'size="18" id="links_url"') . ENTRY_LINKS_URL_ERROR : zen_draw_input_field('links_url', 'http://', 'size="18" id="links_url"')); ?>
</li>
<?php
  //link category drop-down list
  $categories_array = array();
  $categories_values = $db->Execute("select lcd.link_categories_id, lcd.link_categories_name from " . TABLE_LINK_CATEGORIES_DESCRIPTION . " lcd where lcd.language_id = '" . (int)$_SESSION['languages_id'] . "' order by lcd.link_categories_name");
 while (!$categories_values->EOF) {
    $categories_array[] = array('id' => $categories_values->fields['link_categories_name'], 'text' => $categories_values->fields['link_categories_name']);
$categories_values->MoveNext();
  }
  if (isset($_GET['lPath'])) {
    $current_categories_id = $_GET['lPath'];
    $categories = $db->Execute("select link_categories_name from " . TABLE_LINK_CATEGORIES_DESCRIPTION . " where link_categories_id ='" . (int)$current_categories_id . "' and language_id ='" . (int)$_SESSION['languages_id'] . "'");
    $default_category = $categories->fields['link_categories_name'];
    } else {
      $default_category = '';
    }
?>
<li>            
<?php echo ENTRY_LINKS_CATEGORY_INFO;?>
<label class="inputLabel" for="links_category"><?php echo ENTRY_LINKS_CATEGORY . zen_image($template->get_template_dir(RETURN_REQUIRED_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_REQUIRED_IMAGE, RETURN_REQUIRED_IMAGE_ALT, RETURN_REQUIRED_IMAGE_WIDTH, RETURN_REQUIRED_IMAGE_HEIGHT); ?></label>
<?php echo zen_draw_pull_down_menu('links_category', $categories_array, $default_category);?>
</li>
<?php if ($error == true && $entry_description_min_error == true) { ?>
<li>
<?php echo ENTRY_LINKS_DESCRIPTION_INFO; ?>
<label class="inputLabel" for="links_description"><?php echo ENTRY_LINKS_DESCRIPTION . zen_image($template->get_template_dir(RETURN_WARNING_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_WARNING_IMAGE, RETURN_WARNING_IMAGE_ALT, RETURN_WARNING_IMAGE_WIDTH, RETURN_WARNING_IMAGE_HEIGHT); ?></label>
<?php echo zen_draw_textarea_field('links_description', '20', '5', $links_description) . ENTRY_LINKS_DESCRIPTION_MIN_ERROR; ?>
</li>
<?php } else {  ?>
<?php if ($error == true && $entry_description_max_error == true) { ?>
<li>
<?php echo ENTRY_LINKS_DESCRIPTION_INFO; ?>
<label class="inputLabel" for="links_description"><?php echo ENTRY_LINKS_DESCRIPTION . zen_image($template->get_template_dir(RETURN_WARNING_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_WARNING_IMAGE, RETURN_WARNING_IMAGE_ALT, RETURN_WARNING_IMAGE_WIDTH, RETURN_WARNING_IMAGE_HEIGHT); ?></label>
<?php echo zen_draw_textarea_field('links_description', '20', '5', $links_description) . ENTRY_LINKS_DESCRIPTION_MAX_ERROR ; ?>
</li>
<?php } else {  ?>
<li>
<?php echo ENTRY_LINKS_DESCRIPTION_INFO; ?>
<label class="inputLabel" for="links_description"><?php echo ENTRY_LINKS_DESCRIPTION . zen_image($template->get_template_dir(RETURN_REQUIRED_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_REQUIRED_IMAGE, RETURN_REQUIRED_IMAGE_ALT, RETURN_REQUIRED_IMAGE_WIDTH, RETURN_REQUIRED_IMAGE_HEIGHT); ?></label>
<?php echo zen_draw_textarea_field('links_description', '20', '5',$links_description ); ?>
</li>
<?php } 
}
?>
<?php if (SHOW_LINKS_BANNER_IMAGE == 'true') { ?>
<li>
<?php echo ENTRY_LINKS_BANNER_INFO;?>
<label class="inputLabel" for="links_image_url"><?php echo ENTRY_LINKS_BANNER . zen_image($template->get_template_dir(RETURN_OPTIONAL_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_OPTIONAL_IMAGE, RETURN_OPTIONAL_IMAGE_ALT, RETURN_OPTIONAL_IMAGE_WIDTH, RETURN_OPTIONAL_IMAGE_HEIGHT); ?></label>
<?php echo zen_draw_file_field('links_image_url', '','size="18"'); ?>
</li>
<?php
  }
?>
</ol>
</fieldset>     
<?php if (SUBMIT_LINK_REQUIRE_RECIPROCAL == 'true') { ?>
<fieldset>
<legend><?php echo CATEGORY_RECIPROCAL; ?></legend>
<ol>
<li>
<label class="inputLabel" for="links_reciprocal_url"><?php echo (($error == true && $entry_reciprocal_error == true) ? ENTRY_LINKS_RECIPROCAL_URL . zen_image($template->get_template_dir(RETURN_WARNING_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_WARNING_IMAGE, RETURN_WARNING_IMAGE_ALT, RETURN_WARNING_IMAGE_WIDTH, RETURN_WARNING_IMAGE_HEIGHT) : ENTRY_LINKS_RECIPROCAL_URL . zen_image($template->get_template_dir(RETURN_REQUIRED_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . RETURN_REQUIRED_IMAGE, RETURN_REQUIRED_IMAGE_ALT, RETURN_REQUIRED_IMAGE_WIDTH, RETURN_REQUIRED_IMAGE_HEIGHT)); ?></label>
<?php echo (($error == true && $entry_reciprocal_error == true) ? zen_draw_input_field('links_reciprocal_url', 'http://', 'size="18" id="links_reciprocal_url"') . ENTRY_LINKS_RECIPROCAL_URL_ERROR : zen_draw_input_field('links_reciprocal_url', 'http://', 'size="18" id="links_reciprocal_url"')); ?>
</li>
</ol>
</fieldset>
<?php
  }
?>

<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT_LINK, BUTTON_SUBMIT_LINK_ALT); ?></div>
</fieldset>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) .'</a>'; ?></div>
<?php
  }
?>
</form>
<br class="clearBoth" />
</div>
