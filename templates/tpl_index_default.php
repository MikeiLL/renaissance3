<?php
/**
 * Page Template
 *
 * Main index page<br />
 * Displays greetings, welcome text (define-page content), and various centerboxes depending on switch settings in Admin<br />
 * Centerboxes are called as necessary
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_index_default.php 3464 2006-04-19 00:07:26Z ajeh Modified by Picaflor Azul $
 */
?>

<script type="text/javascript">
  $(document).ready(function() {
    $('a.moduleBox').click(function() { // show selected module(s)
    // variables
      var popID = $(this).attr('rel');
      var popNAV = $(this).attr('class');
    // hide all wrappers and display the one selected
      $('.centerBoxWrapper').hide();
      // check if all or single selection
      if (popID != 'viewAll') {
        $('#' + popID).fadeIn();
      } else {
       $('.centerBoxWrapper').fadeIn();
      }
    });
  });
</script>

<div class="centerColumn" id="indexDefault">
<h1 id="indexDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if (SHOW_CUSTOMER_GREETING == 1) { ?>
<h2 class="greeting"><?php echo zen_customer_greeting(); ?></h2>
<?php } ?>

<!-- deprecated - to use uncomment this section
<?php if (TEXT_MAIN) { ?>
<div id="" class="content"><?php echo TEXT_MAIN; ?></div>
<?php } ?>-->

<!-- deprecated - to use uncomment this section
<?php if (TEXT_INFORMATION) { ?>
<div id="" class="content"><?php echo TEXT_INFORMATION; ?></div>
<?php } ?>-->

<?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2) { ?>
<?php
/**
 * get the Define Main Page Text
 */
?>
<div id="indexDefaultMainContent" class="content"><?php require($define_page); ?></div>
<?php } ?>


<div id="moduleMenu-wrapper">
<?php
// bof module navigation
$show_display_nav = $db->Execute(SQL_SHOW_PRODUCT_INFO_MAIN);
if ($this_is_home_page) {
  echo '';
}
echo '<div id="moduleMenu">';
while (!$show_display_nav->EOF) {
  switch ($show_display_nav->fields['configuration_key']) {
    case 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS':
      echo '<span class="navOne moduleSpan"><a href="javascript:void(0)" rel="featuredProducts" class="navOne moduleBox">' . MODULE_TABS_FEATURED . '</a></span>';
    break;
    case 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS':
      echo '<span class="navThree moduleSpan"><a href="javascript:void(0)" rel="specialsDefault" class="navThree moduleBox">' . MODULE_TABS_SPECIALS . '</a></span>';
    break;
    case 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS':
      echo '<span class="navTwo moduleSpan"><a href="javascript:void(0)" rel="whatsNew" class="navTwo moduleBox">' . MODULE_TABS_NEW . '</a></span>';
    break;
  }
  $show_display_nav->MoveNext();
}
//echo '<span class="navFour moduleSpan"><a href="javascript:void(0)" rel="viewAll" class="navFour moduleBox">' . MODULE_TABS_ALL . '</a></span>';
echo '<br class="clearBoth" />';
echo '</div>';
// eof module navigation

  $show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_MAIN);
  while (!$show_display_category->EOF) {
?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_UPCOMING') { ?>
<?php
/**
 * display the Upcoming Products Center Box
 */
?>
<?php include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS)); ?><?php } ?>


<?php
  $show_display_category->MoveNext();
  } // !EOF
?>
</div>
</div>