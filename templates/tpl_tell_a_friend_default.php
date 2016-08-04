<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_tell_a_friend_default.php 18698 2011-05-04 14:50:06Z wilt $
 */
?>
<div class="centerColumn" id="tellAFriendDefault">
<?php echo zen_draw_form('email_friend', zen_href_link(FILENAME_TELL_A_FRIEND, 'action=process&products_id=' . $_GET['products_id'], $request_type)); ?>

<?php if ($messageStack->size('friend') > 0) echo $messageStack->output('friend'); ?>

<fieldset>
<legend><?php echo sprintf(HEADING_TITLE, $product_info->fields['products_name']); ?></legend>
<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />

<label class="inputLabel" for="from-name"><?php echo FORM_FIELD_CUSTOMER_NAME; ?></label>
<?php echo zen_draw_input_field('from_name','','id="from-name"') . '&nbsp;<span class="alert">' . ENTRY_FIRST_NAME_TEXT . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="from-email-address"><?php echo FORM_FIELD_CUSTOMER_EMAIL; ?></label>
<?php echo zen_draw_input_field('from_email_address','','id="from-email-address"') . '&nbsp;<span class="alert">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="to-name"><?php echo FORM_FIELD_FRIEND_NAME; ?></label>
<?php echo zen_draw_input_field('to_name', '', 'id="to-name"') . '&nbsp;<span class="alert">' . ENTRY_FIRST_NAME_TEXT . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="to-email-address"><?php echo FORM_FIELD_FRIEND_EMAIL; ?></label>
<?php echo zen_draw_input_field('to_email_address', $_GET['to_email_address'], 'id="to-email-address"') . '&nbsp;<span class="alert">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>'; ?>
<br class="clearBoth" />

<label for="email-message"><?php echo FORM_TITLE_FRIEND_MESSAGE; ?></label>
<?php echo zen_draw_textarea_field('message', 30, 5, '', 'id="email-message"'); ?>
<br class="clearBoth" />
<br class="clearBoth" />
</fieldset>

<!--START CAPTCHA INPUT HERE -->

<?php
if (ACCOUNT_VALIDATION == 'true' && TELL_A_FRIEND_VALIDATION == 'true') {
?>

<?php
if (strstr($_SERVER['REQUEST_URI'],'tell_a_friend') && TELL_A_FRIEND_VALIDATION == 'true' || strstr($_SERVER['REQUEST_URI'],'login') && LOGIN_VALIDATION == 'true') { 
?>

<?php
  if ($is_read_only == false || (strstr($_SERVER['REQUEST_URI'],'tell_a_friend')) || (strstr($_SERVER['REQUEST_URI'],'login'))) {
    $sql = "DELETE FROM " . TABLE_ANTI_ROBOT_REGISTRATION . " WHERE timestamp < '" . (time() - 3600) . "' OR session_id = '" . zen_session_id() . "'";
    if( !$result = $db->Execute($sql) ) { die('Could not delete validation key'); }
    $reg_key = generate_captcha_code();
    $sql = "INSERT INTO ". TABLE_ANTI_ROBOT_REGISTRATION . " VALUES ('" . zen_session_id() . "', '" . $reg_key . "', '" . time() . "')";
    if( !$result = $db->Execute($sql) ) { die('Could not check registration information'); }
?>

<fieldset>
<legend><?php echo CATEGORY_ANTIROBOTREG; ?></legend>
<label class="inputLabel" for="antirobotreg"><?php echo ENTRY_ANTIROBOTREG ?></label>

<?php
$validation_images = '';
for($i = 0; $i < ENTRY_VALIDATION_LENGTH; $i++)
    {
    $parse_image = 'validation/validation_' . $reg_key{$i} . '.gif';
    $parse_image_alt = $reg_key{$i};
    $validation_images .= zen_image(DIR_WS_IMAGES . $parse_image, $parse_image_alt);
    }
    echo '<div class="centered">';
    echo $validation_images . '<br />';
    echo '</div>';
?>

<?php echo zen_draw_input_field('antirobotreg','', 'id="antirobotreg"') . (zen_not_null(ENTRY_ANTIROBOTREG) ? '<span class="alert">' . ENTRY_ANTIROBOTREG_TEXT . '</span>': ''); ?>
<br class="clearBoth" />

<?php
    }
?>

<?php
    }
?>

<?php
    }
?>
<!-- END CAPTCHA INPUT -->

</fieldset>

<div class="buttonRow back"><?php echo '<a href="' . zen_href_link(zen_get_info_page($_GET['products_id']), 'products_id=' . $_GET['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<br class="clearBoth" />

<div id="tellAFriendAdvisory" class="advisory"><?php echo EMAIL_ADVISORY_INCLUDED_WARNING . str_replace('-----', '', EMAIL_ADVISORY); ?></div>

</form>
</div>