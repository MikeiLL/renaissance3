<?php
/* Page Template - tpl_footer_menu.php
*Display the Footer Menu
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer_menu.php 1.0 5/9/2009 Clyde Jones $
*/
?>


<dl>

<?php echo QUICKLINKS; ?>

<?php echo INFORMATION; ?>

<?php echo CUSTOMER_SERVICE; ?>

<?php if (EZPAGES_STATUS_FOOTER == '1' or (EZPAGES_STATUS_FOOTER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>

<?php echo IMPORTANT; ?>
<?php require($template->get_template_dir('tpl_ezpages_footer_menu.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_footer_menu.php'); ?>
<?php echo IMPORTANT_END; ?>


<?php } ?>

</dl>




<div id="social-media">
<a href="<?php echo FACEBOOK; ?>" target="_blank"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.FACEBOOK_ICON ?>"  alt="facebook link" class="smi facebook" /></a>
<a href="<?php echo TWITTER; ?>" target="_blank"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.TWITTER_ICON ?>"  alt="twitter link" class="smi twitter" /></a>
<a href="<?php echo YOUTUBE; ?>" target="_blank"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.YOUTUBE_ICON ?>"  alt="youtube link" class="smi youtube" /></a>
<a href="<?php echo PINTEREST; ?>" target="_blank"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.PINTEREST_ICON ?>"  alt="pinterest link" class="smi pinterest" /></a>
<a href="<?php echo GOOGLE; ?>" target="_blank"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.GOOGLE_ICON ?>"  alt="google link" class="smi google" /></a>
<a href="<?php echo BLOG; ?>" target="_blank"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.BLOG_ICON ?>"  alt="blog link" class="smi blog" /></a>


</div>

<br class="clearBoth" />

