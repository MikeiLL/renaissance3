<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: tpl_band_signup_default.php,v 1.3 2007/06/07 00:00:00 DrByteZen Exp $
//
?>

<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<div class="centerColumn" id="bandSignupDefault">

<h1 id="bandSignupDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php echo zen_draw_form('image_to_contact', zen_href_link(FILENAME_IMAGE_TO_CONTACT, 'action=send'), 'POST', 'enctype="multipart/form-data"');?>

<?php if ($messageStack->size('image_to_contact') > 0) echo $messageStack->output('image_to_contact');?>

<?php if (CONTACT_US_STORE_NAME_ADDRESS== '1') { ?>
<address><?php echo nl2br(STORE_NAME_ADDRESS); ?></address>
<?php } ?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>

<div class="mainContent success"><?php echo TEXT_SUCCESS; ?></div>

<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>


<?php
  } else {
?>
<div id="bandSignupContent" class="content">
<fieldset id="bandSignup-Info">
<legend><?php echo HEADING_TITLE; ?></legend>
<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />

<?php
// show dropdown if set
    if (CONTACT_US_LIST !=''){
?>
<label class="inputLabel" for="send-to"><?php echo SEND_TO_TEXT; ?></label>
<?php echo zen_draw_pull_down_menu('send_to',  $send_to_array, 0, 'id="send-to"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />
<?php
    }
?>

<label class="inputLabel" for="first_name"><?php echo ENTRY_NAME; ?></label>
<?php echo zen_draw_input_field('contactname', $name, ' size="40" id="contactname"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="email_address"><?php echo ENTRY_EMAIL; ?></label>
<?php echo zen_draw_input_field('email', ($email_address), ' size="40" id="email-address"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="phone_number"><?php echo ENTRY_PHONE; ?></label>
	<?php echo zen_draw_input_field('phonenumber', $phone, ' size="40" id="phonenumber"') /*. '<span 
	class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'*/; ?>
	<br class="clearBoth" />

<label for="enquiry"><?php echo ENTRY_ENQUIRY . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
<?php echo zen_draw_textarea_field('enquiry', '30', '7', $enquiry, 'id="enquiry"'); ?>

<?php echo zen_draw_input_field('do_not_fill', '', ' size="40" id="CUAS" style="visibility:hidden; display:none;" autocomplete="off"'); ?>

</fieldset>

<fieldset id="bandSignup-Payment">
<legend>Project Images</legend> (2MB Max - free resize tool available <a href="http://www.picresize.com/" target="_newbrowser">here</a>.)

<div id="org_div1" class="file_wrapper_input">
<input type="hidden" value="1" id="theValue" /><input type="file" class="fileupload" name="uploaded_file" size="50" onchange="addElement()" /></div>
</fieldset>
<div style="border:solid 1px red;"><label for="captcha">Stop the Bots!<br/>
What is the first letter in the alphabet (upper or lower case), please?</label>
<?php echo zen_draw_input_field('captcha','', 'id="captcha" class="eight" maxlength="1" size="1"'); ?></div>
  
<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?> (please be patient for image uploads)</div>
<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>


<br class="clearBoth" />
</div>
</form>

<?php
  }
?>
</div>