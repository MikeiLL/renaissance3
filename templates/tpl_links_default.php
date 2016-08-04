<?php
/**
 * Links Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_links_submit_default.php 3.5.3 4/16/2010 Clyde Jones $
 */
  if ($display_mode == 'categories') {
?>

<div class="centerColumn" id="ezPageDefault">

<?php echo HEADING_TITLE; ?>

<?php
    $categories_query = $db->Execute("select lc.link_categories_id, lcd.link_categories_name, lcd.link_categories_description, lc.link_categories_image from " . TABLE_LINK_CATEGORIES . " lc, " . TABLE_LINK_CATEGORIES_DESCRIPTION . " lcd where lc.link_categories_id = lcd.link_categories_id and lc.link_categories_status = '1' and lcd.language_id = '" . (int)$_SESSION['languages_id'] . "' order by lc.link_categories_sort_order");
  if ($categories_query->RecordCount() > 0) {
      $rows = 0;
 while (!$categories_query->EOF) {
        $rows++;
        $lPath_new = 'lPath=' . $categories_query->fields['link_categories_id'];
      $width = (int)(100 / MAX_LINK_CATEGORIES_ROW) . '%';
      $newrow = false;
      if ((($rows / MAX_LINK_CATEGORIES_ROW) == floor($rows / MAX_LINK_CATEGORIES_ROW)) && ($rows != $number_of_categories))
      {
        $newrow = true;
      }

?>
<div class="linkstext"><a href="<?php echo zen_href_link(FILENAME_LINKS, $lPath_new); ?>">
       <?php if (zen_not_null($categories_query->fields['link_categories_image'])) {
          echo zen_links_image(DIR_WS_IMAGES . $categories_query->fields['link_categories_image'], $categories_query->fields['link_categories_name'], LINK_CATEGORY_IMAGE_WIDTH, LINK_CATEGORY_IMAGE_HEIGHT) . '<br />';// . $categories_query->fields['link_categories_description'];
        } else {
          echo zen_image(DIR_WS_IMAGES . 'pixel_trans.gif', $categories_query->fields['link_categories_name'], LINK_CATEGORY_IMAGE_WIDTH, LINK_CATEGORY_IMAGE_HEIGHT) . '<br />' . $categories_query->fields['link_categories_description'];
        } ?>
<?php echo "<strong>".$categories_query->fields['link_categories_name'] . '</strong>: ' . $categories_query->fields['link_categories_description']; ?></a></div>
<?php
  if ($newrow) {
?>

<?php 
	    }
       	 $categories_query->MoveNext();
      }
    } else {
?>
                <?php echo TEXT_NO_CATEGORIES; ?>
<?php
    }
?>
          <br class="clearBoth" />

<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
          <br class="clearBoth" />        
    </div>
          
        
<?php
  } elseif ($display_mode == 'links') {
// create column list
    $define_list = array('LINK_LIST_IMAGE' => LINK_LIST_IMAGE,
                         'LINK_LIST_DESCRIPTION' => LINK_LIST_DESCRIPTION, 
                         'LINK_LIST_COUNT' => LINK_LIST_COUNT);

    asort($define_list);

    $column_list = array();
    reset($define_list);
    while (list($key, $value) = each($define_list)) {
      if ($value > 0) $column_list[] = $key;
    }

    $select_column_list = '';

    for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
      switch ($column_list[$i]) {
        case 'LINK_LIST_IMAGE':
          $select_column_list .= 'l.links_image_url, ld.links_title, ';
          break;
        case 'LINK_LIST_DESCRIPTION':
          $select_column_list .= 'ld.links_description, ld.links_title, ';
          break;
        case 'LINK_LIST_COUNT':
          $select_column_list .= 'l.links_clicked, ';
          break;
      }
    }

// check sort order
//$sortorder = "ld.links_title";	
if (DEFINE_SORT_ORDER == 1) $sortorder = "ld.links_title"; 
if (DEFINE_SORT_ORDER == 2) $sortorder = "l.links_date_added desc"; 
if (DEFINE_SORT_ORDER == 3) $sortorder = "l.links_clicked desc"; 

// show the links in a given category
// We show them all
    $listing_sql = "select " . $select_column_list . " l.links_id from " . TABLE_LINKS_DESCRIPTION . " ld, " . TABLE_LINKS . " l, " . TABLE_LINKS_TO_LINK_CATEGORIES . " l2lc where l.links_status = '2' and l.links_id = l2lc.links_id and ld.links_id = l2lc.links_id and ld.language_id = '" . (int)$_SESSION['languages_id'] . "' and l2lc.link_categories_id = '" . (int)$current_category_id . "'" . "order by $sortorder";

?>
 <div class="centerColumn" id="ezPageDefault">
<?php echo HEADING_TITLE; ?>
<?php echo $subhead; ?>
<?php if (DEFINE_LINKS_STATUS >= '1' and DEFINE_LINKS_STATUS <= '2') { ?>

<?php require($define_page); ?>

<?php } ?> 
     
<?php include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_LINK_LISTING)); ?>
      
     
          <br class="clearBoth" />     
         
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) .'</a>'; ?></div>
          <br class="clearBoth" />
</div>            
<?php
  }
?>