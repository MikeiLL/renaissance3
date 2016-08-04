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
$content = '';
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
  for ($i=1; $i<=sizeof($page_query_list); $i++) {
  $content .= '<b><a href="' . zen_href_link(FILENAME_TESTIMONIALS_MANAGER, 'testimonials_id=' . $page_query_list[$i]['id']) . '">' . $page_query_list[$i]['name'] . '</a></b><div class="testimonial">';

if ($page_query_list[$i]['image'] != '') {  
$content .= '<p class="testimonialImage">' . zen_image(DIR_WS_IMAGES . $page_query_list[$i]['image'], $page_query_list[$i]['name'], TESTIMONIAL_IMAGE_WIDTH, TESTIMONIAL_IMAGE_HEIGHT) . '</p>';  
  }
  if (DISPLAY_TESTIMONIALS_MANAGER_TRUNCATED_TEXT == 'true') {
    $content .= '<p>' . zen_trunc_string($page_query_list[$i]['story'],TESTIMONIALS_MANAGER_DESCRIPTION_LENGTH) . '<br /><span><strong><a href="' . zen_href_link(FILENAME_TESTIMONIALS_MANAGER, 'testimonials_id=' . $page_query_list[$i]['id']) . '">' .TESTIMONIALS_MANAGER_READ_MORE .'</a></strong></span></p></div>';
	$content .= '<hr class="catBoxDivider" />';
  }
  }
  if (DISPLAY_ALL_TESTIMONIALS_TESTIMONIALS_MANAGER_LINK == 'true') {
  $content .= '<div class="bettertestimonial"><a href="' . zen_href_link(FILENAME_TESTIMONIALS_MANAGER_ALL) . '">' . TESTIMONIALS_MANAGER_DISPLAY_ALL_TESTIMONIALS . '</a></div>';
 }
  if (DISPLAY_ADD_TESTIMONIAL_LINK == 'true') {
  $content .= '<div class="bettertestimonial"><a href="' . zen_href_link(FILENAME_TESTIMONIALS_ADD, '', 'SSL') . '">' . TESTIMONIALS_MANAGER_ADD_TESTIMONIALS . '</a></div>';
 }
$content .= '</div>';
//EOF