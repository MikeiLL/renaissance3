<?php
/**
 * Testimonials Manager
 *
 * @package Template System
 * @copyright 2007 Clyde Jones
  * @copyright Portions Copyright 2003-2007 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Testimonials_Manager.php v1.5.4
 */
 
?>
<div class="centerColumn" id="testimonialDefault">

<?php echo HEADING_TITLE; ?>

<?php
//  $testimonials_query_raw = "select * from " . TABLE_TESTIMONIALS_MANAGER . " where status = 1 and language_id = '" . (int)$_SESSION['languages_id'] . "' order by date_added DESC, testimonials_title";
//  $testimonials_split = new splitPageResults($testimonials_query_raw, MAX_DISPLAY_TESTIMONIALS_MANAGER_ALL_TESTIMONIALS);

  if (($testimonials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>


<div id="productsListingTopNumber" class="navSplitPagesResult back"><?php echo $testimonials_split->display_count(TEXT_DISPLAY_NUMBER_OF_TESTIMONIALS_MANAGER_ITEMS); ?></div>


<div id="productsListingListingTopLinks" class="navSplitPagesLinks forward"><?php echo TEXT_RESULT_PAGE . ' ' . $testimonials_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page'))); ?></div>
<br />
<br class="clearBoth" />

<hr />

<?php
  } // split page
?>
<?php
    $testimonials = $db->Execute($testimonials_split->sql_query);
    while (!$testimonials->EOF) {
	$date_published = $testimonials->fields['date_added'];
?>
<p class="back"><b><a href="<?php echo zen_href_link(FILENAME_TESTIMONIALS_MANAGER, 'testimonials_id=' . $testimonials->fields['testimonials_id']);?>"><?php echo $testimonials->fields['testimonials_title'];?></a></b></p>
    
<p class="forward"><?php if (DISPLAY_TESTIMONIALS_DATE_PUBLISHED == 'true') { echo zen_date_long($date_published); } ?></p>
<br />
<br class="clearBoth" />

<blockquote>
<div class="testimonial">
   <?php
   if (($testimonials->fields[testimonials_image]) != ('')) {
     $testimonials_image = zen_image(DIR_WS_IMAGES . $testimonials->fields[testimonials_image], $testimonials->fields['testimonials_title'], TESTIMONIAL_IMAGE_WIDTH, TESTIMONIAL_IMAGE_HEIGHT);
?>
<p class="testimonialImage">

<?php if (($testimonials->fields['testimonials_url']) == ('http://') or ($testimonials->fields['testimonials_url']) == ('')) {

echo $testimonials_image;
} else {
echo '<a href="' . $testimonials->fields['testimonials_url'] . '" target="_blank">' . $testimonials_image . '</a>';
}
?>
</p>
   <?php
   }
?>

<?php echo nl2br($testimonials->fields['testimonials_html_text']);?>
</div>
</blockquote>

<?php
$testimonial_info = '';
if ( (!empty($testimonials->fields[testimonials_city])) and (!empty($testimonials->fields[testimonials_country])) ) {
$testimonial_info .= NAME_SEPARATOR . $testimonials->fields[testimonials_city] . CITY_STATE_SEPARATOR . $testimonials->fields[testimonials_country];
}
if ( (!empty($testimonials->fields[testimonials_city])) and (empty($testimonials->fields[testimonials_country])) ) {
$testimonial_info .= NAME_SEPARATOR . $testimonials->fields[testimonials_city];
}
if ( (empty($testimonials->fields[testimonials_city])) and (!empty($testimonials->fields[testimonials_country])) ) {
$testimonial_info .= NAME_SEPARATOR . $testimonials->fields[testimonials_country];
}
if (!empty($testimonials->fields[testimonials_company])) {
$testimonial_info .= NAME_SEPARATOR . $testimonials->fields[testimonials_company];
}
?>
<div class="buttonRow back"><?php echo TESTIMONIALS_BY; ?> <?php echo $testimonials->fields[testimonials_name] . $testimonial_info; ?></div>

<br class="clearBoth" />
<br />
<hr />

<?php
      $testimonials->MoveNext();
      }
?>

<?php
  if (($testimonials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>

<div id="productsListingBottomNumber" class="navSplitPagesResult back"><?php echo $testimonials_split->display_count(TEXT_DISPLAY_NUMBER_OF_TESTIMONIALS_MANAGER_ITEMS); ?></div>

<div id="productsListingListingBottomLinks" class="navSplitPagesLinks forward"><?php echo TEXT_RESULT_PAGE . ' ' . $testimonials_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page'))); ?></div>

<?php
  } // split page
?>
<br class="clearBoth" />
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
<div class="buttonRow forward"><a href="<?php echo zen_href_link(FILENAME_TESTIMONIALS_ADD, '', 'SSL'); ?>"><?php echo zen_image_button(BUTTON_IMAGE_TESTIMONIALS, BUTTON_TESTIMONIALS_ADD_ALT); ?></a></div>

<br class="clearBoth" />
</div>
