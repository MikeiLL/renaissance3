<?php
/**
 * Module Template - categories_tabs
 *
 * Template stub used to display categories-tabs output
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_categories_tabs.php 3395 2006-04-08 21:13:00Z ajeh $
 */


?>

<script src="<?php echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/script.js' ?>" type="text/javascript"></script>


<div id="container">
    <a class="toggleMenu" href="#"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.M_MENU_IMAGE ?>" alt="m menu image" title="Menu"/></a>
    <?php echo '<a class="m-home" href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.M_HOME_IMAGE ?>" alt=" m home" title="Home"/></a>
    <a class="m-home" href="<?php echo zen_href_link(FILENAME_BLOG); ?>"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.M_BLOG_IMAGE ?>" alt="m cart" title="Online Blog"/></a>
    
    <a class="m-cart" href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.M_CART_IMAGE ?>" alt="m cart" title="Cart Contents"/></a>
<ul class="nav">
<li class="test"><a href="#"><?php echo HEADER_TITLE_CATEGORIES; ?></a>
<?php
// load the UL-generator class and produce the menu list dynamically from there
 require_once (DIR_WS_CLASSES . 'categories_ul_generator.php');
$zen_CategoriesUL = new zen_categories_ul_generator;
$menulist = $zen_CategoriesUL->buildTree(true);
$menulist = str_replace('"level4"','"level5"',$menulist);
$menulist = str_replace('"level3"','"level4"',$menulist);
$menulist = str_replace('"level2"','"level3"',$menulist);
$menulist = str_replace('"level1"','"level2"',$menulist);
$menulist = str_replace('<li>','<li>',$menulist);
$menulist = str_replace("</li>\n</ul>\n</li>\n</ul>\n","</li>\n</ul>\n",$menulist);
echo $menulist;
?>                        
</li>
    <li><a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo HEADER_TITLE_CART_CONTENTS; ?> - <? echo $_SESSION['cart']->count_contents();?> <?php echo HEADER_TITLE_CART_ITEMS; ?> - <? echo $currencies->format($_SESSION['cart']->show_total());?></a></li>
    
    <li><a href="<?php echo zen_href_link(FILENAME_FEATURED_PRODUCTS); ?>"><?php echo TABLE_HEADING_FEATURED_PRODUCTS; ?></a></li>
     <li><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li>
    

<li>
<a href="#"><?php echo HEADER_TITLE_QUICK_LINKS; ?></a>
    <ul>
  <li><a href="<?php echo zen_href_link(FILENAME_PRODUCTS_NEW); ?>"><?php echo HEADER_TITLE_NEW_PRODUCTS; ?></a></li>
  <li><a href="<?php echo zen_href_link(FILENAME_FEATURED_PRODUCTS); ?>"><?php echo TABLE_HEADING_FEATURED_PRODUCTS; ?></a></li>
  <li><a href="<?php echo zen_href_link(FILENAME_PRODUCTS_ALL); ?>"><?php echo HEADER_TITLE_ALL_PRODUCTS; ?></a></li>
  <li><a href="<?php echo zen_href_link(FILENAME_SPECIALS); ?>"><?php echo HEADER_TITLE_SPECIALS; ?></a></li>
</ul>
</li>

<li>
  <a href="#"><?php echo HEADER_TITLE_INFORMATION; ?></a>
    <ul>
    <li>
    <a href="#"><?php echo HEADER_TITLE_CUSTOMER_SERVICE; ?></a>
    <ul>
    <?php if (DEFINE_ABOUT_US_STATUS <= 1) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_ABOUT_US); ?>"><?php echo BOX_INFORMATION_ABOUT_US; ?></a></li>
    <?php } ?>
    <?php if ($_SESSION['customer_id']) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li>
    <li><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a></li>
    <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL'); ?>"><?php echo TITLE_NEWSLETTERS; ?></a></li>
    <?php } else { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li>
    <li><a href="<?php echo zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CREATE_ACCOUNT; ?></a></li>
    <?php } ?>
    <?php if (DEFINE_SHIPPINGINFO_STATUS <= 1) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_SHIPPING); ?>"><?php echo BOX_INFORMATION_SHIPPING; ?></a></li>
    <?php } ?>
    <?php if (DEFINE_PRIVACY_STATUS <= 1)  { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_PRIVACY); ?>"><?php echo BOX_INFORMATION_PRIVACY; ?></a></li>
    <?php } ?>
    <?php if (DEFINE_CONDITIONS_STATUS <= 1) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_CONDITIONS); ?>"><?php echo BOX_INFORMATION_CONDITIONS; ?></a></li>
    <?php } ?>
    </ul>
    </li>
    <li>
    <a href="#">General Info</a>
    <ul>
    <?php if (DEFINE_SITE_MAP_STATUS <= 1) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_SITE_MAP); ?>"><?php echo BOX_INFORMATION_SITE_MAP; ?></a></li>
    <?php } ?>
    <?php if (MODULE_ORDER_TOTAL_GV_STATUS == 'true') { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_GV_FAQ, '', 'NONSSL'); ?>"><?php echo BOX_INFORMATION_GV; ?></a></li>
    <?php } ?>
    <?php if (MODULE_ORDER_TOTAL_COUPON_STATUS == 'true') { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_DISCOUNT_COUPON, '', 'NONSSL'); ?>"><?php echo BOX_INFORMATION_DISCOUNT_COUPONS; ?></a></li>
    <?php } ?>
    <?php if (SHOW_NEWSLETTER_UNSUBSCRIBE_LINK == 'true') { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_UNSUBSCRIBE, '', 'NONSSL'); ?>"><?php echo BOX_INFORMATION_UNSUBSCRIBE; ?></a></li>
    <?php } ?>
    </ul>
    </li>
    <li>
    <a href="#"><?php echo TITLE_EZ_PAGES; ?></a>
    <ul>
    <?php require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . 'ezpages_drop_menu.php'); ?>
    </ul>
    </li>
    </ul>
    </li>
   <li> 
    <a href="#">Search</a>
    <ul class="mobile-search">
  <li>
  <?php require(DIR_WS_MODULES . 'sideboxes/search_header.php'); ?>
    </li></ul>
    </li>
    <li><a href="<?php echo zen_href_link(FILENAME_IMAGE_TO_CONTACT, '', 'NONSSL'); ?>"><?php echo BOX_INFORMATION_CONTACT; ?></a></li>
</ul>
</div>

