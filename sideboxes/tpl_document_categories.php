<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_document_categories.php 2975 2006-02-05 19:33:51Z birdbrain $
 *
 * BetterCategoriesEzInfo v1.3.5 added  2006-09-19  gilby
 */

  $spacer = '';
  // uncomment next line to add 1 space between image & text
  // $spacer .= '&nbsp;';


  $content = "";
  
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
  for ($i=0;$i<sizeof($box_categories_array);$i++) {
/*
    if ($box_categories_array[$i]['has_sub_cat'] or $box_categories_array[$i]['parent'] == 'true') {
      $new_style = 'category-parent';
    } else {
      $new_style = 'category-child';
    }
*/
    switch(true) {
      case ($box_categories_array[$i]['top'] == 'true'):
        $new_style = 'category-top';
        break;
      case ($box_categories_array[$i]['has_sub_cat']):
        $new_style = 'category-subs';
        break;
      default:
        $new_style = 'category-products';
      }

    $content .= '<div class="betterDocuments"><a class="' . $new_style . '" href="' . zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']) . '">';

      if ($box_categories_array[$i]['current']) {
        if ($box_categories_array[$i]['has_sub_cat']) {
          $content .= '<span class="category-subs-parent">';
          $content .= $pointer;
          $content .= doc_with_pointer($box_categories_array[$i]['name'], 'down', $spacer);
          $content .= '</span>';
         } else {
          $content .= '<span class="category-subs-selected">';
          $content .= $pointer;
          $content .= doc_with_pointer($box_categories_array[$i]['name'], 'nosub', $spacer);
          $content .= '</span>';
        }
      } else {
        if ($box_categories_array[$i]['has_sub_cat']) {
        $content .= $pointer;
        $content .= doc_with_pointer($box_categories_array[$i]['name'], 'right', $spacer); }
        else {
        $content .= $pointer;
        $content .= doc_with_pointer($box_categories_array[$i]['name'], 'nosub', $spacer); }
      }

      if ($box_categories_array[$i]['has_sub_cat']) {
        $content .= CATEGORIES_SEPARATOR;
      }
//      $content .= '</a>';

      if (SHOW_COUNTS == 'true') {
        if ((CATEGORIES_COUNT_ZERO == '1' and $box_categories_array[$i]['count'] == 0) or $box_categories_array[$i]['count'] >= 1) {
          $content .= CATEGORIES_COUNT_PREFIX . $box_categories_array[$i]['count'] . CATEGORIES_COUNT_SUFFIX;
        }
      }

      $content .= '</a></div>';
      
//      $content .= '<br />';
    }
    $content .= '</div>';
      

  //this is the function that inserts the 'pointer' (or 'disclosure triangle')
  //before the name of the category, in the 'Categories' sidebox.
  //$categoryName should be a string as contained in
  //$box_categories_array[$i]['name'] above, which already includes
  //the category name with all the necessary subcategory indents up front,
  //as specified by the user in the Admin Panel.
  //$categoryType will be either 'down', 'right' or 'nosub', which
  //specifies which picture appears next to the category name:
  function doc_with_pointer( $categoryName, $categoryType, $spacer) {

  	//picking the appropriate pointer image:
  	switch ($categoryType) {
  		case "down":
  			$pointer = zen_image(DIR_WS_TEMPLATE_IMAGES . 'bc_doc_pointer_down.gif');
   			break;
  		case "right":
  			$pointer = zen_image(DIR_WS_TEMPLATE_IMAGES . 'bc_doc_pointer_right.gif');
  			break;
  		default:
  			$pointer = zen_image(DIR_WS_TEMPLATE_IMAGES . 'bc_doc_no_sub.gif');
  	}

    $pointer .= $spacer;

  	switch (true) {
  		//if the user has left the 'subcategories indent' empty, or
  		//if this is a 'top-level' category (there are no subcategory indents),
  		//then, we just prepend the pointer image:
  		case (CATEGORIES_SUBCATEGORIES_INDENT == ''):
  		case (strpos($categoryName, CATEGORIES_SUBCATEGORIES_INDENT) !== 0):
  			$pointer .= $categoryName;
  			break;
  		default:
  			//removing the subcategory indents from the beginning of the name:
  			$indentLength = strlen(CATEGORIES_SUBCATEGORIES_INDENT);
  			$pos = 0;
  			for ($i = 0; $pos === 0; $i++) {
  				$categoryName = substr($categoryName, $indentLength);
  				$pos = strpos($categoryName, CATEGORIES_SUBCATEGORIES_INDENT);
  			}
  			//placing the pointer image:
  			$pointer .= $categoryName;
  			//adding back the subcategory indents to the beginning of the name:
  			for (;$i > 0; $i--) {
  				$pointer = CATEGORIES_SUBCATEGORIES_INDENT . $pointer;
  			}
  	}
  	return $pointer;
  }
?>