<?php
/**
 * Common Template - tpl_footer.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_footer = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer.php 4821 2006-10-23 10:54:15Z drbyte $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));
?>

<?php
if (!isset($flag_disable_footer) || !$flag_disable_footer) {
?>


<div id="footer" class="onerow-fluid">



<!--bof-navigation display -->
<div id="navSuppWrapper" class="onerow-fluid">

<div id="footer-header">
</div>



<!--BOF footer menu display-->
<?php require($template->get_template_dir('tpl_footer_menu.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer_menu.php');?>
<!--EOF footer menu display-->

<div id="footer-payments">
<center>
  <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.FOOTER_PAYMENT_ICON ?>"   alt="payments we accept" class="payments-image" /> 
</center>
</div>


</div>





<!--bof- site copyright display -->
<div id="siteinfoLegal" class="legalCopyright onerow-fluid"><?php echo FOOTER_TEXT_BODY; ?> <br/><a href="http://www.zen-cart.com">Zen Cart</a> development by <a href="http://www.mZoo.org">mZoo.org</a></div>
<!--eof- site copyright display -->


<!--eof-navigation display -->

<!--bof-ip address display -->
<?php
if (SHOW_FOOTER_IP == '1') {
?>
<div id="siteinfoIP"><?php echo TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR']; ?></div>
<?php
}
?>
<!--eof-ip address display -->

<!--bof-banner #5 display -->
<?php
  if (SHOW_BANNERS_GROUP_SET5 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET5)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerFive" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>
<!--eof-banner #5 display -->


<?php
} // flag_disable_footer
?>
